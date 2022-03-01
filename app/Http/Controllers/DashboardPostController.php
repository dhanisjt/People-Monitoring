<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Lokasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Database;
use Illuminate\Support\Facades\DB;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename ='jumlah';

    }

    public function index()
    {
        $is_admin=Auth::user()->is_admin;
        return view ('dashboard.index', ['is_admin'=>$is_admin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->is_admin){
            return view ('dashboard.posts.create');
        }
        return view ('dashboard.posts.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tempat = $request->input('tempat');
        $alamat = $request->input('alamat');
        $telepon = $request->input('telepon');
        $email = $request->input('email');
        $password = $request->input('password');
        $kategori = $request->input('kategori');
        $username = $request->input('username');
        $kapasitas = $request->input('kapasitas');

        try {
            $user = User::create([
                "email" => $email,
                "username"=> $username,
                "password" => bcrypt($password),
                "telepon" => $telepon
            ]);

            $user->save();

            $lokasi = Lokasi::create([
                "nama"=>$tempat,
                "alamat"=>$alamat,
                "kategori"=>$kategori,
                "user_id"=> $user->id,
                "kapasitas"=> $kapasitas
            ]);

            $lokasi->save();

        } catch (\Exception  $e) {
            dd($e);

            return false;
        }

        $request->session()->flash('success', 'Tempat berhasil ditambahkan');

        return redirect ('/dashboard')->with('success', 'Tempat berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(request $request, $kategori)
    {
        $user = Auth::user();
        $is_admin = false;
        $id = 0;
        $hampirpenuh = 60;

        if ($user != null) {
            $id = $user->id;
            $is_admin=$user->is_admin;
        }

        $datas = Lokasi::where('kategori', $kategori)->get();

        $result=array();
        foreach($datas as $data){
            $total = array('orang_masuk'=>0, 'orang_keluar'=>0, 'total_orang'=>0);
            $total = $this->database->getReference($data->id)->getValue();
            try {

                $totalkeluar = $total["jumlah"]["orang_keluar"] ;  //string
                $totalmasuk = $total["jumlah"]["orang_masuk"] ;
                $totalorang = $total["jumlah"]["total_orang"] ;

                $kapasitas = "Senggang";
                $persen = $totalorang /  $data -> kapasitas * 100;

                if ($persen >= $hampirpenuh && $persen < 100) {
                    $kapasitas = "Hampir Penuh";
                }else if ($persen >= 100) {
                    $kapasitas = "Penuh";
                }

                $t = [
                    "id" =>$data->id,
                    "user_id"=>$data->user_id,
                    "name" =>$data->nama,
                    "alamat"=>$data->alamat,
                    "kategori"=>$data->kategori,
                    "totalmasuk" => $totalmasuk,
                    "totalkeluar" => $totalkeluar,
                    "totalorang" => $totalorang,
                    "kapasitas" => $kapasitas
                ];

                array_push ($result, $t);

            } catch (\Exception  $e) {
                return view('dashboard.kategori.kategori', ['tempats'=>array(), 'is_admin'=>$is_admin, 'id'=>$id]);

                return false;
            }
        }

        if ($user != null) {
            return view('dashboard.kategori.kategori', ['tempats'=>$result, 'is_admin'=>$is_admin, 'id'=>$id]);
        }else {
            return view("kategori",['tempats'=>$result]);
        }

    }

    public function history(Request $request,$id){

        // $total = $this->database->getReference($id)->getValue();
        $result = array();
        $lastDate = "";
        $prevDate = "";
        $isFirst = true;

        $histories = $this->database->getReference($id)->getChild("history")->orderByKey();
        if  ($request->has("start_at")){
            $isFirst = false;
        }

        $limit = 13;

        if ($request->has("cond")) { // next || prev
            if ($request->query("cond") == "next") {
                $histories = $histories->startAt( $request->query("start_at"))->limitToFirst($limit)->getValue();
            }else if($request->query("cond") == "prev") {
                $histories = $histories->endAt( $request->query("end_at"))->limitToLast($limit)->getValue();
            }
        }else {
            $histories = $histories->limitToFirst($limit)->getValue();
        }

        if (count($histories) > 0) {
            $i = 1;
            foreach($histories as $key => $value) {

                if ($i == $limit ){
                    $lastDate = $key;
                    continue;
                }

                if (!$isFirst && $i == 1){
                    $prevDate = $key;
                }

                $t = [
                    "date" => $key,
                    "total" =>$value["orang_masuk"]
                ];


                array_push ($result, $t);

                $i++;
            }
        }

        $categories = [];

        $historis = $result;

        foreach($historis as $value){
            $categories[] = $value["date"];

            $data[] = $value["total"];
        }

        return view("dashboard.posts.index", ["results" => $result, "categories" => $categories, "data" => $data, "lastDate" => $lastDate, "prevDate" => $prevDate]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    //  select `l`.`name, u`.`telepon, u`.`email` from `lokasis l` inner join `users u` on `u`.`id` = `l`.`user_id` where `l`.`id` = 2 limit 1


     public function cetak( $id){


        $is_admin=Auth::user()->is_admin;
        $data = $this->database->getReference($id)->getValue();
        // $lokasi = Lokasi::where('id', $id)->first();
        $lokasi = DB::table("lokasis as l")
            ->select("l.nama", "u.telepon", "u.email")
            ->join("users as u", "u.id", "=", "l.user_id")
            ->where("l.id", $id)
            ->first();
        // select * from lokasis where id = $id limit 1
        $resp = array();

        if (count($data) > 0) {
            if (count($data["history"]) > 0) {
                $histories = $data["history"];

                foreach($histories as $key => $value) {

                    $t = [
                        "date" => $key,
                        "total" =>$value["orang_masuk"]
                    ];


                    array_push ($resp, $t);
                }
            }
        }

        return view (
            'dashboard.posts.cetak',
            [
                'is_admin'=>$is_admin,
                "histories" => $resp,
                "lokasi" => $lokasi
            ]
        );

     }
    public function edit( $id )
    {
        $is_admin=Auth::user()->is_admin;
        $data = Lokasi::where('id', $id)->first();
        return view('dashboard.kategori.update', ['tempat'=>$data, 'is_admin'=>$is_admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $id = $request->input('id');
        $nama = $request->input('nama');
        try{
            Lokasi::where('id', $id)->update(['nama'=> $nama]);

        }
        catch (\Exception  $e) {
            dd($e);

            return false;
        }
        $request->session()->flash('success', 'Tempat berhasil diubah');

        return redirect ('/dashboard')->with('success', 'Tempat berhasil diubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        try{
            Lokasi::where('id', $id)->delete();

        }
        catch (\Exception  $e) {
            dd($e);

            return false;
        }
        $request->session()->flash('success', 'Tempat berhasil dihapus');

        return redirect ('/dashboard')->with('success', 'Tempat berhasil dihapus!');
    }
}
