#!/bin/sh

mkdir -p .composer

docker run \
    --user $(id -u):$(id -g) \
    --volume $(pwd):/app \
    --volume $(pwd)/.composer:/tmp \
    --rm \
    composer \
    ${@:-install}

