#!/usr/bin/env bash

set -e

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )/../web/juno"
OUT=$DIR/juno.min.js

JS="$(cat $DIR/app.js)$(cat $DIR/utils.js)"

curl -s -d compilation_level=SIMPLE_OPTIMIZATIONS -d output_format=text -d output_info=compiled_code \
    --data-urlencode "js_code=$JS" http://closure-compiler.appspot.com/compile \
    > $OUT
