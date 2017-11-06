<?php

namespace Emma\Tests\Resources;

use Emma\Factory;
use Emma\Resources\Response;
use Emma\Http\Response as HttpResponse;
use Emma\Exceptions\BadRequest;
use PHPUnit\Framework\TestCase;

final class ResponseTest extends TestCase
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

  public function testResponseSummary()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->response()->summary();
  }

  public function testResponseSummaryByMailing()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->response()->summaryByMailingId(111);
  }

  public function testMailingSends()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->response()->sendsByMailingId(111);
  }

  public function testMailingInProgress()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->response()->inProgressByMailingId(111);
  }

  public function testMailingDeliveries()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->response()->deliveriesByMailingId(111);
  }

  public function testMailingOpens()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->response()->opensByMailingId(111);
  }

  public function testMailingLinks()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->response()->linksByMailingId(111);
  }

  public function testMailingClicks()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->response()->clicksByMailingId(111);
  }

  public function testMailingForwards()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->response()->forwardsByMailingId(111);
  }

  public function testMailingOptOuts()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->response()->optoutsByMailingId(111);
  }

  public function testMailingSignups()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->response()->signupsByMailingId(111);
  }

  public function testMailingShares()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->response()->sharesByMailingId(111);
  }

  public function testMailingCustomerShares()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->response()->customerSharesByMailingId(111);
  }

  public function testMailingCustomerShareClicks()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->response()->customerShareClicksByMailingId(111);
  }

  public function testCustomerShareClicks()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->response()->customerShareByShareId(111);
  }

  public function testMailingShareOverview()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->response()->overallSharesByMailingId(111);
  }

}
