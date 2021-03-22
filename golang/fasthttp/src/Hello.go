package main

import (
	"fmt"
	"github.com/valyala/fasthttp"
)

func main() {
	fasthttp.ListenAndServe(":8080", func(ctx *fasthttp.RequestCtx) {
		switch string(ctx.Path()) {
		case "/hello":
			fmt.Fprint(ctx, "Hello World")
		default:
			ctx.Error("Unsupported path", fasthttp.StatusNotFound)
		}
	})
}
