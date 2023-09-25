<?php

declare(strict_types=1);

namespace ManuPaySDK;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use ManuPaySDK\Models\UnifiedOrderRequest;

class ManuPayClient
{

    const DEFAULT_TIMEOUT = 3;

    /**
     * @var string
     * @desc 请求域名(https://www.youdomian.com),不需要在最后添加/
     */
    protected $host;


    /**
     * @var string
     * @desc 商户号
     */
    protected $mchNo;


    /**
     * @var string
     * @desc 私钥
     */
    protected $privateSecret;


    /**
     * @var int
     */
    protected $timeout = self::DEFAULT_TIMEOUT;


    /**
     * __construct function
     *
     * @param string $host
     * @param string $mchNo
     * @param string $privateSecret
     */
    public function __construct(string $host, string $mchNo, string $privateSecret)
    {
        $this->host = $host;
        $this->mchNo = $mchNo;
        $this->privateSecret = $privateSecret;
    }


    /**
     * @param int $timeout
     */
    public function setTimeout(int $timeout)
    {
        $this->timeout = $timeout;
    }

    /**
     * @desc: request function
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return \Psr\Http\Message\ResponseInterface
     * @author Tinywan(ShaoBo Wan)
     */
    protected function request(string $method, string $uri, array $options = [])
    {
        if (!isset($options['timeout'])) {
            $options['timeout'] = $this->timeout;
        }

        $client = new Client([
            'base_uri' => "{$this->host}",
            'timeout' => $this->timeout
        ]);

        try {
            $resp = $client->request($method, $uri, $options);
        } catch (Exception $e) {
            print $e->getMessage();
            exit();
        }
        return $resp;
    }

    /**
     * @desc: 下单
     * @param UnifiedOrderRequest $username
     * @return string
     */
    public function placeOrder(UnifiedOrderRequest $req)
    {
        $query = [
            'username' => $req,
        ];

        $resp = $this->request('POST', '/pay/order/place', [
            'http_errors' => false,
            'query' => $query
        ]);

        if (404 === $resp->getStatusCode()) {
            //TODO
        }
        return $resp->getBody()->getContents();
    }

}
