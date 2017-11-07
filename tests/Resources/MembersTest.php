<?php

namespace Emma\Tests\Resources;

use Emma\Factory;
use Emma\Resources\Members;
use Emma\Http\Response;
use Emma\Exceptions\BadRequest;
use PHPUnit\Framework\TestCase;

final class MembersTest extends TestCase
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

  public function testMembersGetAll()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->all();
  }

  public function testMemberById()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->getById(111);
  }

  public function testMemberByEmail()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->getByEmail('test123@gmail.com');
  }

  public function testCheckOutput()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->checkOptoutById(111);
  }

  public function testOptoutEmail()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->optoutByEmail('test123@gmail.com');
  }

  public function testAddMembers()
  {
    $this->expectException(BadRequest::class);
    $data = [
      'members' => [ ['email' => 'test123@gmail.com'], ['email' => 'test12345@gmail.com'] ]
    ];
    $response = self::$emma->members()->addMembers($data);
  }

  public function testCreateMember()
  {
    $this->expectException(BadRequest::class);
    $data = [
      'email' => 'test123@gmail.com',
      'fields' => [
        'first_name' => 'Hola'
      ]
    ];
    $response = self::$emma->members()->create($data);
  }

  public function testSignupMember()
  {
    $this->expectException(BadRequest::class);
    $data = [
      'email' => 'test123@gmail.com',
      'fields' => [
        'first_name' => 'Hola'
      ]
    ];
    $response = self::$emma->members()->signup($data);
  }

  public function testDeleteMembers()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->deleteMembers([101, 102]);
  }

  public function testUpdateMemberStatus()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->updateMemberStatus([101, 102], 'a');
  }

  public function testUpdateMember()
  {
    $this->expectException(BadRequest::class);
    $data = [
      'email' => 'test123@gmail.com',
      'fields' => [
        'first_name' => 'Hola'
      ]
    ];
    $response = self::$emma->members()->update(111, $data);
  }

  public function testDeleteMember()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->delete(111);
  }

  public function testMemberGroups()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->getMemberGroups(111);
  }

  public function testAddMemberToGroups()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->addMemberToGroups(111, [101, 102]);
  }

  public function testDeleteMemberFromGroups()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->deleteMemberFromGroups(111, [101, 102]);
  }

  public function testDeleteAllMembers()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->deleteAll();
  }

  public function testRemoveMemberFromAllGroups()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->removeFromAllGroups(111);
  }

  public function testDeleteMembersFromGroups()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->deleteMembersFromGroups([111,112], [101, 102]);
  }

  public function testGetMemberMailings()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->getMemberMailingHistory(111);
  }

  public function testImportedMembers()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->getImportMembers(102);
  }

  public function testImportStatus()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->getImportById(102);
  }

  public function testImportOverview()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->getImports();
  }

  public function testCopyMembersToGroup()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->copyMembersToGroupByStatus(102, 'a');
  }

  public function testChangeMemberStatusInGroup()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->members()->changeMemberStatusInGroup('a', 'e');
  }

}
