<?php

namespace App\Http\Controllers;
use App\Models\data_peminjaman;

use Illuminate\Http\Request;
use Nette\Utils\DateTime;

use LINE\LINEBot;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;

class DataPeminjamanController extends Controller
{

    public function getdata(Request $request){
        $datapeminjam = data_peminjaman::orderby('tanggalpinjam')->get();
        $new_data = [];
        $data_history = [];
        $idx = 0;
        $update = [
            'namapeminjam' => " ",
            'tanggalpinjam' => " "
        ];

        foreach($datapeminjam as $item){
            $date1 = new DateTime(now());
            $date2 = new DateTime($item->tanggalpinjam);
            $diff = date_diff($date1, $date2);
            if(((int)$diff->format('%R%a')) < 0){
                array_push($data_history,$item);
                $datapeminjam[$idx]['id'] = $idx;
                $idx++;
            }else{
                array_push($new_data,$item);
                $datapeminjam[$idx]['id'] = $idx;
                $idx++;
            }
        }

        // dd($new_data);
        return view('data',[
            'datapeminjam' => $new_data,
            'datahistory' => $data_history,
            'update' => $update,
        ]);
        
    }



    public function getdatauseronly(){
        $datapeminjam = data_peminjaman::orderby('tanggalpinjam')->get();
        $new_data = [];
        $data_history = [];
    
        foreach($datapeminjam as $item){
            $date1 = new DateTime(now());
            $date2 = new DateTime($item->tanggalpinjam);
            $diff = date_diff($date1, $date2);
            if(((int)$diff->format('%R%a')) < 0){
                array_push($data_history,$item);
            }else{
                array_push($new_data,$item);
            }
        }

        // dd($new_data);

        return view('data_user',[
            'datapeminjam' => $new_data,
            'datahistory' => $data_history,
        ]);
    }

    public function getdatahistory(){
        $datapeminjam = data_peminjaman::all();
        $new_data = [];
        $data_history = [];
        
        // $date1 = new DateTime(now());
        // $date2 = new DateTime($datapeminjam[0]->tanggalpinjam);
        // $diff = date_diff($date1, $date2);
        // return ((int)$diff->format('%R%a')) ;


        foreach($datapeminjam as $item){
            $date1 = new DateTime(now());
            $date2 = new DateTime($item->tanggalpinjam);
            $diff = date_diff($date1, $date2);
            if(((int)$diff->format('%R%a')) < 0){
                array_push($data_history,$item);
            }else{
                array_push($new_data,$item);
            }
        }

        return view('data_history',[
            'datapeminjam' => $new_data,
            'datahistory' => $data_history,
        ]);
    }

    public function insert(Request $request){

        // dd($request->all());
        $data = $request->all();
        $total = 0;
        $keduanya = "Keduanya";

        if($request->barangdipinjam == $keduanya){
            $datarc = data_peminjaman::where('tanggalpinjam','=',date("Y-m-d",strtotime($request->tanggalpinjam)))->where('waktuawalpinjam','<=',$data['waktuawalpinjam'])->where('waktuakhirpinjam','>=',$data['waktuawalpinjam'])->whereIn('barangdipinjam',['Rice Cooker',$keduanya])->get();
            $dataai = data_peminjaman::where('tanggalpinjam','=',date("Y-m-d",strtotime($request->tanggalpinjam)))->where('waktuawalpinjam','<=',$data['waktuawalpinjam'])->where('waktuakhirpinjam','>=',$data['waktuawalpinjam'])->whereIn('barangdipinjam',['Air Fryer',$keduanya])->get();
            
            $total = count($datarc) + count($dataai);
        }else{
            $datadb = data_peminjaman::where('tanggalpinjam','=',date("Y-m-d",strtotime($request->tanggalpinjam)))->where('waktuawalpinjam','<=',$data['waktuawalpinjam'])->where('waktuakhirpinjam','>=',$data['waktuawalpinjam'])->whereIn('barangdipinjam',[$data['barangdipinjam'],$keduanya])->get();
            
            $total = count($datadb);
        
        }


        // dd($datadb);

        if($total == 0){
            $data_peminjam = data_peminjaman::create([
                'namapeminjam' => $request->namapeminjam,
                'barangdipinjam' => $request->barangdipinjam,
                'tanggalpinjam' => date("Y-m-d",strtotime($request->tanggalpinjam)),
                'waktuawalpinjam' => $request->waktuawalpinjam,
                'waktuakhirpinjam'=> $request->waktuakhirpinjam,
            ]);


            return redirect('/data');
        }else{
            // foreach ($datadb as $key) {
                # code...
                // LOGIC LAMA
                // if($key->waktuawalpinjam <= $data['waktuawalpinjam'] && $data['waktuawalpinjam'] <= $key->waktuakhirpinjam){
                //     dd($datadb);
                //     // return 1;
                //     if(($data['barangdipinjam'] != $key->barangdipinjam) && (($data['barangdipinjam'] != "Keduanya")) ){
                //         // dd($datadb);
            
                //         $data_peminjam = data_peminjaman::create([
                //             'namapeminjam' => $request->namapeminjam,
                //             'barangdipinjam' => $request->barangdipinjam,
                //             'tanggalpinjam' => date("Y-m-d",strtotime($request->tanggalpinjam)),
                //             'waktuawalpinjam' => $request->waktuawalpinjam,
                //             'waktuakhirpinjam'=> $request->waktuakhirpinjam,
                //         ]);
                
                //         return redirect('/data');
                //     }else{
                //         echo "ulangi lagi";
                //     }
                // }else{
                //     return 0;
                //     // $data_peminjam = data_peminjaman::create([
                //     //     'namapeminjam' => $request->namapeminjam,
                //     //     'barangdipinjam' => $request->barangdipinjam,
                //     //     'tanggalpinjam' => date("Y-m-d",strtotime($request->tanggalpinjam)),
                //     //     'waktuawalpinjam' => $request->waktuawalpinjam,
                //     //     'waktuakhirpinjam'=> $request->waktuakhirpinjam,
                //     // ]);
                //     // return redirect('/data');
                // }
            // 
            // foreach ($datadb as $key) {
            //     # code...
            //     if($data['barangdipinjam'] == $key->barangdipinjam xor $data['barangdipinjam'] == "Keduanya"){
            //         return "barang sudah di book";
            //     }else{
            //         $data_peminjam = data_peminjaman::create([
            //             'namapeminjam' => $request->namapeminjam,
            //             'barangdipinjam' => $request->barangdipinjam,
            //             'tanggalpinjam' => date("Y-m-d",strtotime($request->tanggalpinjam)),
            //             'waktuawalpinjam' => $request->waktuawalpinjam,
            //             'waktuakhirpinjam'=> $request->waktuakhirpinjam,
            //         ]);
            //         return redirect('/data');
            //     }
            // }
            return "barang sudah di book";






        }
        

    

    }

    public function validation(Request $request){
        $data = $request->all();

        // dd($data);

        if($data['username'] == "admin" && $data['password'] == "siemasakti11"){
            return view("home");
        }else{
            return view('pick');
        }
        
    }


    public function showdataupdate($nama , $barang , $tanggal , $waktuawal, $waktuakhir){


        $dataupdate = data_peminjaman::where('namapeminjam','=',$nama)->where('barangdipinjam','=',$barang)->where('tanggalpinjam','=',$tanggal)->where('waktuawalpinjam','=',$waktuawal)->where('waktuakhirpinjam','=',$waktuakhir)->first();
        // dd($dataupdate);
        return view('data_update',[
            'update' => $dataupdate,
        ]);
        
    }

    public function search(Request $request){
        $datasearch = data_peminjaman::where('namapeminjam','like','%'.$request->search.'%')->orwhere('barangdipinjam','like','%'.$request->search.'%')->get();
        return view('data',[
            'datapeminjam' => $datasearch,
        ]);
    }


    public function update(Request $request , $id){

        // dd($request->all());

        // $dataupdate = data_peminjaman::where('namapeminjam','=',$request->namapeminjam)->where('barangdipinjam','=',$request->barangdipinjam)->where('tanggalpinjam','=',$request->tanggalpinjam)->where('waktuakhirpinjam','=',$request->waktuakhirpinjam)->where('waktuawalpinjam','=',$request->waktuawalpinjam)->first();

        // dd($dataupdate);

        if($request->update == "1"){
            // dd($request->all());
            
            // $dataupdate = data_peminjaman::where('namapeminjam','=',$request->namapeminjam)->where('barangdipinjam','=',$request->barangdipinjam)->where('tanggalpinjam','=',$request->tanggalpinjam)->where('waktuakhirpinjam','=',$request->waktuakhirpinjam)->where('waktuawalpinjam','=',$request->waktuawalpinjam)->first();

            // dd($dataupdate);
            // $dataupdate->namapeminjam = $request->namapeminjam;
            // $dataupdate->barangdipinjam = $request->barangdipinjam;
            // $dataupdate->tanggalpinjam = $request->tanggalpinjam;
            // $dataupdate->waktuakhirpinjam = $request->waktuakhirpinjam;
            // $dataupdate->waktuawalpinjam = $request->waktuawalpinjam;

            // $dataupdate->save();

            $dataupdate = data_peminjaman::find($id);

            // dd($dataupdate);

            $dataupdate->namapeminjam = $request->namapeminjam;
            $dataupdate->barangdipinjam = $request->barangdipinjam;
            $dataupdate->tanggalpinjam = $request->tanggalpinjam;
            $dataupdate->waktuakhirpinjam = $request->waktuakhirpinjam;
            $dataupdate->waktuawalpinjam = $request->waktuawalpinjam;

            $dataupdate->save();

            // dd($dataupdate);

    

        }else if($request->delete == "1"){

            // $datadelete = data_peminjaman::where('namapeminjam','=',$request->namapeminjam)->where('barangdipinjam','=',$request->barangdipinjam)->first();
            // dd($datadelete);
            $datadelete =  data_peminjaman::find($id);
            $datadelete->delete($datadelete);
   
   



            // $datadelete->delete();

        }


        return redirect('/data');
        
    }

    public function webhook(){

        // Ambil data dari webhook
        $json_string = file_get_contents('php://input');
        $json_object = json_decode($json_string);

        // Ambil data pengguna dan pesan
        $userId = $json_object->events[0]->source->userId;
        $message_text = $json_object->events[0]->message->text;

        // Siapkan balasan
        $reply_message = "Terima kasih telah mengirim pesan: " . $message_text;

        // Siapkan data untuk dikirim ke Line Messaging API
        $data = [
            "replyToken" => $json_object->events[0]->replyToken,
            "messages" => [
                [
                    "type" => "text",
                    "text" => $reply_message
                ]
            ]
        ];

        // Kirim balasan ke Line Messaging API
        $ch = curl_init("https://api.line.me/v2/bot/message/reply");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . '1qy6q+g8HKKVjobaBYl9qjWA8WI/wDYQ868lnnkM7afjWeJMGLlZNyrRg+bPIjUJt+TZFPTXRHe2uV+srgIWRWlQj7OldBJjna60VdCXn4c8xDMw0RHt0YMDm2cua6XfhDdro4GNe66mGQDUvvUx5wdB04t89/1O/w1cDnyilFU='
        ]);
        $result = curl_exec($ch);
        curl_close($ch);

    }







}