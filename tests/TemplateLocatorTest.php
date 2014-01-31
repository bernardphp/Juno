<?php

namespace Juno\Tests;

use Juno\TemplateLocator;

class TemplateLocatorTest extends \PHPUnit_Framework_TestCase
{
    public function testLocate()
    {
        $path = __DIR__ . '/Fixtures';

        $locator = new TemplateLocator(array($path));

        $this->assertEquals(__DIR__ . '/Fixtures/template.html', $locator->locate('template.html'));
    }

    public function testOverride()
    {
        $locator = new TemplateLocator(array(
            __DIR__ . '/Fixtures',
        ));

        $locator->add(__DIR__ . '/Fixtures/override');

        $this->assertEquals(__DIR__ . '/Fixtures/override/template.html', $locator->locate('template.html'));
    }
}
