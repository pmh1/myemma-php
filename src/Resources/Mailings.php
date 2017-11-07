<?php

namespace Emma\Resources;

/**
 * Maillings resources
 * @license MIT
 * @copyright 2017 Philip Harvey
 * @author Philip Harvey <philip at bartndrs dot com>
 * @package Resources
 * @link http://api.myemma.com/api/external/mailings.html Emma API Docs.
 */
class Mailings extends Resource
{

  /**
   * Get all Mailings
   * @param array $params Optional query params, expected paramaters are ['include_archived', 'mailing_types', 'mailing_statuses', 'is_scheduled', 'with_html_body', 'with_plaintext', 'count', 'start', 'end']
   *              Emma mailing_types: ‘m’ (standard), ‘t’ (test), ‘r’ (trigger), ‘s’ (split). Defaults to ‘m,t’
   *              Emma mailing_statuses: ‘p’ (pending), ‘a’ (paused), ‘s’ (sending), ‘x’ (canceled), ‘c’ (complete), ‘u’ (unapproved), ‘f’ (failed). Defaults to ‘p,a,s,x,c,u,f’
   * @return Http\Response|ResponseInterface
   */
  public function all($params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', 'mailings', $options);
  }

  /**
   * Get single Mailing
   * @param string $mailingId Emma Mailing ID
   * @param array $params Optional query params, expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getById($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "mailing/{$mailingId}", $options);
  }

  /**
   * Get Members in Mailing
   * @param string $mailingId Emma Mailing ID
   * @param array $params Optional query params, expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getMembersInMailing($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "mailing/{$mailingId}/members", $options);
  }

  /**
   * Get personalized Mailing for Member
   * @param string $mailingId Emma Mailing ID
   * @param string $memberId Emma Member ID
   * @param array $params Optional query params, expected paramaters are ['type', 'count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getPersonalizedMailingForMember($mailingId, $memberId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "mailing/{$mailingId}/messages/{$memberId}", $options);
  }

  /**
   * Get Groups Mailing was sent to
   * @param string $mailingId Emma Mailing ID
   * @param array $params Optional query params, expected paramaters are ['type', 'count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getGroupsInMailing($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "mailing/{$mailingId}/groups", $options);
  }

  /**
   * Get Searches Mailing associated with
   * @param string $mailingId Emma Mailing ID
   * @param array $params Optional query params, expected paramaters are ['type', 'count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getSearchesInMailing($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "mailing/{$mailingId}/searches", $options);
  }

  /**
   * Update Mailing Status
   * @param string $mailingId Emma Mailing ID
   * @param string $status can be `canceled`, `paused` or `ready`
   * @return Http\Response|ResponseInterface
   */
  public function updateStatus($mailingId, $status)
  {
    $options = [
      'json' => ['status' => $status]
    ];
    return $this->client->request('put', "mailing/{$mailingId}", $options);
  }

  /**
   * Archive Mailing
   * @param string $mailingId Emma Mailing ID
   * @return Http\Response|ResponseInterface
   */
  public function archive($mailingId)
  {
    $options = [];
    return $this->client->request('delete', "mailing/{$mailingId}", $options);
  }

  /**
   * Cancel Mailing
   * @param string $mailingId Emma Mailing ID
   * @return Http\Response|ResponseInterface
   */
  public function cancel($mailingId)
  {
    $options = [];
    return $this->client->request('delete', "mailing/cancel/{$mailingId}", $options);
  }

  /**
   * Forward Mailing
   * @param string $mailingId Emma Mailing ID
   * @param string $memberId Emma Member ID
   * @param array $data should contain ['recipient_emails' => [], 'note' => '']
   * @return Http\Response|ResponseInterface
   */
  public function forward($mailingId, $memberId, $data = [])
  {
    $options = [
      'json' => ['status' => $status]
    ];
    return $this->client->request('post', "forwards/{$mailingId}/{$memberId}", $options);
  }

  /**
   * Resend Mailing
   * @param string $mailingId Emma Mailing ID
   * @param array $data should contain ['sender' => '', 'heads_up_emails' => [], 'recipient_emails' => [], 'recipient_groups' => [], 'recipient_searches' => []]
   * @return Http\Response|ResponseInterface
   */
  public function resend($mailingId, $data = [])
  {
    $options = [
      'json' => $data
    ];
    return $this->client->request('post', "mailing/{$mailingId}", $options);
  }

  /**
   * Get Headsup on Mailing
   * @param string $mailingId Emma Mailing ID
   * @param array $params Optional query params, expected paramaters are ['type', 'count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getHeadsupForMailing($mailingId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "mailing/{$mailingId}/headsup", $options);
  }

  /**
   * Validate Mailing
   * @param array $data should contain ['html_body' => '', 'plaintext' => '', 'subject' => '']
   * @return Http\Response|ResponseInterface
   */
  public function validate($data = [])
  {
    $options = [
      'json' => $data
    ];
    return $this->client->request('post', 'mailings/validate', $options);
  }

  /**
   * Delcare Winner in Mailing
   * @param string $mailingId Emma Mailing ID
   * @param string $winnerId Emma Mailing Version ID
   * @return Http\Response|ResponseInterface
   */
  public function declareWinner($mailingId, $winnerId)
  {
    $options = [
    ];
    return $this->client->request('post', "mailings/{$mailingId}/winner/{$winnerId}", $options);
  }

}
