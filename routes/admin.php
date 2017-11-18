<?php

$app->get('/admin/', 'admin:index')->secure('ROLE_ADMIN');
