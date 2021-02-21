<?php

/**
 * @apiGroup           Character
 * @apiName            getOwnCharacters
 *
 * @api                {GET} /v1/characters Get own characters
 * @apiDescription     Get own characters.
 *
 * @apiVersion         1.0.0
 * @apiPermission      Autheticated User
 *
 * @apiUse             CharacterSuccessSingleResponse
 */

/** @var Route $router */
$router->get('characters', [
    'as' => 'api_character_get_own_characters',
    'uses'  => 'Controller@getOwnCharacters',
    'middleware' => [
      'auth:api',
    ],
]);
