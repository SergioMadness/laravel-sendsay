<?php namespace professionalweb\sendsay\models;

use professionalweb\sendsay\interfaces\Protocol\Response as IResponse;

/**
 * Class-wrapper for API response
 * @package cbs\lms\b2b\models
 */
class Response implements IResponse
{
    private $data = [];

    private $error;

    public function __construct(string $data = '', bool $error = false)
    {
        if (!empty($data)) {
            $this->setData($data);
        }
        $this->error = $error;
    }

    /**
     * Set response data
     *
     * @param string $data
     *
     * @return Response
     */
    public function setData(string $data): self
    {
        if (($response = json_decode($data, true)) !== null) {
            $this->data = $response;
        }

        return $this;
    }

    /**
     * Check request failed
     *
     * @return bool
     */
    public function isError(): bool
    {
        return $this->error;
    }

    /**
     * Get response
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get errors
     *
     * @return array
     */
    public function getError(): array
    {
        $result = [];

        if (\is_array($this->data) && $this->isError()) {
            foreach ($this->data as $error) {
                $result[] = new Error($error['code'] ?? 0, $error['message'] ?? '');
            }
        }

        return $result;
    }
}