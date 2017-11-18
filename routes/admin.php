<?php

$app->get('/admin/', function() use ($app) {
    
})->secure('ROLE_ADMIN');
