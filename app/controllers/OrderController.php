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

    public function fetch_by($data)
    {
        $order = new Order();
        $orderDetail = new OrderDetail();
        $orderData = $order->fetch_by($data);
        $orderDataDetail = $orderDetail->fetch_produk_detail_by_transaction($orderData[0]['id']);

        $result = $orderData[0];
        $result['productData'] = $orderDataDetail;
        $data = [
            'count' => count($orderData),
            'data' => $result
        ];

        echo json_encode($data);
    }

    public function insert($data)
    {
        if (session_id() == '') {
            session_start();
        }

        $order = new Order();
        $orderDetail = new OrderDetail();

        $request['idTransaksi'] = $this->idGenerator();
        $request['idPengguna'] = $data['idPengguna'];
        $request['alamatPengiriman'] = $data['userData']['alamat'];
        
        $modifiedCartData = [];
        foreach($data['cartData'] as $item){
            $item['idTransaksi'] = $request['idTransaksi'];
            array_push($modifiedCartData, $item);
        }

        $request['data'] = $modifiedCartData;

        if (isset($_SESSION['login_user'])) {

            $order->insert($request);
            $orderDetail->insertMultiple($request['data']);

            $fetchedData = $order->fetch_by(['id' => $request['idTransaksi']]);

            $response = [
                'status' => 200,
                'transaksiHash' => $fetchedData[0]['hash']
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
        $order = new Order();
        $dataIndex = $order->raw_query('SELECT COUNT(*) AS jumlah FROM '.$order->getModelName());
        $currentDate = date('dmY');
        return 'TRNX-'.$dataIndex[0]['jumlah'].mt_rand(1,99).'-'.$currentDate;
    }

    public function renderTransactionPage($transactionHash)
    {
        $payload = [
            'idPengguna' => $_SESSION['login_user']['id'],
            'hash' => $transactionHash
        ];
        ob_start();
        $this->fetch_by($payload);
        $fetchedData = json_decode(ob_get_clean(),true);

        if($fetchedData['data']){
            $orderData = $fetchedData['data'];
            $payload['userData'] = [
                'nama' => $_SESSION['login_user']['nama']
            ];
            $payload['orderData'] = $orderData;

            $this->render_page('pembayaran', ['data' => $payload]);
        }

    }
}