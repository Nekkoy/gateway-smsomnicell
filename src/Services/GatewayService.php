<?php

namespace Nekkoy\GatewaySmsomnicell\Services;

use Nekkoy\GatewaySmsomnicell\DTO\ConfigDTO;

/**
 *
 */
class GatewayService
{
    protected $config;

    public function __construct()
    {
        $this->config = config('gateway-smsomnicell', []);
    }

    /**
     * @return ConfigDTO
     */
    public function getConfig()
    {
        return new ConfigDTO($this->config);
    }
}
