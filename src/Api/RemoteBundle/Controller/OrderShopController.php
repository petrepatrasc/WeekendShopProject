<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 7:46 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OrderShopController extends Controller {

    public function finishOrderAction() {
        $params = $this->get('json')->decode($this->getRequest());
        $accountId = $params['accountId'];

        $return['valid'] = $this->get('order')->finishOrder($accountId);

        return $this->get('json')->generateSuccessfulResponse($return);
    }
}