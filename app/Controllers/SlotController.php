<?php

namespace App\Controllers;

use App\Models\SlotUser;
use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Slot;

class SlotController extends Controller
{

    public function index(Request $req, Response $res, $args)
    {
        $slots = Slot::all();
        return $this->withJSONData($slots);
    }

    public function get(Request $req, Response $res, $args)
    {
        $slot = Slot::find($args['id']);
        return $this->withJSONData($slot);
    }

    public function create(Request $req, Response $res, $args)
    {
        $slot = Slot::create([
            'car_park_id' => $args['car_park_id'],
            'row_id' => $args['row_id'],
            'number' => $args['number'],
        ]);
        return $this->withJSONData($slot, 201);
    }

    public function update(Request $req, Response $res, $args)
    {
        $update = Slot::where('id', $args['id'])
            ->update([
                'car_park_id' => $args['car_park_id'],
                'row_id' => $args['row_id'],
                'number' => $args['number'],
            ]);
        return $this->withJsonData(null, 204);
    }

    public function delete(Request $req, Response $res, $args)
    {
        $delete = Slot::where('id', $args['id'])->delete();
        return $this->withJsonData(null);
    }

    public function slot_user(Request $req, Response $res, $args)
    {
        $parsedBody = $req->getParsedBody();
        $slot = Slot::find($parsedBody['slot_id']);
        $user = User::find($parsedBody['user_id']);
        if ($slot && $user) {
            $slot->users()->attach([$parsedBody['user_id'], ['time_in' => new date("Y-m-d h:i:s")]]);
        }
        return $this->withJsonData(null);
    }

    public function get_slots_users(Request $req, Response $res, $args)
    {
        $slots_users = Slot::with('users')->get();
        return $this->withJsonData($slots_users);
    }

    public function get_slot_users(Request $req, Response $res, $args)
    {
        $slot_users = Slot::where('id', $args['id'])->with('users')->first();
        return $this->withJsonData($slot_users);
    }

    public function get_slot_user(Request $req, Response $res, $args)
    {
        $slot_user = Slot::where('id', $args['id'])
            ->whereHas('users', function ($q) use ($args) {
                $q->where('id', $args['user_id']);
            })->first();
        return $this->withJsonData($slot_user);
    }

    public function patch_slot_user(Request $req, Response $res, $args)
    {
        $patch = SlotUser::where('user_id', $args['id'])
            ->where('user_id', $args['user_id'])
            ->whereNull('time_out')
            ->update(['time_out' => new date('Y-m-d h:i:s')]);
        return $this->withJsonData(null, $patch ? 204 : 403);
    }
}