<?php namespace professionalweb\sendsay\interfaces\Protocol;

/**
 * Interface for Sendsay API response
 * @package professionalweb\sendsay\Protocol
 */
interface Response
{
    /**
     * Check request failed
     *
     * @return bool
     */
    public function isError(): bool;

    /**
     * Get response
     *
     * @return mixed
     */
    public function getData();

    /**
     * Get errors
     *
     * @return array
     */
    public function getError(): array;
}