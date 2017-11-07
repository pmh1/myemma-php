<?php

namespace Emma\Tests\Resources;

use Emma\Factory;
use Emma\Resources\Mailings;
use Emma\Http\Response;
use Emma\Exceptions\BadRequest;
use PHPUnit\Framework\TestCase;

final class MailingTest extends TestCase
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

  public function testMailingsGetAll()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->mailings()->all();
  }

  public function testMailingsGetById()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->mailings()->getById(111);
  }

  public function testGetMembersInMailing()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->mailings()->getMembersInMailing(111);
  }

  public function testPersonalizedMememberMailing()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->mailings()->getPersonalizedMailingForMember(111, 12);
  }

  public function testGetGroupsInMailing()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->mailings()->getGroupsInMailing(111);
  }

  public function testGetSearchesInMailing()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->mailings()->getSearchesInMailing(111);
  }

  public function testUpdateMailingStatus()
  {
    $this->expectException(BadRequest::class);
    $data = ['status' => 'canceled'];
    $response = self::$emma->mailings()->updateStatus(111, $data);
  }

  public function testArchiveMailing()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->mailings()->archive(111);
  }

  public function testCancelMailing()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->mailings()->cancel(111);
  }

  public function testForwardMailing()
  {
    $this->expectException(BadRequest::class);
    $data = ['recipient_emails' => ['test123@gmail.com'] ];
    $response = self::$emma->mailings()->forward(111, $data);
  }

  public function testResendMailing()
  {
    $this->expectException(BadRequest::class);
    $data = ['recipient_emails' => ['test123@gmail.com'] ];
    $response = self::$emma->mailings()->resend(111, $data);
  }

  public function testGetHeadsupForMailing()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->mailings()->getHeadsupForMailing(111);
  }

  public function testValidateMailingContent()
  {
    $this->expectException(BadRequest::class);
    $data = ['subject' => 'Another Test'];
    $response = self::$emma->mailings()->validate($data);
  }

  public function testDeclareTestWinner()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->mailings()->declareWinner(111, 102);
  }


}
