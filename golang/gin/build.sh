#!/bin/bash

export CGO_ENABLED=0
#export GOOS=linux 
#export GOOS=darwin
#export GOOS=windows
export GOOS=$1
export GOARCH=amd64

if [[ ! -d target ]]; then
  mkdir target
fi

cd src
go build -o ../target/demo.$GOOS -x -v