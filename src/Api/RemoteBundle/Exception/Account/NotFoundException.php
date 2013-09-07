<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 6:08 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Exception\Account;

use Api\RemoteBundle\Exception\ResponseCode;
use Api\RemoteBundle\Exception\BaseException;

class NotFoundException extends BaseException {

    public function __construct() {
        parent::__construct();
        $this->code = ResponseCode::USER_NOT_FOUND;
        $this->message = "Invalid login credentials.";
    }
}