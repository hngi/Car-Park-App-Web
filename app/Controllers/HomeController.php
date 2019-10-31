<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends Controller
{

    public function index(Request $req, Response $res, $args)
    {
        $data = ['here' => true];
//        $articles = News::orderBy('created', 'desc')->with('featured')->get();
//        $practise = PractiseArea::where('display_homepage', true)->orderBy('display_homepage_order', 'asc')->get();
        return $this->withJSON($data);
    }

    public function hello(Request $req, Response $res, $args)
    {
        $data = ['hello' => 'Fidel'];
        return $this->withJSONData($data);
    }

}