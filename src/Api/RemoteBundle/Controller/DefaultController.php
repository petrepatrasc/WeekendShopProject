<?php

namespace Api\RemoteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ApiRemoteBundle:Default:index.html.twig', array('name' => $name));
    }
}
