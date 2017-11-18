<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../app/app.php';

require __DIR__.'/../app/security.php';
require __DIR__.'/../app/services.php';
require __DIR__.'/../routes/main.php';

$app->run();
