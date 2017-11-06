<?php

namespace Emma\Resources;
use Emma\Resources\SignupForms;
use Emma\Http\Response;

/**
 * Signup Forms resources
 * @license MIT
 * @copyright 2017 Philip Harvey
 * @author Philip Harvey <philip at bartndrs dot com>
 * @package Resources
 * @link http://api.myemma.com/api/external/signup_forms.html Emma API Docs.
 */
class SignupForms extends Resource
{
  /**
   * Get all SignupForms
   * @param array $params Optional expected paramaters are ['count', 'start', 'end']
   * @return Http\Response|ResponseInterface
   */
  public function all($params = [])
  {
    $options = [
      'query' => $params
    ];
    return $this->client->request('get', 'signup_forms', $options);
  }
}
