<?php

$app->error(function (\Exception $e, $code) {
    exit($e->getMessage());
});
