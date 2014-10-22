<?php

namespace Gesdinet\Tests;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\Tools\Setup;
use Gesdinet\Tests\Mocks\EntityManagerMock;

abstract class DQLFunctionTest extends \PHPUnit_Framework_TestCase
{
    protected $config;

    /** @var EntityManagerMock */
    protected $em;

    public function setUp()
    {
        $this->em = $this->getEntityManagerInstanceMock();
    }

    public function tearDown()
    {
        unset($this->em);
    }

    /**
     * Just for internal use, could be overridden in child classes
     * User $em property in case if you need EntityManager
     *
     * @return EntityManagerMock
     */
    protected function getEntityManagerInstanceMock()
    {
        $this->config = Setup::createAnnotationMetadataConfiguration(array('./Fixtures'), true);

        $conn = array(
            'driverClass'  => 'Gesdinet\Tests\Mocks\DriverMock',
            'wrapperClass' => 'Gesdinet\Tests\Mocks\ConnectionMock',
            'user'         => 'john',
            'password'     => 'wayne'
        );

        $conn = DriverManager::getConnection($conn, $this->config);

        $this->config->setProxyDir(__DIR__ . '/Proxies');
        $this->config->setProxyNamespace('Gesdinet\Tests\Proxies');
        $this->config->addCustomDatetimeFunction('dayofmonth', 'Gesdinet\DQL\Datetime\DayOfMonth');
        $this->config->addCustomDatetimeFunction('week', 'Gesdinet\DQL\Datetime\Week');
        $this->config->addCustomDatetimeFunction('dayofweek', 'Gesdinet\DQL\Datetime\DayOfWeek');
        $this->config->addCustomDatetimeFunction('dayofyear', 'Gesdinet\DQL\Datetime\DayOfYear');
        $this->config->addCustomDatetimeFunction('hour', 'Gesdinet\DQL\Datetime\Hour');
        $this->config->addCustomDatetimeFunction('minute', 'Gesdinet\DQL\Datetime\Minute');
        $this->config->addCustomDatetimeFunction('month', 'Gesdinet\DQL\Datetime\Month');
        $this->config->addCustomDatetimeFunction('quarter', 'Gesdinet\DQL\Datetime\Quarter');
        $this->config->addCustomDatetimeFunction('second', 'Gesdinet\DQL\Datetime\Second');
        $this->config->addCustomDatetimeFunction('year', 'Gesdinet\DQL\Datetime\Year');

        return EntityManagerMock::create($conn, $this->config);
    }
}
