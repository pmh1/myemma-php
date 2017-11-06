<?php

namespace Emma\Tests\Resources;

use Emma\Factory;
use Emma\Resources\Fields;
use Emma\Http\Response;
use Emma\Exceptions\BadRequest;
use PHPUnit\Framework\TestCase;

final class FieldsTest extends TestCase
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

  public function testFieldsGetAll()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->fields()->all();
  }

  public function testGetSingleField()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->fields()->getById(111);
  }

  public function testCreateField()
  {
    $this->expectException(BadRequest::class);
    $data = [
      'shortcut_name' => 'new_field_' . uniqid(),
      'column_order' => 1,
      'display_name' => 'A New Field',
      'field_type' => 'text'
    ];
    $response = self::$emma->fields()->create($data);
  }

  public function testDeleteField()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->fields()->delete(111);
  }

  public function testClearField()
  {
    $this->expectException(BadRequest::class);
    $response = self::$emma->fields()->clear(111);
  }

  public function testUpdateField()
  {
    $this->expectException(BadRequest::class);
    $data = [
      'display_name' => 'Updated New Field'
    ];
    $response = self::$emma->fields()->update(111, $data);
  }

}
