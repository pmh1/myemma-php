<?php

namespace Emma\Tests\Resources;

use Emma\Factory;
use Emma\Resources\Groups;
use Emma\Http\Response;
use Emma\Exceptions\BadRequest;
use PHPUnit\Framework\TestCase;

final class GroupsTest extends TestCase
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

  public function testGroupsGetAll()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->groups()->all();
  }

  public function testCreateGroup()
  {
    $this->expectException(BadRequest::class);
    $data = [
      ['group_name' => 'My Group Here']
    ];
    $response = self::$emma->groups()->create($data);
  }

  public function testGetGroupById()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->groups()->getById(111);
  }

  public function testUpdateGroup()
  {
    $this->expectException(BadRequest::class);
    $data = ['group_name' => 'My New Group Here'];
    $response = self::$emma->groups()->update(111, $data);
  }

  public function testDeleteGroup()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->groups()->delete(111);
  }

  public function testGetMembersInGroupById()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->groups()->getMembersInGroup(111);
  }

  public function testAddMembersToGroup()
  {
    $this->expectException(BadRequest::class);
    $data = [1];
    $response = self::$emma->groups()->addMembers(111, $data);
  }

  public function testRemoveMembersFromGroup()
  {
    $this->expectException(BadRequest::class);
    $data = [1, 2];
    $response = self::$emma->groups()->deleteMembers(111, $data);
  }

  public function testRemoveAllMembersFromGroup()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->groups()->deleteAllMembers(111);
  }

  public function testRemoveAllMembersFromGroupBackground()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->groups()->deleteAllMembersBackground(111, 'a');
  }

  public function testCopyGroups()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->groups()->copyMembers(111, 112, 'a');
  }

}
