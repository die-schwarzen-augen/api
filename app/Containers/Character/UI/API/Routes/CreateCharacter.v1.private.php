<?php

/**
 * @apiGroup           Character
 * @apiName            createCharacter
 *
 * @api                {POST} /v1/characters Create character
 * @apiDescription     Create character.
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {String}  name
 * @apiParam           {String}  [description]
 * @apiParam           {String}  [notes]
 *
 * @apiUse             CharacterSuccessSingleResponse
 */

/** @var Route $router */
$router->post('characters', [
    'as' => 'api_character_create_character',
    'uses'  => 'Controller@createCharacter',
    'middleware' => [
      'auth:api',
    ],
]);
