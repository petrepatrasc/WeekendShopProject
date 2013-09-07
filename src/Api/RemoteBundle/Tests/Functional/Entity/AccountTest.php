<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 1:35 PM
 * To change this template use File | Settings | File Templates.
 */

use Api\RemoteBundle\Tests\FunctionalTestCase;
use Api\RemoteBundle\Entity\AccountRepository;
use Api\RemoteBundle\Entity\Account;
use Api\RemoteBundle\Tests\CrudTestInterface;

class AccountTest extends FunctionalTestCase implements CrudTestInterface {

    /**
     * @var AccountRepository
     */
    protected $repo;

    public function setUp() {
        parent::setUp();
        $this->repo = $this->em->getRepository('ApiRemoteBundle:Account');
    }

    /**
     * Create a default fixture entity for the test class.
     * @param array $params Parameters which overwrite class defaults.
     * @return Account The resulting entity.
     */
    public function createDefaultFixture($params) {
        $data = array(
            'username'  => 'testUsername',
            'email'     => 'testEmail',
            'fullName'  => 'testFullName',
            'password'  => sha1('testPassword'),
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s'),
            'apiKey'    => sha1('testApiKey')
        );

        $merged = array_merge($data, $params);

        $entity = Account::makeFromArray($merged);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }


    /**
     * Testing default creation method.
     */
    public function testCreate_Valid() {
        $firstCount = count($this->repo->findAll());

        $params = array(
            'username'  => 'testCreate',
            'email'     => 'test@create.example.com',
        );

        $this->repo->create($this->createDefaultFixture($params));

        $secondCount = count($this->repo->findAll());

        $this->assertSame($firstCount + 1, $secondCount);
    }

    /**
     * Testing default update method.
     */
    public function testUpdate_Valid() {
        $params = array(
            'username'  => 'testUpdate',
            'emaill'    => 'test@update.example.com'
        );
        $accountEntity = $this->createDefaultFixture($params);

        $updateData = array(
            'username'  => 'testUpdate2',
            'email'     => 'test@update2.example.com'
        );

        $this->repo->update($accountEntity, $updateData);
        $updatedEntity = $this->repo->find($accountEntity->getId());

        $this->assertSame($updatedEntity->getUsername(), $updateData['username']);
        $this->assertSame($updatedEntity->getEmail(), $updateData['email']);
    }

    /**
     * Testing default delete method.
     */
    public function testDelete_Valid() {
        $firstCount = count($this->repo->findAll());

        $accountEntity = $this->createDefaultFixture(array(
            'username'  => 'testDelete',
            'email'     => 'test@delete.example.com'
        ));

        $secondCount = count($this->repo->findAll());
        $this->assertSame($firstCount + 1, $secondCount);

        $this->repo->delete($accountEntity);
        $thirdCount = count($this->repo->findAll());

        $this->assertSame($firstCount, $thirdCount);
        $this->assertSame($secondCount - 1, $thirdCount);
    }
}