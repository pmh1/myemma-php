<?php

namespace Emma\Tests\Resources;

use Emma\Factory;
use Emma\Resources\SignupForms;
use Emma\Http\Response;
use Emma\Exceptions\BadRequest;
use PHPUnit\Framework\TestCase;

final class SignupFormsTest extends TestCase
{

  protected static $emma;

  public static function setUpBeforeClass()
  {
    self::$emma = Factory::create('123456', 'XXXXXXXXXXXXXXXXXXXX', 'XXXXXXXXXXXXXXXXXXXX');
    sleep(1);
  }

  public static function tearDownAfterClass()
  {
    self::$emma = null;
  }

  public function testSignupFormGetAll()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->signupForms()->all();
  }

}
