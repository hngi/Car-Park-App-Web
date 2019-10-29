<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\CarPark;

class CarParkController extends Controller
{

    public function index(Request $req, Response $res, $args)
    {
        $car_parks = CarPark::all();
        return $this->withJSONData($car_parks);
    }

    public function get(Request $req, Response $res, $args)
    {
        $car_park = CarPark::find($args['id']);
        return $this->withJSONData($car_park);
    }

    public function create(Request $req, Response $res, $args)
    {
        $parsedBody = $req->getParsedBody();
        $car_park = CarPark::create([
            'owner_id' => $parsedBody['owner_id'],
            'name' => $parsedBody['name'],
            'location' => $parsedBody['location'],
        ]);
        return $this->withJSONData($car_park, 201);
    }

    public function update(Request $req, Response $res, $args)
    {
        $parsedBody = $req->getParsedBody();
        $update = CarPark::where('id', $parsedBody['id'])
            ->update([
                'name' => $parsedBody['name'],
                'location' => $parsedBody['location'],
            ]);
        return $this->withJsonData(null);
    }

    public function delete(Request $req, Response $res, $args)
    {
        $delete = CarPark::where('id', $args['id'])->delete();
        return $this->withJsonData(null);
    }

}