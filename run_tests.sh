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

echo "launch jasmine"
phantomjs app/tests/js/run-jasmine.js http://dbda.test/jasmine
