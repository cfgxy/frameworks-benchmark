package main

import (
	"fmt"
	"github.com/labstack/echo/v4"
	"gorm.io/driver/mysql"
	"gorm.io/gorm"
	"net/http"
)

func main()  {
	// Echo instance
	e := echo.New()

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
	dsn := "root@tcp(192.168.3.8:3306)/ahjob?charset=utf8mb4&parseTime=True&loc=Local"
	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})

	if err == nil {
		var t CommonType
		db.First(&t, 1)

		return c.String(http.StatusOK, fmt.Sprintf("Hello %s, from gorm", t.TypeName))
	}

	return c.String(http.StatusOK, "Hello")
}