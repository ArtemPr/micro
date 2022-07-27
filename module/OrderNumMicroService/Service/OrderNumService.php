<?php

namespace Module\OrderNumMicroService\Service;

class OrderNumService
{
    public function __construct(
        ?array $param
    )
    {
        $this->test_mode = $param['test_mode'] ?? true;
        $this->token = $param['token'] ?? true;
        $this->training_centre = $param['training_centre'] ?? true;
    }
}
