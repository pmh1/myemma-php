<?php

namespace Emma\Tests;

use Emma\Factory;
use Emma\Resources\SignupForms;
use Emma\Exceptions\InvalidArgument;
use PHPUnit\Framework\TestCase;

final class FactoryTest extends TestCase
{

  public function testCanCreateInstanceWithCredentials()
  {
    $this->assertInstanceOf(
      Factory::class,
      Factory::create('123456', 'XXXXXXXXXXXXXXXXXXXX', 'XXXXXXXXXXXXXXXXXXXX')
    );
  }

  public function testCreateWithoutAccountId()
  {
    $this->expectException(InvalidArgument::class);
    $emma = Factory::create('', 'XXXXXXXXXXXXXXXXXXXX', 'XXXXXXXXXXXXXXXXXXXX');
  }

  public function testCreateWithoutAuth()
  {
    $this->expectException(InvalidArgument::class);
    $emma = Factory::create('123456', null, null);
  }

  public function testRequestInvalidResource()
  {
    $this->expectException(InvalidArgument::class);
    $emma = Factory::create('123456', 'XXXXXXXXXXXXXXXXXXXX', 'XXXXXXXXXXXXXXXXXXXX');
    $invalid = $emma->doesNotExsist();
  }

  public function testRequestValidResource()
  {
    $emma = Factory::create('123456', 'XXXXXXXXXXXXXXXXXXXX', 'XXXXXXXXXXXXXXXXXXXX');
    $this->assertInstanceOf(
      SignupForms::class,
      $emma->signupForms()
    );
  }

}
