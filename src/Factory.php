<?php

namespace Emma;

use Emma\Http\Client;
use Emma\Http\Response;
use Emma\Exceptions\InvalidArgument;

/**
 * Factory Class for Emma API Wrapper
 * @license MIT
 * @copyright 2017 Philip Harvey
 * @author Philip Harvey <philip at bartndrs dot com>
 *
 * @method Emma\Resources\Fields fields()
 * @method Emma\Resources\Groups groups()
 * @method Emma\Resources\Mailings mailings()
 * @method Emma\Resources\Members members()
 * @method Emma\Resources\Response response()
 * @method Emma\Resources\Searches searches()
 * @method Emma\Resources\SignupForms signupForms()
 * @method Emma\Resources\Webhooks webhooks()
 */
class Factory
{

  /**
   * Constructor
   * @param string $accountId Emma Account ID
   * @param array $auth Emma Authorization details ['public_key' => '', 'private_key'=> ''] or ['public_key', 'private_key']
   * @param Client $client
   * @param array $clientOptions Guzzle Options to be sent with requests
   * @param bool $wrapResponse Use Emma\Http\Response (true) or GuzzleHttp\Psr7\Response (false)
   */
  public function __construct($accountId, $auth = [], $client = null, $clientOptions = [], $wrapResponse = true)
  {
    $this->client = $client ?: new Client($accountId, $auth, $client, $clientOptions, $wrapResponse);
  }

  /**
   * Create Instance with defined paramaters
   * @param string $accountId Emma Account ID
   * @param string $publicKey Emma API Public Key
   * @param string $privateKey Emma API Private Key
   * @param Client $client
   * @param array $clientOptions Guzzle Options to be sent with requests
   * @param bool $wrapResponse Use Emma\Http\Response (true) or GuzzleHttp\Psr7\Response (false)
   @static
   */
   public static function create($accountId, $publicKey, $privateKey, $client = null, $clientOptions = [], $wrapResponse = true)
   {
     return new static($accountId, [$publicKey, $privateKey], $client, $clientOptions, $wrapResponse);
   }

   /**
    * Instantiate Resource Class Dynamically
    * @param string $name Resource name
    * @param array $args Arguments
    * @return Emma\Resources\Resource
    * @throws Emma\Exceptions\InvalidArgument
    */
  public function __call($name, $args = null)
  {
    $className = __NAMESPACE__ . '\\Resources\\' . ucfirst($name);
    try
    {
      if ( (new \ReflectionClass($className))->isInstantiable() )
      {
        return new $className($this->client, $args);
      }
    }
    catch(\ReflectionException $e)
    {
      throw new InvalidArgument('Resource Type not defined');
    }
  }

}
