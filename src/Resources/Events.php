<?php

namespace Emma\Resources;

/**
 * Events resources
 * @license MIT
 * @copyright 2017 Philip Harvey
 * @author Philip Harvey <philip at bartndrs dot com>
 * @package Resources
 * @link http://api.myemma.com/api/external/event_api.html Emma API Docs.
 */
class Events extends Resource
{
  /**
   * Create new event.
   * @param array $data Emma Event data ['email', 'event_name', ...]
   * @return Http\Response|ResponseInterface
   */
  public function create($data = [])
  {
    $options = [
      'json' => $data
    ];
    return $this->client->request('post', 'https://events.e2ma.net/v1/{{accountId}}/events', $options);
  }

}
