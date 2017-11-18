<?php

namespace wappr\Contracts\Controllers;

use Symfony\Component\HttpFoundation\Request;

interface ControllerInterface
{
    public function index(Request $request);
}
