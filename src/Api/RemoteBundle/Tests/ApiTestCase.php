<?php


/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 5:36 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Tests;

use Api\RemoteBundle\Entity\ApplicationKey;
use Symfony\Component\HttpKernel\AppKernel;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use DateTime;

class ApiTestCase extends WebTestCase {

    protected $appKey;
    protected $_application;
    protected $encoder;
    protected $em;

    public function __construct() {
        $this->encoder = new JsonEncoder();
    }

    public function setUp() {
        parent::setUp();
        static::$kernel = static::createKernel();
        static::$kernel->boot();

        $this->appKey = static::$kernel->getContainer()->getParameter('app_key');
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $appEntity = new ApplicationKey();
        $appEntity->setName('web_test_app');
        $appEntity->setValue($this->appKey);
        $appEntity->setCreatedAt(new DateTime('now'));
        $appEntity->setUpdatedAt(new DateTime('now'));
        $this->em->persist($appEntity);
        $this->em->flush();
    }

    public function tearDown() {
        parent::tearDown();
        $this->em->close();
    }

    public function makeRequest($url, $data) {
        $client = static::createClient();

        $postData['json_data'] = $this->encoder->encode($data, "json");

        $crawler = $client->request(
            'POST',
            $url,
            $postData
        );

        return $crawler;
    }
}