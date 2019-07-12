<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Cart;

class CartController extends Controller
{

    public function __construct()
    { }

    public function fetch()
    {
        $cart = new Cart();
        $fetchedData = $cart->fetch();
        $data = [
            'count' => count($fetchedData),
            'data' => $fetchedData
        ];

        echo json_encode($data);
    }

    public function fetch_by($data)
    {
        $cart = new Cart();
        $fetchedData = $cart->fetch_by($data);
        $data = [
            'count' => count($fetchedData),
            'data' => $fetchedData
        ];

        echo json_encode($data);
    }

    public function insert($data)
    {
        if (session_id() == '') {
            session_start();
        }

        $cart = new Cart();
        $request = $data;

        if (isset($_SESSION['login_user'])) {

            $result = $cart->insert($request);

            $response = [
                'status' => 200,
                'pesan' => $result
            ];
        } else {
            $response = [
                'status' => 501,
                'pesan' => 'Akses tidak diizinkan'
            ];
        }
        echo json_encode($response);
    }
}