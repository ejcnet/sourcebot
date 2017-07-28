<?php

use Ejcnet\Sourcebot\Sourcebot;

/**
 * @covers Ejcnet\Sourcebot\Sourcebot
 */
class SourcebotTest extends \PHPUnit\Framework\TestCase {

  public function testSourcebotHelloWorld()
  {
    $sourcebot = new Sourcebot;
    $this->assertTrue($sourcebot->helloWorld());
  }

}
