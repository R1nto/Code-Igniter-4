<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;

class Kategori extends BaseController
{
    
    public function Read()
    {
        $pager = \Config\Services::pager();
        $model = new Kategori_M();

        $data = [
            'judul' => 'Data Kategori',
            'kategori' => $model->paginate(5,'page'),
            'pager' => $model->pager
        ];
        
        
        return view('kategori/select',$data);
        
    }


    public function Create()
    {
        
        return view('kategori/insert');
        
    }

    public function insert()
    {
        $model = new Kategori_M();
        if ($model->insert($_POST)===false) {
            $error=$model->errors();
            session()->setFlashdata('info', $error['kategori']);
            return redirect()->to(base_url("/admin/kategori/create"));
        } else {
            return redirect()->to(base_url("/admin/kategori"));
        }
    
    }

    public function Find($id=null)
    {
        
        $model = new Kategori_M();
        $kategori = $model->find($id);

        $data = [
            'kategori' => $kategori
        ];

        return view('kategori/update',$data);
       
    }

    public function update()
    {
       
        $model = new Kategori_M();
        $id = $_POST['idkategori'];
        

        if ($model->save($_POST)===false) {
            $error=$model->errors();
            session()->setFlashdata('info', $error['kategori']);
            return redirect()->to(base_url("/admin/kategori/find/$id"));
        } else {
            return redirect()->to(base_url("/admin/kategori"));
        }
    }

    public function delete($id=null)
    {
        $model = new Kategori_M();
        $model->delete($id);

        return redirect()->to(base_url("/admin/kategori"));
    }
}
