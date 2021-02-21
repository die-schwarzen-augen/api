<?php

/**
 * @apiGroup           Character
 * @apiName            findCharacter
 *
 * @api                {GET} /v1/characters/:id Find caracter
 * @apiDescription     Find caracter
 *
 * @apiVersion         1.0.0
 * @apiPermission      Owner|Admin
 *
 * @apiParam           {String}  id
 *
 * @apiUse             CharacterSuccessSingleResponse
 */

/** @var Route $router */
$router->get('characters/{id}', [
    'as' => 'api_character_find_character',
    'uses'  => 'Controller@findCharacterById',
    'middleware' => [
      'auth:api',
    ],
]);
