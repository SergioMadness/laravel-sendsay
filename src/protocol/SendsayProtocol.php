<?php namespace professionalweb\sendsay;

use professionalweb\sendsay\Protocol\Response;
use professionalweb\sendsay\Protocol\SendsayProtocol as ISendsayProtocol;

/**
 * Class-wrapper for Sendsay protocol
 * @package professionalweb\sendsay
 */
class SendsayProtocol implements ISendsayProtocol
{

    /**
     * @var string
     */
    private $apiKey;

    public function __construct(string $apiKey = '')
    {
        $this->setApiKey($apiKey);
    }


    /**
     * Call API method
     *
     * @param string $method
     * @param array  $params
     *
     * @return Response
     */
    public function call(string $method, array $params): Response
    {
        // TODO: Implement call() method.
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     *
     * @return $this
     */
    public function setApiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;

        return $this;
    }
}