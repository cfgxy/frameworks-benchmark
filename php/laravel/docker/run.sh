#!/usr/bin/env bash
docker build -t local-php80:laravel -f Dockerfile ..
docker-compose up -d
