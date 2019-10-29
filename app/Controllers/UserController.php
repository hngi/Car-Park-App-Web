<?php

namespace App\Controllers;

use App\Models\Slot;
use App\Models\SlotUser;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\User;

class UserController extends Controller
{

    public function index(Request $req, Response $res, $args)
    {
        $users = User::all();
        return $this->withJSONData($users);
    }

    public function get(Request $req, Response $res, $args)
    {
        $user = User::find($args['id']);
        return $this->withJSONData($user);
    }

    public function create(Request $req, Response $res, $args)
    {
        $parsedBody = $req->getParsedBody();
        $user = User::create([
            'name' => $parsedBody['name'],
            'email' => $parsedBody['email'],
            'password' => password_hash($parsedBody['password'], PASSWORD_DEFAULT),
        ]);
        return $this->withJSONData($user, 201);
    }

    public function update(Request $req, Response $res, $args)
    {
        $parsedBody = $req->getParsedBody();
        $update = User::where('id', $args['id'])
            ->update([
                'name' => $parsedBody['name'],
                'email' => $parsedBody['email'],
                'password' => password_hash($parsedBody['password'], PASSWORD_DEFAULT),
            ]);
        return $this->withJsonData(null);
    }

    public function delete(Request $req, Response $res, $args)
    {
        $delete = User::where('id', $args['id'])->delete();
        return $this->withJsonData(null);
    }

    public function user_slot(Request $req, Response $res, $args)
    {
        $parsedBody = $req->getParsedBody();
        $user = User::find($parsedBody['user_id']);
        $slot = Slot::find($parsedBody['slot_id']);
        if ($user && $slot) {
            $user->slots()->attach([$parsedBody['slot_id'], ['time_in' => new date("Y-m-d h:i:s")]]);
        }
        return $this->withJsonData(null);
    }

    public function get_users_slots(Request $req, Response $res, $args)
    {
        $users_slots = User::with('slots')->get();
        return $this->withJsonData($users_slots);
    }

    public function get_user_slots(Request $req, Response $res, $args)
    {
        $user_slots = User::where('id', $args['id'])->with('slots')->first();
        return $this->withJsonData($user_slots);
    }

    public function get_user_slot(Request $req, Response $res, $args)
    {
        $user_slot = User::where('id', $args['id'])
            ->whereHas('slots', function ($q) use ($args) {
                $q->where('id', $args['id']);
            })->first();
        return $this->withJsonData($user_slot);
    }

    public function patch_user_slot(Request $req, Response $res, $args)
    {
        $patch = SlotUser::where('user_id', $args['id'])
            ->where('slot_id', $args['slot_id'])
            ->whereNull('time_out')
            ->update(['time_out' => new date('Y-m-d h:i:s')]);
        return $this->withJsonData(null, $patch ? 204 : 403);
    }

}