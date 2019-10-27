<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
//    $app->get('/', 'HomeController:index')->setName('index');
//    $app->get('/hello', 'HomeController:hello')->setName('hello');

    // User Slot API routes
    $app->get('/users/slots', 'UserController:get_users_slots')->setName('get_users_slots');
    $app->get('/users/{id}/slots', 'UserController:get_user_slots')->setName('get_user_slots');
    $app->get('/users/{id}/slots/{slot_id}', 'UserController:get_user_slot')->setName('get_user_slot');
    $app->post('/users/slots', 'UserController:user_slot')->setName('create_slot_user');
    $app->patch('/users/{id}/slots/{slot_id}', 'UserController:patch_slot_user')->setName('patch_slot_user');
    $app->delete('/users/slots', 'UserController:delete_user_slot')->setName('delete_slot_user');

    // User API routes
    $app->get('/users', 'UserController:index')->setName('get_users');
    $app->get('/users/{id}', 'UserController:get')->setName('get_user');
    $app->post('/users', 'UserController:create')->setName('create_user');
    $app->put('/users/{id}', 'UserController:update')->setName('update_user');
    $app->delete('/users/{id}', 'UserController:delete')->setName('delete_user');

    // Slot User routes
    $app->get('/slots/users', 'SlotController:get_slots_users')->setName('get_slots_users');
    $app->get('/slots/{id}/users', 'SlotController:get_slot_users')->setName('get_slots_users');
    $app->get('/slots/{id}/users/{user_id}', 'UserController:get_slot_user')->setName('get_slot_user');
    $app->post('/slots/users', 'SlotController:slot_user')->setName('create_user_slot');
    $app->delete('/slots/users', 'SlotController:delete_slot_user')->setName('delete_user_slot');

    // Row API routes
    $app->get('/rows', 'RowController:index')->setName('get_rows');
    $app->get('/rows/{id}', 'RowController:get')->setName('get_row');
    $app->post('/rows', 'RowController:create')->setName('create_row');
    $app->put('/rows/{id}', 'RowController:update')->setName('update_row');
    $app->delete('/rows/{id}', 'RowController:delete')->setName('delete_row');

    // Slot API routes
    $app->get('/slots', 'SlotController:index')->setName('get_slots');
    $app->get('/slots/{id}', 'SlotController:get')->setName('get_slot');
    $app->post('/slots', 'SlotController:create')->setName('create_slot');
    $app->put('/slots/{id}', 'SlotController:update')->setName('update_slot');
    $app->delete('/slots/{id}', 'SlotController:delete')->setName('delete_slot');

};
