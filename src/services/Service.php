<?php namespace professionalweb\sendsay\services;

use professionalweb\sendsay\Protocol\SendsayProtocol;

/**
 * Base methods for sendsay service
 * @package professionalweb\sendsay\services
 */
abstract class Service
{
    /**
     * @var SendsayProtocol
     */
    private $protocol;

    public function __construct(SendsayProtocol $protocol = null)
    {
        if ($protocol !== null) {
            $this->setProtocol($protocol);
        }
    }

    /**
     * @return SendsayProtocol
     */
    public function getProtocol(): SendsayProtocol
    {
        return $this->protocol;
    }

    /**
     * @param SendsayProtocol $protocol
     *
     * @return $this
     */
    public function setProtocol(SendsayProtocol $protocol): self
    {
        $this->protocol = $protocol;

        return $this;
    }
}