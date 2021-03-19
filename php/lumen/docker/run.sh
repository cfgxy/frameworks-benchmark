#!/usr/bin/env bash
docker build -t local-php80:lumen -f Dockerfile ..
docker-compose up -d
