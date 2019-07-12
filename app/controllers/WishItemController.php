<?php

namespace App\Controllers;

use App\Controller;
use App\Models\WishItem;

class WishItemController extends Controller
{

    public function __construct()
    { }

    public function fetch()
    {
        $wishItem = new WishItem();
        $fetchedData = $wishItem->fetch();
        $data = [
            'count' => count($fetchedData),
            'data' => $fetchedData
        ];

        echo json_encode($data);
    }

    public function fetch_by($data)
    {
        $wishItem = new WishItem();
        $fetchedData = $wishItem->fetch_by($data);
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

        $wishItem = new WishItem();
        $request = $data;

        if (isset($_SESSION['login_user'])) {

            $result = $wishItem->insert($request);

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

    public function delete($requestData)
    {
        if (session_id() == '') {
            session_start();
        }

        $wishItem = new WishItem();

        $response = '';
        if (isset($_SESSION['login_user'])) {
            if ($wishItem->delete_by($requestData)) {
                $response = [
                    'status' => 200,
                    'message' => 'Barang berhasil dihapus'
                ];
            } else {
                $response = [
                    'status' => 200,
                    'message' => 'Akses diizinkan tapi terjadi kesalahan saat menghapus'
                ];
            }
        } else {
            $response = [
                'status' => 501,
                'pesan' => 'Akses tidak diizinkan'
            ];
        }

        echo json_encode($response);
    }
}
