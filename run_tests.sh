#!/bin/bash

RUNNING=`ps --no-headers -Cphantomjs | wc -l`
if [ ${RUNNING} -eq 0 ]; then
    echo "launch phantomjs"
    phantomjs --webdriver=8643 &
fi

echo "launch phpunit"
vendor/bin/phpunit

echo "launch behat"
vendor/bin/behat

echo "launch qunit"
phantomjs app/tests/js/runner.js http://dbda.test/js/tests/test.html
