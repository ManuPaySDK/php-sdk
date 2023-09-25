<?php

declare(strict_types=1);

namespace ManuPaySDK\Models;
class UnifiedOrderResponse
{
    /**
     * @var string
     */
    public $code;

    /**
     * @var string
     */
    public $msg;

    /**
     * @var string
     */
    public $sign;

    /**
     * @var UnifiedOrderData
     */
    public $data;

}


class UnifiedOrderData
{
    /**
     * @var string
     * @desc 支付订单号
     */
    public $payOrderId;

    /**
     * @var string
     * @desc 商户传入的订单号
     */
    public $mchOrderNo;

    /**
     * @var int
     * @desc 支付订单状态
     */
    public $orderState;

    /**
     * @var string
     * @desc 支付参数类型
     */
    public $payDataType;


    /**
     * @var string
     * @desc 发起支付用到的支付参数
     */
    public $payData;


    /**
     * @var string
     * @desc 上游渠道返回的错误码
     */
    public $errCode;


    /**
     * @var string
     * @desc 上游渠道返回的错误描述
     */
    public $errMsg;
}