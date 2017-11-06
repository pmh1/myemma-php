<?php

namespace Emma\Resources;

/**
 * Groups resources
 * @license MIT
 * @copyright 2017 Philip Harvey
 * @author Philip Harvey <philip at bartndrs dot com>
 * @package Resources
 * @link http://api.myemma.com/api/external/groups.html Emma API Docs.
 */
class Groups extends Resource
{
  /**
   * Get all Groups
   * @param array $params Optional query params, expected paramaters are ['group_types', 'count', 'start', 'end']
   *              Emma group_types are: ‘g’ (group), ‘t’ (test), ‘h’ (hidden), ‘all’ (all)
   * @return Http\Response|ResponseInterface
   */
  public function all($params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', 'groups', $options);
  }

  /**
   * Create New Group
   * @param array $groups Array of Group(s) with `group_name` [ ['group_name' => ''] ]
   * @return Http\Response|ResponseInterface
   */
  public function create($groups = [])
  {
    $options = [
      'json' => ['groups' => $groups]
    ];
    return $this->client->request('post', 'groups', $options);
  }

  /**
   * Get single Group
   * @param string $groupId Emma Group ID
   * @param array $params Optional query params, expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getById($groupId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "groups/{$groupId}", $options);
  }

  /**
   * Update single Group
   * @param string $groupId Emma Group ID
   * @param array $data data to update ['group_name' => '']
   * @return Http\Response|ResponseInterface
   */
  public function update($groupId, $data = [])
  {
    $options = [
      'json' => $data
    ];
    return $this->client->request('put', "groups/{$groupId}", $options);
  }

  /**
   * Delete single Group
   * @param string $groupId Emma Group ID
   * @return Http\Response|ResponseInterface
   */
  public function delete($groupId)
  {
    return $this->client->request('delete', "groups/{$groupId}");
  }

  /**
   * Get Members in a Group
   * @param string $groupId Emma Group ID
   * @param array $params Optional query params, expected paramaters are ['deleted', 'count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getMembersInGroup($groupId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "groups/{$groupId}/members", $options);
  }

  /**
   * Add Members to a Group
   * @param string $groupId Emma Group ID
   * @param array $members array of Member ID's
   * @return Http\Response|ResponseInterface
   */
  public function addMembers($groupId, $members = [])
  {
    $options = [
      'json' => ['member_ids' => $members]
    ];
    return $this->client->request('put', "groups/{$groupId}/members", $options);
  }

  /**
   * Remove Members from a Group
   * @param string $groupId Emma Group ID
   * @param array $members array of Member ID's
   * @return Http\Response|ResponseInterface
   */
  public function deleteMembers($groupId, $members = [])
  {
    $options = [
      'json' => ['member_ids' => $members]
    ];
    return $this->client->request('put', "groups/{$groupId}/members/remove", $options);
  }

  /**
   * Remove All Members in a Group
   * @param string $groupId Emma Group ID
   * @param array $params Optional query params. Expected ['member_status_id'] values are ‘a’ (active), ‘o’ (optout), or ‘e’ (error)
   * @return Http\Response|ResponseInterface
   */
  public function deleteAllMembers($groupId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('delete', "groups/{$groupId}/members", $options);
  }

  /**
   * Remove All Members in a Group as a Background Job
   * @param string $groupId Emma Group ID
   * @param string $memberStatusId string must be ‘a’ (active), ‘o’ (optout), or ‘e’ (error)
   * @param array $params Optional query params. `member_status_id` will be overriden by $memberStatusId
   * @return Http\Response|ResponseInterface
   */
  public function deleteAllMembersBackground($groupId, $memberStatusId, $params = [])
  {
    $options = [
      'query' => array_merge($params, ['member_status_id' => $memberStatusId])
    ];
    return $this->client->request('delete', "groups/{$groupId}/members/remove", $options);
  }

  /**
   * Copy Members from a Group to another Group
   * @param string $fromGroupId Emma Group ID
   * @param string $toGroupId Emma Group ID
   * @param string $memberStatusId string must be ‘a’ (active), ‘o’ (optout), or ‘e’ (error)
   * @return Http\Response|ResponseInterface
   */
  public function copyMembers($fromGroupId, $toGroupId, $memberStatusId)
  {
    $options = [
      'json' => ['member_status_id' => $memberStatusId]
    ];
    return $this->client->request('put', "groups/{$fromGroupId}/{$toGroupId}/members/copy", $options);
  }

}
