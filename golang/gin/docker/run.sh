#!/usr/bin/env bash
docker build -t golang-local:gin -f Dockerfile ..
docker-compose up -d
