<?php

namespace Nekkoy\GatewaySmsomnicell\DTO;

use Nekkoy\GatewayAbstract\DTO\AbstractConfigDTO;

/**
 *
 */
class ConfigDTO extends AbstractConfigDTO
{
    /**
     * Логин
     * @var string
     */
    public $login;

    /**
     * Пароль
     * @var string
     */
    public $password;

    /**
     * Имя при отправке через СМС
     * @var string
     */
    public $name_sms;

    /**
     * Описание отправки
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $handler = \Nekkoy\GatewaySmsomnicell\Services\SendMessageService::class;
}
