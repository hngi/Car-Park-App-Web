<?php

namespace App\Controllers;

use Slim\Http\Response;

class Controller extends Response
{

    public function __construct($container)
    {
        parent::__construct();
        $this->container = $container;
//        $this->view = $container->view;
//        $this->route = $container['current_request']->getAttribute('route') ? $container['current_request']->getAttribute('route')->getName() : NULL;
        $this->server = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) ? 'https://' : 'http://' . $_SERVER['SERVER_NAME'];
    }

    public function withJSON($data, $status = null, $encodingOptions = 0)
    {
        if(!isset($data['error'])) {
            $data['error'] = null;
        }

        if(!isset($data['status'])) {
            $data['status'] = $status ?: $this->getStatusCode();
        }

        return parent::withJson(array_filter($data), $status, $encodingOptions);
    }

    public function withJsonData($data, $status = null) {
        return $this->withJson([
            'data' => $data
        ], $status);
    }

}