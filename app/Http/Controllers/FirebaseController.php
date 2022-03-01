<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class FirebaseController extends Controller
{
    // protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename ='jumlah';
    }

    public function index() {
       $total = $this->database->getReference($this->tablename)->getValue();

       $totalmasuk =  $total['orang_masuk'] ;
       $totalkeluar = $total['orang_keluar'] ;
       $totalorang = $total ['total_orang'] ;

       $kapasitas = "Senggang";
       if ($totalorang > 10 && $totalorang < 20) {
           $kapasitas = "Hampir Penuh";
       }else if ($totalorang == 20 || $totalorang > 20) {
           $kapasitas = "Penuh";
       }

       $result = [
           "tempats" => [
               "name" =>"Futsal",
               "totalmasuk" => $totalmasuk,
               "totalkeluar" => $totalkeluar,
               "totalorang" => $totalorang,
               "kapasitas" => $kapasitas            ]
       ];

       return view ('firebase.jumlah.index', ["result" => $result]);
    }
}
