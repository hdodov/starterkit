# Bref has a lot of extensions by default, but not gd, which Kirby needs.
# @see https://github.com/brefphp/extra-php-extensions#docker-images
FROM bref/extra-gd-php-81 as gdextra
FROM bref/php-81-fpm
COPY --from=gdextra /opt /opt

COPY ./vendor ${LAMBDA_TASK_ROOT}/vendor
COPY index.php ${LAMBDA_TASK_ROOT}

CMD ["index.php"]