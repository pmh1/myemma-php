<?php

namespace Emma\Tests\Resources;

use Emma\Factory;
use Emma\Resources\Webhooks;
use Emma\Http\Response;
use Emma\Exceptions\BadRequest;
use PHPUnit\Framework\TestCase;

final class WebhooksTest extends TestCase
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

  public function testWebhooksGetAll()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->webhooks()->all();
  }

  public function testWebhooksGetSingle()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->webhooks()->getById(121);
  }

  public function testGetAllEvents()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->webhooks()->getAllEvents();
  }

  public function testCreateWebhook()
  {
    $this->expectException(BadRequest::class);
    $data = [
      'url' => 'https://www.google.com',
      'event' => 'mailing_finish'
    ];
    $response = self::$emma->webhooks()->create($data);
  }

  public function testUpdateWebhook()
  {
    $this->expectException(BadRequest::class);
    $data = [
      'url' => 'https://www.yahoo.com',
      'event' => 'mailing_finish'
    ];
    $response = self::$emma->webhooks()->update($data);
  }

  public function testDeleteWebhook()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->webhooks()->delete(111);
  }

  public function testDeleteAllWebhooks()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->webhooks()->deleteAll();
  }

}
