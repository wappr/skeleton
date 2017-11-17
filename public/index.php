<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../src/app.php';

require __DIR__.'/../src/services.php';
require __DIR__.'/../routes/main.php';

$app->run();
