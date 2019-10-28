<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Row;

class RowController extends Controller
{

    public function index(Request $req, Response $res, $args)
    {
        $rows = Row::all();
        return $this->withJSONData($rows);
    }

    public function get(Request $req, Response $res, $args)
    {
        $row = Row::find($args['id']);
        return $this->withJSONData($row);
    }

    public function create(Request $req, Response $res, $args)
    {
        $row = Row::create([
            'name' => $args['name'],
        ]);
        return $this->withJSONData($row, 201);
    }

    public function update(Request $req, Response $res, $args)
    {
        $update = Row::where('id', $args['id'])
            ->update([
                'name' => $args['name'],
            ]);
        return $this->withJsonData(['error' => $update ? null : 'Update failed']);
    }

    public function delete(Request $req, Response $res, $args)
    {
        $delete = Row::where('id', $args['id'])->delete();
        return $this->withJsonData(['error' => delete ? null : 'Update failed']);

    }

}