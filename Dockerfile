FROM bref/php-81-fpm

RUN yum install git -y

COPY ./vendor ${LAMBDA_TASK_ROOT}/vendor
COPY index.php ${LAMBDA_TASK_ROOT}

CMD ["index.php"]