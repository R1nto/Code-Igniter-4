<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Order extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM vorder";

        $result = $db->query($sql);
        
        $row = $result->getResult('array');

            $total= count($row);
            $tampil=2;

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $mulai = ($tampil * $page) - $tampil;
                $sql = "SELECT * FROM vorder ORDER BY status ASC LIMIT $mulai, $tampil";
            }
            else {
                $sql = "SELECT * FROM vorder ORDER BY status ASC LIMIT 0, $tampil";
            }

        $result = $db->query($sql);
        
        $row = $result->getResult('array');
    

        $data = [
            'order' => $row,
            'pager' => $pager,
            'pager' => $pager,
            'tampil' => $tampil,
            'total' => $total,
        ];

        return view('order/select',$data);


    }

    public function find($id = null)
    {
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM vorder WHERE idorder=$id";
        $result = $db->query($sql);
        $row = $result->getResult('array');


        $sql = "SELECT * FROM vorderdetail WHERE idorder=$id";
        $result = $db->query($sql);
        $detail = $result->getResult('array');

        $data = [
            'order' => $row,
            'detail' => $detail
        ];


        return view('order/update',$data);

    }

    public function update()
    {
        $idorder = $_POST['idorder'];
        $total = $_POST['total'];
        $bayar = $_POST['bayar'];
        $kembali = $bayar - $total;

        if ($bayar < $total) {
            session()->setFlashdata('info', 'Pembayaran Kurang !!!');
            $this->find($idorder);
        } else {
            $sql = "UPDATE tblorder SET bayar= $bayar, kembali = $kembali, status=1 WHERE idorder  =$idorder";
            $db = \Config\Database::connect();
            $db->query($sql);
            return redirect()->to(base_url("/admin/order"));
        }
        
    }
}
