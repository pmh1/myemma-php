<?php

namespace Emma\Tests\Resources;

use Emma\Factory;
use Emma\Resources\Searches;
use Emma\Http\Response;
use Emma\Exceptions\BadRequest;
use PHPUnit\Framework\TestCase;

final class SearchesTest extends TestCase
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

  public function testSearchesGetAll()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->searches()->all();
  }

  public function testGetSingleSearch()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->searches()->getById(121);
  }

  public function testCreateSearch()
  {
    $this->expectException(BadRequest::class);
    $data = [
      'name' => 'Test Search',
      'criteria' => [ 'or' => [
          ['group', 'eq', 'Monthly Newsletter']
        ]
      ]
    ];
    $response = self::$emma->searches()->create($data);
  }

  public function testUpdateSearch()
  {
    $this->expectException(BadRequest::class);
    $data = [
      'name' => 'Test Search Update',
      'criteria' => [ 'or' => [
          ['group', 'eq', 'Monthly Newsletter']
        ]
      ]
    ];
    $response = self::$emma->searches()->update(111,$data);
  }

  public function testDeleteSearch()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->searches()->delete(121);
  }

  public function testGetMembersInSearch()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->searches()->getMembersInSearch(121);
  }

}
