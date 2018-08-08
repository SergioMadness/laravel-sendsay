<?php namespace professionalweb\sendsay\Protocol;

/**
 * Interface for error response
 * @package professionalweb\sendsay\Protocol
 */
interface Error
{
    /**
     * Get error code
     *
     * @return string
     */
    public function getCode(): string;

    /**
     * Get error message
     *
     * @return string
     */
    public function getMessage(): string;
}