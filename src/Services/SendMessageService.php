<?php

namespace Nekkoy\GatewaySmsomnicell\Services;

use Nekkoy\GatewayAbstract\Services\AbstractSendMessageService;
use Nekkoy\GatewaySmsomnicell\DTO\ConfigDTO;

/**
 *
 */
class SendMessageService extends AbstractSendMessageService
{
    /** @var string */
    protected $api_url = 'https://api.omnicell.com.ua';

    /** @var ConfigDTO */
    protected $config;

    /**  */
    protected function init() {
        $api_key = base64_encode(sprintf('%s:%s', $this->config->login, $this->config->password));
        $this->header = [
            'Content-Type: application/json',
            sprintf('Authorization: Basic %s', $api_key)
        ];
    }

    /** @return string */
    protected function url()
    {
        return $this->api_url . '/ip2sms/';
    }

    /** @return mixed */
    protected function data()
    {
        $request = [
            "extended" => true,
            "id"       => "single",
            "type"     => "SMS",
            "source"   => $this->config->name_sms,
            "desc"     => $this->config->description,
            "to"       => [["msisdn" => $this->message->destination]],
            "body"     => ["value" => $this->message->text]
        ];

        return json_encode($request);
    }

    /** @return mixed */
    protected function development()
    {
        return '{
            "state":{
                "value": "ACCEPTED"
            }
        }';
    }

    /**
     * @return void
     */
    protected function response()
    {
        $response = json_decode($this->response, true);
        if( isset($response['state']['value']) && strtoupper($response['state']['value']) == 'ACCEPTED' ) {
            $this->response_code = 0;
        }

        if( isset($response['state']['value']) ) {
            $this->response_message = $response['state']['value'];
        }
    }
}
