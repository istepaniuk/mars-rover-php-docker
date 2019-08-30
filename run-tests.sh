#!/bin/sh

[ -f ./vendor/bin/phpunit ] || ./setup.sh

docker run \
    --user $(id -u):$(id -g) \
    --volume $(pwd):/app \
    --entrypoint /app/vendor/bin/phpunit \
    --rm \
    composer \
    ${@:---colors=always tests}

