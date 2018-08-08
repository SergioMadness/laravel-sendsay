<?php namespace professionalweb\sendsay\protocol;

use professionalweb\sendsay\models\Response;
use professionalweb\sendsay\interfaces\Protocol\Response as IResponse;
use professionalweb\sendsay\interfaces\Protocol\SendsayProtocol as ISendsayProtocol;

/**
 * Class-wrapper for Sendsay protocol
 * @package professionalweb\sendsay
 */
class SendsayProtocol implements ISendsayProtocol
{

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $apiVersion;

    public function __construct(string $apiKey = '', string $url = 'https://api.sendsay.ru/', string $version = '100')
    {
        $this->setApiKey($apiKey)->setUrl($url)->setApiVersion($version);
    }


    /**
     * Call API method
     *
     * @param string $method
     * @param array  $params
     *
     * @return Response
     */
    public function call(string $method, array $params = []): IResponse
    {
        $params['apikey'] = $this->getApiKey();
        $params['action'] = $method;
        $params = [
            'request' => json_encode($params),
        ];
        $params['json'] = 1;
        $params['apiversion'] = $this->getApiVersion();
        $response = $this->sendRequest($this->getUrl(), $params);
        if ($response->needRedirect()) {
            return $this->sendRequest(rtrim($this->getUrl(), '/') . '/' . ltrim($response->getRedirectUrl(), '/'), $params);
        }

        return $response;
    }

    /**
     * Send request
     *
     * @param string $url
     * @param array  $params
     * @param string $method
     *
     * @return IResponse
     */
    protected function sendRequest(string $url, array $params = [], string $method = 'post'): IResponse
    {
        if ($method === 'get') {
            $url .= strpos($url, '?') ? '&' : '?';
            $url .= http_build_query($params);
        }
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'PW.Sendsay.Lib/PHP');
        if ($method === 'post') {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        } elseif ($method !== 'get') {
            curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, strtoupper($method));
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $body = curl_exec($curl);

        return new Response($body, curl_getinfo($curl, CURLINFO_HTTP_CODE) >= 400);
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

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }

    /**
     * @param string $apiVersion
     *
     * @return SendsayProtocol
     */
    public function setApiVersion(string $apiVersion): self
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }
}