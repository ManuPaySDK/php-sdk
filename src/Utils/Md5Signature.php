<?php

namespace ManuPaySDK\Utils;

class Md5Signature
{
    private $appSecret = "";
    private $errorMessage = "";


    function __construct($appSecret = "")
    {
        $this->appSecret = $appSecret;
    }

    public function verify($params = [], $sign = "")
    {
        $this->generateSign = $this->generate($params);
        if ($sign !== $this->generateSign) {
            $this->errorMessage = " signature verify failed ";
            return false;
        }
        return true;
    }

    public function generate($params = [])
    {
        ksort($params);
        $rawStr = http_build_query($params) . "&key=" . $this->appSecret;
        //printf("%s\n",$rawStr);
        return strtoupper(md5($rawStr));
    }

    function getErrorMessage()
    {
        return $this->errorMessage;
    }
}