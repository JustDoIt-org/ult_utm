<?php

namespace App\Http\Controllers\Visit;

use Illuminate\Http\Request;
use App\Events\SendKodeKunjungan;
use App\Http\Controllers\Controller;

class CekAbsensiController extends Controller
{
    public function index()
    {
        return view('pages.visit.cek-absensi-page');
    }


    public function sendMessage(Request $request)
    {
        $message = $request->message;

        event(new SendKodeKunjungan(
            message: $message
        ));

        return response()->json(['message' => 'Message has been send'], 200);
    }
}
