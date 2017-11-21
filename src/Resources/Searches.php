<?php

namespace Emma\Resources;

/**
 * Searches resources
 * @license MIT
 * @copyright 2017 Philip Harvey
 * @author Philip Harvey <philip at bartndrs dot com>
 * @package Resources
 * @link http://api.myemma.com/api/external/searches.html Emma API Docs.
 */
class Searches extends Resource
{
  /**
   * Get all Searches
   * @param array $params Optional query params, expected paramaters are ['deleted', 'count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function all($params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', 'searches', $options);
  }

  /**
   * Get single Search
   * @param string $searchId Emma Search ID
   * @param array $params Optional query params, expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getById($searchId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "searches/{$searchId}", $options);
  }

  /**
   * Create New Search
   * @param array $data Parameters to create Search with requires ['name', 'criteria']
   * @return Http\Response|ResponseInterface
   * @link http://api.myemma.com/member_search.html Search Criteria Reference.
   */
  public function create($data = [])
  {
    $options = [
      'json' => $data
    ];
    return $this->client->request('post', 'searches', $options);
  }

  /**
   * Update Search
   * @param string $searchId Emma Search ID
   * @param array $data Parameters to create Search with requires ['name', 'criteria']
   * @return Http\Response|ResponseInterface
   * @link http://api.myemma.com/member_search.html Search Criteria Reference.
   */
  public function update($searchId, $data = [])
  {
    $options = [
      'json' => $data
    ];
    return $this->client->request('put', "searches/{$searchId}", $options);
  }

  /**
   * Delete single Search
   * @param string $searchId Emma Search ID
   * @return Http\Response|ResponseInterface
   */
  public function delete($searchId)
  {
    return $this->client->request('delete', "searches/{$searchId}");
  }

  /**
   * Get Members in Search Results
   * @param string $searchId Emma Search ID
   * @param array $params Optional query params, expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getMembersInSearch($searchId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "searches/{$searchId}/members", $options);
  }
}
