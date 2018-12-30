<?php

namespace App\Imports;

use App\Kategori;
use Maatwebsite\Excel\Concerns\ToModel;

class KategoriImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }
        $addData = Kategori::create([
            'nama_kategori'=> $row[0],
        ]);
        // dd(new Kategori(['nama_kategori' => $row[0]]));
        // return new Kategori([
        //     'nama_kategori' => $row[0],
        // ]);
    }   
}