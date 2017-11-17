<?php

namespace Emma\Http;

use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;
use Emma\Exceptions\BadRequest;
use Emma\Exceptions\InvalidArgument;

/**
 * Base Client to handle all HTTP requests to Emma
 * @license MIT
 * @copyright 2017 Philip Harvey
 * @author Philip Harvey <philip at bartndrs dot com>
 * @package Http
 */
class Client
{
  /**
   * Emma API URL
   * @var string
   */
  private $endpointUrl = 'https://api.e2ma.net/';

  /**
   * Emma Account ID
   * @var string
   */
  protected $accountId;

  /**
   * @var \GuzzleHttp\Client
   */
  protected $client;

  /**
   * Guzzle client options
   * @var array
   */
  protected $clientOptions = [];

  /**
   * Return Emma\Http\Response if true or a GuzzleHttp\Psr7\Response if false
   * @var bool
   */
  protected $wrapResponse = true;

  /**
   * UserAgent used with API calls
   * @var string
   */
  private $userAgent = 'MyEmma_PHP/1.0.0-dev1 (https://github.com/pmh1/myemma-php)';

  /**
   * Setup Emma Client
   * @param string $accountId Emma Account ID;
   * @param array $auth Emma Authorization details ['public_key' => '', 'private_key'=> ''] or ['public_key', 'private_key']
   * @param GuzzleClient $client Optional. A New Guzzle instance is used if not specified.
   * @param array $clientOptions Guzzle Client Options
   * @param bool $wrapResponse Use Emma\Http\Response or GuzzleHttp\Psr7\Response
   * @throws InvalidArgument
   */
   public function __construct($accountId, $auth = [], $client = null, $clientOptions = [], $wrapResponse = true)
   {

     if (!isset($accountId) || empty($accountId))
     {
       throw new InvalidArgument("Auth Error: accountId not set");
     }
     $this->accountId = $accountId;

     if (is_array($auth) && count($auth) == 2 && !empty(array_filter($auth, 'strlen')))
     {
       if (array_key_exists('public_key', $auth))
       {
         $this->clientOptions['auth'] = [ $auth['public_key'], $auth['private_key'] ];
       }
       else
       {
         $this->clientOptions['auth'] = $auth;
       }
     }
     else {
       throw new InvalidArgument('No Authorization Provided or Incorrect options used. should be [\'public_key\' => \'\', \'private_key\'=> \'\'] or [\'public_key\', \'private_key\']');
     }

     $this->client = $client ?: new GuzzleClient();
     $this->clientOptions = array_merge($this->clientOptions, $clientOptions);
     $this->wrapResponse = $wrapResponse;
   }

   /**
   * Send request to Emma
   * @param string $method The HTTP request verb
   * @param string $endpoint The Emma API endpoint to send request to
   * @param array $options An array of Guzzle Options to send with the request
   * @param string $queryString A query string to send with the request
   * @return \Emma\Http\Response|ResponseInterface
   * @throws \Emma\Exceptions\BadRequest
   */
  public function request($method, $endpoint, $options = [], $queryString = null)
  {
    $url = $this->generateUrl($endpoint, $queryString);

    $options = array_merge($this->clientOptions, $options);
    $options["headers"]["User-Agent"] = $this->userAgent;

    try {
      if ($this->wrapResponse === false) {
        return $this->client->request($method, $url, $options);
      }
      return new Response($this->client->request($method, $url, $options));
    } catch (\GuzzleHttp\Exception\BadResponseException $e) {
      throw new BadRequest(\GuzzleHttp\Psr7\str($e->getResponse()), $e->getCode(), $e);
    } catch (\Exception $e) {
      throw new BadRequest($e->getMessage(), $e->getCode(), $e);
    }
  }

  /**
   * Generate the endpoint url, including query string.
   * @param string $endpoint The Emma API endpoint.
   * @param string $queryString The query string to send to the endpoint.
   * @return string
   */
  protected function generateUrl($endpoint, $queryString = null)
  {
    $url = $this->endpointUrl . $this->accountId . '/' . ( substr($endpoint, 0, 1) == '/' ? substr($endpoint, 1) : $endpoint );
    return $url . ( is_null($queryString) ? '' : '?'.$queryString );
  }

}
