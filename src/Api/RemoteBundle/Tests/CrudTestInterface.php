<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 1:40 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Tests;

interface CrudTestInterface {

    /**
     * Create a default fixture entity for the test class.
     * @param array $params Parameters which overwrite class defaults.
     * @return mixed The resulting entity.
     */
    public function createDefaultFixture($params);

    /**
     * Testing default creation method.
     */
    public function testCreate_Valid();

    /**
     * Testing default update method.
     */
    public function testUpdate_Valid();

    /**
     * Testing default delete method.
     */
    public function testDelete_Valid();
}