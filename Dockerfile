FROM bref/php-81-fpm

COPY ./assets ${LAMBDA_TASK_ROOT}/assets
COPY ./content ${LAMBDA_TASK_ROOT}/content
COPY ./kirby ${LAMBDA_TASK_ROOT}/kirby
COPY ./site ${LAMBDA_TASK_ROOT}/site
COPY ./vendor ${LAMBDA_TASK_ROOT}/vendor
COPY .htaccess composer.json composer.lock index.php info.php ${LAMBDA_TASK_ROOT}

CMD ["index.php"]