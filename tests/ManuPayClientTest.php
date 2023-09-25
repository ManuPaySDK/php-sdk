<?php

namespace ManuPay\Tests;

use ManuPaySDK\Models\CommonRequestInfo;
use ManuPaySDK\Models\UnifiedOrderRequest;
use ManuPaySDK\Models\UnifiedOrderResponse;
use ManuPaySDK\Models\UnifiedOrderData;
use ManuPaySDK\ManuPayClient;
use PHPUnit\Framework\AssertionFailedError;

class ManuPayClientTest extends TestCase
{

    public function testPlaceOrder()
    {
        $client = new ManuPayClient('192.168.13.189', "12344","secret");
        $dataId = 'not-exists-data-id.' . microtime(true);

        try {
            $client->placeOrder($dataId);
            self::assertTrue(false, 'Failed to throw an exception, this line should not be executed');
        } catch (AssertionFailedError $e) {
            throw $e;
        } catch (\Throwable $e) {
            self::assertInstanceOf(NacosConfigNotFound::class, $e);
        }
    }

}
