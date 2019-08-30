#!/bin/sh

docker run \
    --user $(id -u):$(id -g) \
    --volume $(pwd):/app \
    --volume ${COMPOSER_HOME:-$HOME/.composer}:/tmp \
    --rm \
    composer \
    ${@:-install}
