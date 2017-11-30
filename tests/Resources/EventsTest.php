<?php

namespace Emma\Tests\Resources;

use Emma\Factory;
use Emma\Resources\Webhooks;
use Emma\Http\Response;
use Emma\Exceptions\BadRequest;
use PHPUnit\Framework\TestCase;

final class EventsTest extends TestCase
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

  public function testCreateEvent()
  {
    $this->expectException(BadRequest::class);
    $data = [
      'email' => 'test123@gmail.com',
      'event_name' => 'test-event'
    ];
    $response = self::$emma->events()->create($data);
  }

}
