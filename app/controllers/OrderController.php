<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Order;
use App\Models\OrderDetail;

class orderController extends Controller
{

    public function __construct()
    { }

    public function fetch()
    {
        $order = new Order();
        $fetchedData = $order->fetch();
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

        $order = new Order();
        // $orderDetail = new OrderDetail();
        $request = $data;
        $request['idTransaksi'] = $this->idGenerator();

        if (isset($_SESSION['login_user'])) {

            $result = $order->insert($request);
            // $orderDetail->insertMultiple($request['data']);

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

    public function idGenerator(){
        $dataIndex = $this->raw_query('SELECT COUNT(*) FROM '.$this->modelName);
        $currentDate = date('dmY');
        return 'TRNX/'.$dataIndex.mt_rand(1,99).'/'.$currentDate;
    }
}