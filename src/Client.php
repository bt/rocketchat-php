<?php

namespace RocketChatPhp;

use GuzzleHttp\Client as GuzzleClient;

class Client
{
    const HOOK_URI = '/hooks';

    /**
     * @var string The server to connect to.
     */
    private $server;

    /**
     * @var string The token for the webhook.
     */
    private $token;

    /**
     * Client constructor.
     * @param string $server
     * @param string $token
     */
    public function __construct($server, $token)
    {
        $this->server = $server;
        $this->token = $token;
    }

    /**
     * Sends a payload to the server.
     * @param array $payload
     */
    public function payload(array $payload)
    {
        $client = new GuzzleClient([
            'base_uri' => $this->server
        ]);
        $client->request('POST', $this->getUri(), [
            'form_params' => [
                'payload' => json_encode($payload)
            ]
        ]);
    }

    /**
     * Returns the webhook URI.
     * @return string
     */
    private function getUri()
    {
        return sprintf('%s/%s', self::HOOK_URI, $this->token);
    }
}


/*
$rocketchat = new Client('https://chat.pawsexpress.com.au', 'supertoken');
$rocketchat->payload([
	'text' => 'Order Confirmed',
	'attachments' => [
		''
	]
]);

OR

$builder = new RocketChatPayloadBuilder();

$attachments = $builder->attachments();
$attachments->addField('ordernumber', '1', true);

$rocketchat = new Client('https://chat.pawsexpress.com.au', 'supertoken');
$rocketchat->payload([
	'text' => 'test',
	'attachments' => $attachments
])

*/
