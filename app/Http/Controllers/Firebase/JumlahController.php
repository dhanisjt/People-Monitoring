<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JumlahController extends Controller
{
    public function index()
    {

        $totalmasuk = 11;
        $totalkeluar = 3;
        $totalorang = 8;

        $kapasitas = "Senggang";
        if ($totalmasuk > 10 && $totalmasuk < 20) {
            $kapasitas = "Hampir Penuh";
        }else if ($totalmasuk == 20 || $totalmasuk > 20) {
            $kapasitas = "Penuh";
        }

        $result = [
            "tempats" => [
                "name" =>"Masjid Jogokaryan",
                "totalmasuk" => $totalmasuk,
                "totalkeluar" => $totalkeluar,
                "totalorang" => $totalorang,
                "kapasitas" => $kapasitas            ]
        ];

        return view ('firebase.jumlah.index', ["result" => $result]);
    }
}
