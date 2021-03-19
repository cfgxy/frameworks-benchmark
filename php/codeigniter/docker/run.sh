#!/usr/bin/env bash
docker build -t local-php80:codeigniter -f Dockerfile ..
docker-compose up -d