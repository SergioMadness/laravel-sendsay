<?php namespace professionalweb\sendsay\interfaces\Protocol;

/**
 * Interface for Sendsay API wrapper
 * @package professionalweb\sendsay\Protocol
 */
interface SendsayProtocol
{
    /**
     * Call API method
     *
     * @param string $method
     * @param array  $params
     *
     * @return Response
     */
    public function call(string $method, array $params): Response;
}