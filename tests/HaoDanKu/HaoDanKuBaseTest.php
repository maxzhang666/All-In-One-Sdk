<?php

namespace Tests\HaoDanKu;

use MaxZhang\AllInOne\Client\HaoDanKuClient;
use Tests\BaseTest;

class HaoDanKuBaseTest extends BaseTest
{
    protected $apikey = '';
    protected $client;


    public function __construct()
    {
        $this->client = new HaoDanKuClient($this->apikey);
        parent::__construct();
    }

}