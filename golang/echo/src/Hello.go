package main

import (
	"fmt"
	"github.com/labstack/echo/v4"
	"gorm.io/driver/mysql"
	"gorm.io/gorm"
	"net/http"
	"time"
)

var globalDb *gorm.DB

func main()  {
	// Echo instance
	e := echo.New()


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
		globalDb = db
	}


	// Middleware
	//e.Use(middleware.Logger())
	//e.Use(middleware.Recover())

	// Routes
	e.GET("/hello", hello)
	e.GET("/gorm", handleGorm)

	// Start server
	e.Logger.Fatal(e.Start(":8080"))
}


// Handler
func hello(c echo.Context) error {
	return c.String(http.StatusOK, "Hello World")
}

func handleGorm(c echo.Context) error {
	var t CommonType
	globalDb.First(&t, 1)

	return c.String(http.StatusOK, fmt.Sprintf("Hello %s, from gorm", t.TypeName))
}