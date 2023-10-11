<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function coba()
    {
        // $data['text'] = "lorem ipsum dolor sit amet, consectetur adipiscing";
        // $data['angka'] = '112345';

        // return view('coba', $data);

        $text = "lorem ipsum dolor sit amet, consectetur adipiscing";
        $angka = '<h1>112345</h1>';
        $fruits = array(
            'mangga', 'pisang', 'jeruk'
        );

        return view('coba', compact('text', 'angka', 'fruits'));
    }
}
