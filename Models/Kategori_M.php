<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori_M extends Model
{
    protected $table = 'tblkategori';

    protected $allowedFields = ['kategori', 'keterangan'];

    protected $primaryKey = 'idkategori';

    protected $validationRules    = [
        'kategori'     => 'required|alpha_numeric_space|min_length[3]|is_unique[tblkategori.kategori]',
    ];

    protected $validationMessages = [
        'kategori' => [
            'alpha_numeric_space' => 'ada simbol',
            'min_length' => 'minimal 3 huruf',
            'is_unique' => 'ada yang sama',
            
        ],
    ];

}