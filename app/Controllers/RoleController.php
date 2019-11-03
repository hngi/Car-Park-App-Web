<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Role;

class RoleController extends Controller
{

    public function index(Request $req, Response $res, $args)
    {
        $roles = Role::with('users')->get();
        return $this->withJSONData($roles);
    }

    public function get(Request $req, Response $res, $args)
    {
        $role = Role::find($args['id']);
        return $this->withJSONData($role);
    }

    public function create(Request $req, Response $res, $args)
    {
        $parsedBody = $req->getParsedBody();
        $role = Role::create([
            'authority' => $parsedBody['authority'],
        ]);
        return $this->withJSONData($role, 201);
    }

    public function update(Request $req, Response $res, $args)
    {
        $parsedBody = $req->getParsedBody();
        $update = Role::where('id', $args['id'])
            ->update([
                'authority' => $parsedBody['authority'],
            ]);
        return $this->withJsonData(null);
    }

    public function delete(Request $req, Response $res, $args)
    {
        $delete = Role::where('id', $args['id'])->delete();
        return $this->withJsonData(null);
    }

}