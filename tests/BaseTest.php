<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    protected $config;

    public function __construct()
    {
        parent::__construct();
        $this->config = include "config.php";
    }

}