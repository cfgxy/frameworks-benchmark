FROM golang
ENV GO111MODULE=on \
    CGO_ENABLED=0 \
    GOOS=linux \
    GOARCH=amd64 \
    GOPROXY="https://mirrors.aliyun.com/goproxy/"

WORKDIR /src
COPY src .
RUN go build -o demo -v -x



FROM scratch
COPY --from=0 /src/demo /app/demo

ENTRYPOINT ["/app/demo"]