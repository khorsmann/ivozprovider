#!/bin/bash

for target in "$@"
do
    php ./bin/console provider:generate:entities:abstract $target && \
    php ./bin/console provider:generate:traits $target && \
    php ./bin/console provider:generate:entities $target && \
    php ./bin/console provider:generate:interfaces $target && \
    php ./bin/console provider:generate:dtos $target
done