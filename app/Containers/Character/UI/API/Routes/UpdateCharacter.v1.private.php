<?php

/**
 * @apiGroup           Character
 * @apiName            updateCharacter
 *
 * @api                {PATCH} /v1/characters/:id Update character
 * @apiDescription     Update character.
 *
 * @apiVersion         1.0.0
 * @apiPermission      Owner|Admin
 *
 * @apiParam           {String}  id
 * @apiParam           {String}  [name]
 * @apiParam           {String}  [description]
 * @apiParam           {String}  [notes]
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->patch('characters/{id}', [
    'as' => 'api_character_update_character',
    'uses'  => 'Controller@updateCharacter',
    'middleware' => [
      'auth:api',
    ],
]);
