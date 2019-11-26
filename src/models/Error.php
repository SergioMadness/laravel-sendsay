<?php namespace professionalweb\sendsay\models;

use professionalweb\sendsay\interfaces\Protocol\Error as IError;

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
     * @return string
     */
    public function getCode(): string
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
        return !empty($this->message) ? $this->message : $this->getCode();
    }

    /**
     * @param string $code
     *
     * @return $this
     */
    public function setCode(string $code): self
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