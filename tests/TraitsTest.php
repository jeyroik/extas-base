<?php

use \PHPUnit\Framework\TestCase;
use extas\components\THasInfo;
use extas\components\THasAliases;
use extas\interfaces\IHasAliases;
use extas\components\THasCreatedAt;
use extas\interfaces\IHasCreatedAt;
use extas\components\THasUpdatedAt;
use extas\interfaces\IHasUpdatedAt;
use extas\components\THasId;
use extas\interfaces\IHasId;
use extas\components\THasPath;
use extas\interfaces\IHasPath;
use extas\components\THasType;
use extas\interfaces\IHasType;
use extas\components\THasValue;
use extas\interfaces\IHasValue;
use extas\components\THasVersion;
use extas\interfaces\IHasVersion;
use extas\components\THasName;
use extas\interfaces\IHasName;
use extas\components\THasDescription;
use extas\interfaces\IHasDescription;
use extas\interfaces\IHasState;
use extas\components\THasState;
use extas\components\THasItemsData;
use extas\interfaces\IHasItemsData;

/**
 * Class TraitsTest
 *
 * @author jeyroik <jeyroik@gmail.com>
 */
class TraitsTest extends TestCase
{
    public function testHasDescription()
    {
        /**
         * @var $test \extas\interfaces\IHasDescription
         */
        $test = new class {
            use THasDescription;
            protected array $config = [];
        };

        $test->setTitle('Test')->setDescription('Test');
        $this->assertEquals('Test', $test->getTitle());
        $this->assertEquals('Test', $test->getDescription());
    }

    public function testHasName()
    {
        /**
         * @var $test IHasName
         */
        $test = new class {
            use THasName;
            protected array $config = [];
        };

        $test->setName('Test');
        $this->assertEquals('Test', $test->getName());
    }

    public function testHasInfo()
    {
        /**
         * @var $test IHasDescription|IHasName
         */
        $test = new class {
            use THasInfo;
            protected array $config = [];
        };

        $test->setName('Test');
        $test->setTitle('Test')->setDescription('Test');

        $this->assertEquals('Test', $test->getName());
        $this->assertEquals('Test', $test->getTitle());
        $this->assertEquals('Test', $test->getDescription());
    }

    public function testHasVersion()
    {
        /**
         * @var $test IHasVersion
         */
        $test = new class {
            use THasVersion;
            protected array $config = [];
        };

        $test->setVersion('Test');

        $this->assertEquals('Test', $test->getVersion());
    }

    public function testHasValue()
    {
        /**
         * @var $test IHasValue
         */
        $test = new class {
            use THasValue;
            protected array $config = [];

            public function getTemplateName(): string
            {
                return 'test';
            }
        };

        $test->setValue('Test');

        $this->assertEquals('Test', $test->getValue());
    }

    public function testHasType()
    {
        /**
         * @var $test IHasType
         */
        $test = new class {
            use THasType;
            protected array $config = [];
        };

        $test->setType('Test');

        $this->assertEquals('Test', $test->getType());
    }

    public function testHasPath()
    {
        /**
         * @var $test IHasPath
         */
        $test = new class {
            use THasPath;
            protected array $config = [];
        };

        $test->setPath('Test');

        $this->assertEquals('Test', $test->getPath());
    }

    public function testHasId()
    {
        /**
         * @var $test IHasId
         */
        $test = new class {
            use THasId;
            protected array $config = [];
        };

        $test->setId('Test');

        $this->assertEquals('Test', $test->getId());
    }

    public function testHasUpdatedAt()
    {
        /**
         * @var $test IHasUpdatedAt
         */
        $test = new class {
            use THasUpdatedAt;
            protected array $config = [];
        };

        $now = time();
        $format = 'Y-m-d H:i:s';
        $test->setUpdatedAt($now);

        $this->assertEquals($now, $test->getUpdatedAt());
        $this->assertEquals(date($format, $now), $test->getUpdatedAt($format));
    }

    public function testHasCreatedAt()
    {
        /**
         * @var $test IHasCreatedAt
         */
        $test = new class {
            use THasCreatedAt;
            protected array $config = [];
        };

        $now = time();
        $format = 'Y-m-d H:i:s';

        $test->setCreatedAt($now);

        $this->assertEquals($now, $test->getCreatedAt());
        $this->assertEquals(date($format, $now), $test->getCreatedAt($format));
    }

    public function testHasAliases()
    {
        /**
         * @var $test IHasAliases
         */
        $test = new class {
            use THasAliases;
            protected array $config = [];
        };

        $test->setAliases(['Test']);
        $this->assertEquals(['Test'], $test->getAliases());

        $test->addAlias('Test2');
        $this->assertEquals(true, $test->hasAlias('Test2'));

        $test->removeAlias('Test2');
        $this->assertEquals(false, $test->hasAlias('Test2'));
    }

    public function testHasState()
    {
        /**
         * @var $test IHasState
         */
        $test = new class {
            use THasState;
            protected array $config = [];
        };

        $test->setState('Test');

        $this->assertEquals('Test', $test->getState());
    }

    public function testHasItemsData()
    {
        /**
         * @var $test IHasItemsData
         * @var $dates DateTime[]
         */
        $test = new class {
            use THasItemsData;
        };

        $now = time();
        $dates = $test->convertToItems(
            [
                'key' => date('Y/m/d H:i:s', $now)
            ],
            DateTime::class
        );

        $this->assertArrayHasKey('key', $dates);
        $this->assertEquals(date('Y-m-d', $now), $dates['key']->format('Y-m-d'));
    }
}
