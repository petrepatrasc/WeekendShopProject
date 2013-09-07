<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 5:30 PM
 * To change this template use File | Settings | File Templates.
 */

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase as WebTestCase;
use Api\RemoteBundle\Tests\ApiTestCase;
use Api\RemoteBundle\Exception\ResponseCode;

class AccountControllerTest extends ApiTestCase {

    public function testLogin_Invalid() {
        $params['username'] = 'testUsername';
        $params['password'] = sha1('testPassword');
        $params['app_key'] = $this->appKey;

        $jsonResponse = $this->makeRequest('/api/account/login', $params)->text();
        $response = $this->encoder->decode($jsonResponse, "json");

        $this->assertEquals(ResponseCode::USER_NOT_FOUND, $response['status']);
    }
}