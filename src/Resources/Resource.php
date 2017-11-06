<?php

namespace Emma\Resources;
use Emma\Http\Client;

/**
 * Base class for Resources
 * @license MIT
 * @copyright 2017 Philip Harvey
 * @author Philip Harvey <philip at bartndrs dot com>
 * @package Resources
 */
class Resource
{
  /**
   * @var Http\Client
   */
  protected $client;

  /**
   * Constructor
   * @param Http\Client $client
   * @param mixed $args
   */
  public function __construct($client, $args = null)
  {
    $this->client = $client;
  }
}
