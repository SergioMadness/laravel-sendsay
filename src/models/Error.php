<?php namespace professionalweb\sendsay\models;

use professionalweb\sendsay\Protocol\Error as IError;

/**
 * Class-wrapper for error
 * @package professionalweb\sendsay\models
 */
class Error implements IError
{
    private $code = 0;

    private $message = '';

    public function __construct($code = 0, $message = '')
    {
        $this->setMessage($message)->setCode($code);
    }

    /**
     * Get error code
     *
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * Get error message
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param int $code
     *
     * @return $this
     */
    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @param string $message
     *
     * @return $this
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}