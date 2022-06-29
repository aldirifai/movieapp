<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;

class DetailController extends Controller
{
    public function show($id)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/$id?api_key=" . env('API_KEY'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
            ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            Alert::error('Gagal', 'Koneksi gagal');

            return back();
        } else {
            $movie = json_decode($response);

            return view('detail', compact('movie'));
        }
    }
}
