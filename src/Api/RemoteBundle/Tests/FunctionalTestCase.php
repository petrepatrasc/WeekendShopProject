<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 10:02 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Tests;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FunctionalTestCase extends WebTestCase{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * {@inheritDoc}
     */
    public function setUp() {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;

        $this->regenerateSchema();
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown() {
        parent::tearDown();
        $this->em->close();
    }

    /**
     * Drops current schema and creates a brand new one
     */
    protected function regenerateSchema() {
        $metadatas = $this->em->getMetadataFactory()->getAllMetadata();
        if (!empty($metadatas)) {
            $tool = new \Doctrine\ORM\Tools\SchemaTool($this->em);
            $tool -> dropSchema($metadatas);
            $tool -> createSchema($metadatas);
        }
    }
}