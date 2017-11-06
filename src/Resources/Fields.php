<?php

namespace Emma\Resources;

/**
 * Fields resources
 * @license MIT
 * @copyright 2017 Philip Harvey
 * @author Philip Harvey <philip at bartndrs dot com>
 * @package Resources
 * @link http://api.myemma.com/api/external/fields.html Emma API Docs.
 */
class Fields extends Resource
{
  /**
   * Get all Fields
   * @param array $params Optional query params, expected paramaters are ['deleted', 'count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function all($params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', 'fields', $options);
  }

  /**
   * Get single Field
   * @param string $fieldId Emma Field ID
   * @param array $params Optional query params, expected paramaters are ['deleted', 'count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function getById($fieldId, $params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', "fields/{$fieldId}", $options);
  }

  /**
   * Create new Field
   * @param array $data Field Paramaters ['shortcut_name', 'display_name', 'field_type', 'widget_type', 'column_order']
   * @return Http\Response|ResponseInterface
   */
  public function create($data = [])
  {
    $options = [
      'json' => $data
    ];
    return $this->client->request('post', "fields/{$fieldId}", $options);
  }

  /**
   * Delete single Field
   * @param string $fieldId Emma Field ID
   * @return Http\Response|ResponseInterface
   */
  public function delete($fieldId)
  {
    return $this->client->request('delete', "fields/{$fieldId}");
  }

  /**
   * Clear member data from single Field
   * @param string $fieldId Emma Field ID
   * @return Http\Response|ResponseInterface
   */
  public function clear($fieldId)
  {
    return $this->client->request('post', "fields/{$fieldId}/clear");
  }

  /**
   * Update Field
   * @param string $fieldId Emma Field ID
   * @param array $params Optional query params, expected paramaters are ['deleted', 'count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function update($fieldId, $data = [], $params = [])
  {
    $options = [
      'query' => $params,
      'json' => $data
   ];
    return $this->client->request('put', "fields/{$fieldId}", $options);
  }

}
