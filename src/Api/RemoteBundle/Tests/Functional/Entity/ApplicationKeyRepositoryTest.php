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
use Api\RemoteBundle\Tests\CrudTestInterface;

class ApplicationKeyRepositoryTest extends FunctionalTestCase implements CrudTestInterface {

    /**
     * @var ApplicationKeyRepository
     */
    protected $repo;

    public function setUp() {
        parent::setUp();
        $this->repo = $this->em->getRepository('ApiRemoteBundle:ApplicationKey');
    }

    /**
     * Create a default fixture entity for the test class.
     * @param array $params Parameters which overwrite class defaults.
     * @return ApplicationKey The resulting entity.
     */
    public function createDefaultFixture($params) {
        $data = array(
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s'),
            'name'  => 'testAppName',
            'value' => sha1('testAppKey'),
        );

        $merged = array_merge($data, $params);

        $entity = ApplicationKey::makeFromArray($merged);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
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

        $response = $this->repo->create($this->createDefaultFixture($params));

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

        $initialData = array(
            'name' => $updateName,
            'value' => $updateValue
        );

        $newEntry = $this->createDefaultFixture($initialData);

        $params = array(
            'name' => $updateName,
            'value' => $updateValue
        );

        // Update the entry.
        $this->repo->update($newEntry, $params);

        // Retrieve the entry and check if it has been updated.
        $appKey = $this->repo->find($newEntry->getId());

        $this->assertSame($appKey->getName(), $updateName);
        $this->assertSame($appKey->getValue(), $updateValue);
    }

    /**
     * Test delete method.
     */
    public function testDelete_Valid() {
        $testName = 'deleteTest';
        $testValue = sha1('deleteTest');

        $constructionData = array(
            'name'  => $testName,
            'value' => $testValue
        );

        $appKey = $this->createDefaultFixture($constructionData);
        $firstCount = count($this->repo->findAll());

        $this->repo->delete($appKey);

        $secondCount = count($this->repo->findAll());

        $this->assertSame($firstCount - 1, $secondCount);
    }
}