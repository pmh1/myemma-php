<?php

namespace Emma\Resources;

/**
 * Webhooks resources
 * @license MIT
 * @copyright 2017 Philip Harvey
 * @author Philip Harvey <philip at bartndrs dot com>
 * @package Resources
 * @link http://api.myemma.com/api/external/webhooks.html Emma API Docs.
 */
class Webhooks extends Resource
{

  /**
   * Get all Webhooks
   * @param array $params Optional query params, expected paramaters are [count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function all($params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', 'webhooks', $options);
  }

  /**
   * Get Webhook by ID.
   * @param string $webhookId Emma Webhook ID
   * @param array $params Optional query params, expected paramaters are [count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getById($webhookId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "webhooks/{$webhookId}", $options);
  }

  /**
   * Get Webhook Events
   * @param array $params Optional query params, expected paramaters are [count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getAllEvents($params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', 'webhooks/events', $options);
  }

  /**
   * Create new Webhook.
   * @param array $data Emma Webhook data ['event', 'url', 'method', 'public_key']
   * @return Http\Response|ResponseInterface
   */
  public function create($data = [])
  {
    $options = [
      'json' => $data
    ];
    return $this->client->request('post', 'webhooks', $options);
  }

  /**
   * Update a Webhook.
   * @param string $webhookId Emma Webhook ID
   * @param array $data Emma Webhook data ['event', 'url', 'method', 'public_key']
   * @return Http\Response|ResponseInterface
   */
  public function update($webhookId, $data = [])
  {
    $options = [
      'json' => $data
    ];
    return $this->client->request('put', "webhooks/{$webhookId}", $options);
  }

  /**
   * Delete a Webhook.
   * @param string $webhookId Emma Webhook ID
   * @return Http\Response|ResponseInterface
   */
  public function delete($webhookId)
  {
    $options = [];
    return $this->client->request('delete', "webhooks/{$webhookId}", $options);
  }

  /**
   * Delete all Webhooks.
   * @return Http\Response|ResponseInterface
   */
  public function deleteAll()
  {
    $options = [];
    return $this->client->request('delete', 'webhooks', $options);
  }

}
