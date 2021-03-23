/**
 * Copyright (c) 2021 Gu Xiaoyu
 * Frameworks-Benchmark is licensed under Mulan PSL v2.
 * You can use this software according to the terms and conditions of the Mulan PSL v2.
 * You may obtain a copy of Mulan PSL v2 at:
 *          http://license.coscl.org.cn/MulanPSL2
 * THIS SOFTWARE IS PROVIDED ON AN "AS IS" BASIS, WITHOUT WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO NON-INFRINGEMENT, MERCHANTABILITY OR FIT FOR A PARTICULAR PURPOSE.
 * See the Mulan PSL v2 for more details.
 */

package main

import (
	"fmt"
	"github.com/gin-gonic/gin"
	"gorm.io/driver/mysql"
	"gorm.io/gorm"
	"time"
)

func main() {
	r := gin.Default()

	dsn := "root@tcp(192.168.3.8:3306)/ahjob?charset=utf8mb4&parseTime=True&loc=Local"
	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})

	if err == nil && db != nil {
		sqlDb, e := db.DB()
		if e == nil && sqlDb != nil {
			sqlDb.SetMaxIdleConns(50)
			sqlDb.SetMaxOpenConns(1000)
			sqlDb.SetConnMaxIdleTime(30)
			sqlDb.SetConnMaxLifetime(time.Hour)
		}
	}

	r.GET("/hello", func(c *gin.Context) {
		//c.JSON(200, gin.H{
		//	"message": "Hello World!",
		//})
		c.String(200, "Hello World")
	})

	r.GET("/gorm", func(c *gin.Context) {
		var t CommonType
		db.First(&t, 1)
		c.String(200, fmt.Sprintf("Hello %s, from gorm", t.TypeName))
	})

	r.Run()
}

