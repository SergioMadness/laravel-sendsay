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
        $this->error = $error;
        if (!empty($data)) {
            $this->setData($data);
        }
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
        if (isset($this->data['errors'])) {
            $this->error = true;
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

        if (\is_array($this->data['errors']) && $this->isError()) {
            foreach ($this->data['errors'] as $error) {
                $result[] = new Error($error['id'] ?? '', $error['explain'] ?? '');
            }
        }

        return $result;
    }

    /**
     * Check redirect needed
     *
     * @return bool
     */
    public function needRedirect(): bool
    {
        return isset($this->data['REDIRECT']);
    }

    /**
     * Get URL for redirect
     *
     * @return string
     */
    public function getRedirectUrl(): string
    {
        return $this->data['REDIRECT'] ?? '';
    }
}