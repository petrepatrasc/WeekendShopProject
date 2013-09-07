<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 1:13 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Entity;

interface EntityManager {

    public function getId();

    public function setCreatedAt($createdAt);
    public function getCreatedAt();

    public function setUpdatedAt($updatedAt);
    public function getUpdatedAt();

}