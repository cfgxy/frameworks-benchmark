#!/usr/bin/env bash
docker build -t local-php80:slim -f Dockerfile ..
docker-compose up -d
