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
   * Get all Signup SignupForms
   * @param array $params Optional expected paramaters are ['count', 'start', 'end']
   * @return Http\Response
   */
  public function all($params = [])
  {
    $options = [];
    if (count($params) > 0)
    {
      $options['query'] = $params;
    }
    return $this->client->request('get', 'signup_forms', $options);
  }
}
