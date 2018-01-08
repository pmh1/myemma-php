<?php

namespace Emma\Resources;

/**
 * Members resources
 * @license MIT
 * @copyright 2017 Philip Harvey
 * @author Philip Harvey <philip at bartndrs dot com>
 * @package Resources
 * @link http://api.myemma.com/api/external/members.html Emma API Docs.
 */
class Members extends Resource
{

  /**
   * Get all Members
   * @param array $params Optional query params, expected paramaters are ['deleted', 'count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function all($params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', 'members', $options);
  }

  /**
   * Get Member by ID
   * @param string $memberId Emma Member Id
   * @param array $params Optional query params, expected paramaters are ['deleted', 'count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getById($memberId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "members/{$memberId}", $options);
  }

  /**
   * Get Member by Email
   * @param string $email Emma Member email
   * @param array $params Optional query params, expected paramaters are ['deleted', 'count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getByEmail($email, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "members/email/{$email}", $options);
  }


  /**
   * Is Member OptedOut
   * @param string $memberId Emma Member Id
   * @param array $params Optional query params, expected paramaters are ['deleted', 'count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function checkOptoutById($memberId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "members/{$memberId}/optout", $options);
  }

  /**
   * Optout Member by Email
   * @param string $email Emma Member email
   * @param array $params Optional query params, expected paramaters are ['deleted', 'count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function optoutByEmail($email, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('put', "members/email/optout/{$email}", $options);
  }

  /**
   * Bulk add Members
   * @param array $data Should include ['members' => [...['email']...], 'automate_field_changes', 'source_filename', 'add_only', 'group_ids']
   * @return Http\Response|ResponseInterface
   */
  public function addMembers($data = [])
  {
    $options = [
      'json' => $data
    ];
    return $this->client->request('post', 'members', $options);
  }

  /**
   * Add single Member
   * @param array $data Should include ['email' => '', 'fields' => [], 'group_ids' => [], 'field_triggers']
   * @return Http\Response|ResponseInterface
   */
  public function create($data = [])
  {
    $options = [
      'json' => $data
    ];
    return $this->client->request('post', 'members/add', $options);
  }

  /**
   * Signup Member
   * @param array $data Should include ['email' => '', 'fields' => [], 'group_ids' => [], 'field_triggers', 'signup_form_id' => '', 'opt_in_subject' => '', 'opt_in_message' => '', 'opt_in_confirmation']
   * @return Http\Response|ResponseInterface
   */
  public function signup($data = [])
  {
    $options = [
      'json' => $data
    ];
    return $this->client->request('post', 'members/signup', $options);
  }

  /**
   * Delete Members
   * @param array $memberIds Emma Member IDs
   * @return Http\Response|ResponseInterface
   */
  public function deleteMembers($memberIds = [])
  {
    $options = [
      'json' => ['member_ids' => $memberIds ]
    ];
    return $this->client->request('put', 'members/delete', $options);
  }

  /**
   * Update Members Status
   * @param array $memberIds Emma Member IDs
   * @param string $statusTo Emma Status accepts: ‘a’ (active), ‘e’ (error), ‘o’ (optout).
   * @return Http\Response|ResponseInterface
   */
  public function updateMemberStatus($memberIds = [], $statusTo)
  {
    $options = [
      'json' => [
        'member_ids' => $memberIds,
        'status_to' => $statusTo
      ]
    ];
    return $this->client->request('put', 'members/status', $options);
  }

  /**
   * Update Member
   * @param string $memberId Emma Member ID
   * @param array $data Should include ['email' => '', 'status_to', 'fields' => [], 'field_triggers']
   * @return Http\Response|ResponseInterface
   */
  public function update($memberId, $data = [])
  {
    $options = [
      'json' => $data
    ];
    return $this->client->request('put', "members/{$memberId}");
  }

  /**
   * Delete Member
   * @param string $memberId Emma Member ID
   * @return Http\Response|ResponseInterface
   */
  public function delete($memberId)
  {
    return $this->client->request('delete', "members/{$memberId}");
  }

  /**
   * Get Member's Groups by ID
   * @param string $memberId Emma Member Id
   * @param array $params Optional query params, expected paramaters are ['deleted', 'count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getMemberGroups($memberId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "members/{$memberId}/groups", $options);
  }

  /**
   * Add Member to Groups
   * @param string $memberId Emma Member Id
   * @param array $groupIds Group IDs to add Member to
   * @return Http\Response|ResponseInterface
   */
  public function addMemberToGroups($memberId, $groupIds = [])
  {
    $options = [
      'json' => ['group_ids' => $groupIds]
    ];
    return $this->client->request('put', "members/{$memberId}/groups", $options);
  }

  /**
   * Remove Member from Groups
   * @param string $memberId Emma Member Id
   * @param array $groupIds Group IDs to add Member to
   * @return Http\Response|ResponseInterface
   */
  public function deleteMemberFromGroups($memberId, $groupIds = [])
  {
    $options = [
      'json' => ['group_ids' => $groupIds]
    ];
    return $this->client->request('put', "members/{$memberId}/groups/remove", $options);
  }

  /**
   * Delete all Members
   * @param array $params Optional query params, expected paramaters are ['member_status_id'] values are ‘a’ (active), ‘o’ (optout), or ‘e’ (error)
   * @return Http\Response|ResponseInterface
   */
  public function deleteAll($params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('delete', 'members', $options);
  }

  /**
   * Remove Member from All Groups
   * @param string $memberId Emma Member Id
   * @return Http\Response|ResponseInterface
   */
  public function removeFromAllGroups($memberId)
  {
    $options = [
    ];
    return $this->client->request('delete', "members/{$memberId}/groups", $options);
  }

  /**
   * Remove Members from Groups
   * @param array $memberIds Emma Member Id
   * @param array $groupIds Group IDs to add Member to
   * @return Http\Response|ResponseInterface
   */
  public function deleteMembersFromGroups($memberIds = [], $groupIds = [])
  {
    $options = [
      'json' => [
        'member_ids' => $memberIds,
        'group_ids' => $groupIds
      ]
    ];
    return $this->client->request('put', 'members/groups/remove', $options);
  }

  /**
   * Get Member Mailing History
   * @param string $memberId Emma Member Id
   * @param array $params Optional query params, expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getMemberMailingHistory($memberId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "members/{$memberId}/mailings", $options);
  }

  /**
   * Get Import Members
   * @param string $importId Emma Import Id
   * @param array $params Optional query params, expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getImportMembers($importId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "members/imports/{$importId}/members", $options);
  }

  /**
   * Get Import Details
   * @param string $importId Emma Import Id
   * @param array $params Optional query params, expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getImportById($importId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "members/imports/{$importId}", $options);
  }

  /**
   * Get Import Summary
   * @param array $params Optional query params, expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getImports($params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', 'members/imports', $options);
  }

  /**
   * Copy Members to Group by Status
   * @param string $groupId Emma Group ID
   * @param array $status Accepts array of ‘a’ (active), ‘o’ (optout), and/or ‘e’ (error)
   * @return Http\Response|ResponseInterface
   */
  public function copyMembersToGroupByStatus($groupId, $status = [])
  {
    $options = [
      'json' => ['member_status_id' => $status]
    ];
    return $this->client->request('put', "members/${groupId}/copy", $options);
  }

  /**
   * Change Member status from X to Y in Group(s)
   * @param array $statusFrom Accepts ‘a’ (active), ‘o’ (optout), ‘e’ (error), or ‘f’ (forwarded)
   * @param array $statusTo Accepts ‘a’ (active), ‘o’ (optout), ‘e’ (error), or ‘f’ (forwarded)
   * @param string $groupId Emma Group ID
   * @return Http\Response|ResponseInterface
   */
  public function changeMemberStatusInGroup($statusFrom, $statusTo, $groupId = [])
  {
    $options = [
      'json' => ['group_id' => $groupId]
    ];
    return $this->client->request('put', "members/status/{$statusFrom}/to/{$statusTo}", $options);
  }

}
