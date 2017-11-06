<?php

namespace Emma\Resources;

/**
 * Response resources
 * @license MIT
 * @copyright 2017 Philip Harvey
 * @author Philip Harvey <philip at bartndrs dot com>
 * @package Resources
 * @link http://api.myemma.com/api/external/response.html Emma API Docs.
 */
class Response extends Resource
{
  /**
   * Get Responses Summary
   * @param array $params Optional expected paramaters are ['include_archived', 'range', 'count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function summary($params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', 'response', $options);
  }

  /**
   * Get Maling Summary Responses
   * @param string $mailingId Emma Mailing ID.
   * @param array $params Optional expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function summaryByMailingId($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "response/{$mailingId}", $options);
  }

  /**
   * Get Maling Sends Responses
   * @param string $mailingId Emma Mailing ID.
   * @param array $params Optional expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function sendsByMailingId($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "response/{$mailingId}/sends", $options);
  }

  /**
   * Get Maling In Progress Responses
   * @param string $mailingId Emma Mailing ID.
   * @param array $params Optional expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function inProgressByMailingId($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "response/{$mailingId}/in_progress", $options);
  }

  /**
   * Get Maling Deliveries Responses
   * @param string $mailingId Emma Mailing ID.
   * @param array $params Optional expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function deliveriesByMailingId($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "response/{$mailingId}/deliveries", $options);
  }

  /**
   * Get Maling Opens Responses
   * @param string $mailingId Emma Mailing ID.
   * @param array $params Optional expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function opensByMailingId($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "response/{$mailingId}/opens", $options);
  }

  /**
   * Get Maling Links Responses
   * @param string $mailingId Emma Mailing ID.
   * @param array $params Optional expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function linksByMailingId($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "response/{$mailingId}/links", $options);
  }

  /**
   * Get Maling clicks Responses
   * @param string $mailingId Emma Mailing ID.
   * @param array $params Optional expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function clicksByMailingId($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "response/{$mailingId}/clicks", $options);
  }

  /**
   * Get Maling Forward Responses
   * @param string $mailingId Emma Mailing ID.
   * @param array $params Optional expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function forwardsByMailingId($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "response/{$mailingId}/forwards", $options);
  }

  /**
   * Get Maling Opt Out Responses
   * @param string $mailingId Emma Mailing ID.
   * @param array $params Optional expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function optoutsByMailingId($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "response/{$mailingId}/optouts", $options);
  }

  /**
   * Get Maling Signup Responses
   * @param string $mailingId Emma Mailing ID.
   * @param array $params Optional expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function signupsByMailingId($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "response/{$mailingId}/signups", $options);
  }

  /**
   * Get Maling Share Responses
   * @param string $mailingId Emma Mailing ID.
   * @param array $params Optional expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function sharesByMailingId($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "response/{$mailingId}/shares", $options);
  }

  /**
   * Get Maling Customer Share Responses
   * @param string $mailingId Emma Mailing ID.
   * @param array $params Optional expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function customerSharesByMailingId($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "response/{$mailingId}/customer_shares", $options);
  }

  /**
   * Get Maling Customer Share Click Responses
   * @param string $mailingId Emma Mailing ID.
   * @param array $params Optional expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function customerShareClicksByMailingId($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "response/{$mailingId}/customer_share_clicks", $options);
  }

  /**
   * Get Customer Share by Share Id
   * @param string $shareId Emma Share ID.
   * @param array $params Optional expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function customerShareByShareId($shareId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "response/{$shareId}/customer_share", $options);
  }

  /**
   * Get Maling Shares Overview Responses
   * @param string $mailingId Emma Mailing ID.
   * @param array $params Optional expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function overallSharesByMailingId($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "response/{$mailingId}/shares/overview", $options);
  }

}
