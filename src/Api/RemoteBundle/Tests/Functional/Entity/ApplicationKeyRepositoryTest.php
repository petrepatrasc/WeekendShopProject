<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 9:26 AM
 * To change this template use File | Settings | File Templates.
 */

use Api\RemoteBundle\Tests\FunctionalTestCase;
use Api\RemoteBundle\Entity\ApplicationKeyRepository;
use Api\RemoteBundle\Entity\ApplicationKey;

class ApplicationKeyRepositoryTest extends FunctionalTestCase {

    protected $repo;

    public function setUp() {
        parent::setUp();
        $this->repo = $this->em->getRepository('ApiRemoteBundle:ApplicationKey');


    }

    /**
     * Test the create method.
     */
    public function testCreate_Valid() {
        $initialCount = count($this->repo->findAll());

        $params = array(
            'name'  => 'testNewKey',
            'value' => sha1('testNewKey')
        );

        $response = $this->repo->create($params);

        $this->assertInternalType('int', $response);
        $this->assertGreaterThan(0, $response);

        $secondCount = count($this->repo->findAll());
        $this->assertSame($initialCount + 1, $secondCount);
    }

    /**
     * Test the update method.
     */
    public function testUpdate_Valid() {
        $updateName = 'test';
        $updateValue = sha1('test123');

        $newEntryID = $this->createNewFixture();

        $params = array(
            'name' => $updateName,
            'value' => $updateValue
        );

        // Update the entry.
        $this->repo->update($newEntryID, $params);

        // Retrieve the entry and check if it has been updated.
        $appKey = $this->repo->find($newEntryID);

        $this->assertSame($appKey->getName(), $updateName);
        $this->assertSame($appKey->getValue(), $updateValue);
    }

    /**
     * Test delete method.
     */
    public function testDelete_Valid() {
        $testName = 'deleteTest';
        $testValue = sha1('deleteTest');

        $appKeyID = $this->createNewFixture($testName, $testValue);
        $firstCount = count($this->repo->findAll());

        $this->repo->delete($appKeyID);

        $secondCount = count($this->repo->findAll());

        $this->assertSame($firstCount - 1, $secondCount);
    }

    /**
     * Create a new fixture and return its ID.
     * @param string $name The name of the fixture.
     * @param string $value The key of the fixture.
     * @return int The ID of the fixture that has been created.
     */
    protected function createNewFixture($name = 'testName', $value = '0025dd9f850ce7889cf3e79e64328d0c4957751a') {
        // Create test fixture.
        $appKey = new ApplicationKey();
        $appKey->setName($name);
        $appKey->setValue($value);

        $this->em->persist($appKey);
        $this->em->flush();

        return $appKey->getId();
    }
}