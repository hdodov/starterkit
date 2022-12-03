#!/bin/bash
docker build -t projects .
docker tag projects:latest 954231571588.dkr.ecr.us-east-1.amazonaws.com/projects:latest
docker push 954231571588.dkr.ecr.us-east-1.amazonaws.com/projects:latest