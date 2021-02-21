<?php

/**
 * @apiGroup           Character
 * @apiName            deleteCharacter
 *
 * @api                {DELETE} /v1/characters/:id Delete Character
 * @apiDescription     Delete Character.
 *
 * @apiVersion         1.0.0
 * @apiPermission      owner|Admin
 *
 * @apiParam           {String}  id
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 204 OK
 */

/** @var Route $router */
$router->delete('characters/{id}', [
    'as' => 'api_character_delete_character',
    'uses'  => 'Controller@deleteCharacter',
    'middleware' => [
      'auth:api',
    ],
]);
