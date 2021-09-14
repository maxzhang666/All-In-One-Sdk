<?php

namespace MaxZhang\AllInOne\Client;

class HaoDanKuClient extends BaseClient
{
    protected $root = 'https://v2.api.haodanku.com/';

    public function getRootServer(): string
    {
        return $this->root;
    }
}