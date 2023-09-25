<?php

declare(strict_types=1);

namespace ManuPaySDK\Models;

//公共参数
class CommonRequestInfo implements \JsonSerializable
{
    /**
     * @var string
     * @desc 商户号
     */
    public $mchNo;


    /**
     * @var bigint
     * @desc 13位时间戳
     */
    public $reqTime;

    /**
     * @var string
     * @desc 签名
     */
    public $sign;

    public function jsonSerialize()
    {
        return array_filter([
            'port' => $this->mchNo,
            'ip' => $this->reqTime,
            'weight' => $this->sign,
        ], function ($value) {
            return !is_null($value);
        });
    }
}


//公共参数
class UnifiedOrderRequest
{
    /**
     * @var string
     * @desc 商户订单号
     */
    public $mchOrderNo;


    /**
     * @var string
     * @desc 支付方式
     */
    public $wayCode;

    /**
     * @var int
     * @desc 支付金额,单位分
     */
    public $amount;


    /**
     * @var string
     * @desc 三位货币代码,印度卢比:inr
     */
    public $currency;


    /**
     * @var string
     * @desc 商品标题
     */
    public $subject;



    /**
     * @var string
     * @desc 商品描述
     */
    public $body;


    /**
     * @var string
     * @desc 支付结果异步回调URL
     */
    public $notifyUrl;


    /**
     * @var string
     * @desc 支付结果同步跳转通知URL
     */
    public $returnUrl;


    /**
     * @var string
     * @desc 商户扩展参数json格式字符串 至少有country参数字段 ,回调时会原样返回
     */
    public $extParam;


    /**
     * @var string
     * @desc 订单失效时间,单位秒,默认2小时.订单在(创建时间+失效时间)后失效
     */
    public $expiredTime;


    /**
     * @var string
     * @desc 客户端IPV4地址
     */
    public $clientIp;


}
