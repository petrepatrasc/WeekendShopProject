<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 4:19 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\EventListener;


use Api\RemoteBundle\Controller\AppKeyAuthenticatedController;
use Api\RemoteBundle\Controller\FullyAuthenticatedController;
use Api\RemoteBundle\Service\TokenVerificationService;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class TokenListener {

    /**
     * @var TokenVerificationService
     */
    protected $tokenVerification;

    /**
     * Constructor for the TokenListener class, instantiating its dependencies.
     * @param TokenVerificationService $tokenVerification The token verification service class.
     */
    public function __construct(TokenVerificationService $tokenVerification) {
        $this->tokenVerification = $tokenVerification;
    }

    public function onKernelController(FilterControllerEvent $event) {
        $controller = $event->getController();

        if (!is_array($controller)) {
            return;
        }

        $encoder = new JsonEncoder();

        if ($controller[0] instanceof AppKeyAuthenticatedController) {
            $postData = $encoder->decode($event->getRequest()->get('json_data'), "json");
            $this->validateAppKey($postData);
        } else if ($controller[0] instanceof FullyAuthenticatedController) {
            $postData = $encoder->decode($event->getRequest()->get('json_data'), "json");
            $this->validateBothKeys($postData);
        }
    }

    protected function validateAppKey($param) {
        if (isset($param['app_key'])) {
            $appKey = $param['app_key'];

            $valid = $this->tokenVerification->validateAppKey($appKey);

            if (!$valid) {
                throw new AccessDeniedHttpException("Missing application key!");
            }
        } else {
            throw new AccessDeniedHttpException("Missing application key!");
        }
    }

    protected function validateApiKey($param) {
        if (isset($param['api_key'])) {
            $appKey = $param['api_key'];

            // do some more validation here
        } else {
            throw new AccessDeniedHttpException("Missing API key!");
        }
    }

    protected function validateBothKeys($param) {
        $this->validateAppKey($param);
        $this->validateApiKey($param);
    }
}