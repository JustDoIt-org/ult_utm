<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LayananTerpadu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Psy\Readline\Hoa\Console;

class LayananTerpaduController extends Controller
{

    public function index()
    {
        return view('pages.terpadu.index', ['title' => 'layanan terpadu']);
    }

    public function riwayat()
    {
        return view('pages.terpadu.riwayat', ['title' => 'Riwayat Pengajuan', 'type' => 'l']);
    }

    public function list()
    {
        return view('pages.terpadu.riwayat', ['title' => 'Daftar Pengajuan', 'type' => 'list']);
    }

    public function dashboard()
    {
        return view('pages.terpadu.dashboard', ['title' => 'Daftar Pengajuan', 'type' => 'admin_list', 'view' => 'admin']);
    }
    public function riwayat_admin()
    {
        return view('pages.terpadu.dashboard', ['title' => 'Daftar Pengajuan', 'type' => 'admin_riwayat', 'view' => 'admin']);
    }

    public function chat_guest()
    {
        return view('pages.terpadu.dashboard', ['title' => 'Daftar Pengajuan', 'type' => 'admin_riwayat', 'view' => 'admin']);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = LayananTerpadu::find($id);

        if (!empty($data->file)) {
            unlink(public_path('storage/' . $data->file));
        }
        if (!empty($data->file_balasan)) {
            unlink(public_path('storage/' . $data->file_balasan));
        }

        $delete = LayananTerpadu::destroy($id);

        if ($delete) {
            request()->session()->flash('data', 'Berhasil Menghapus Data');
        }

        return Redirect::back();
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $service = $request->service;
        $nim = $request->nim;
        $desc = $request->desc;
        $progress = $request->progress;


        $data = LayananTerpadu::find($id);
        $minDate = date('Y-m-d');

        $rules = [
            // "date" => 'required|after_or_equal:' . $minDate,
            // "name" => 'required',
            // "gender" => 'required',
            // "age" => 'required',
            // "nohp" => 'required',
            // "address" => 'required',
            // "institusi" => 'required',
            "nim" => 'required|numeric',
            "service" => 'required',
            "desc" => 'required',
        ];

        
        if (!$request->validate($rules)) {
            return Redirect::back();
            request()->session()->flash('failed', 'Gagal Update Data');
        }

        if ($request->hasFile('file_balasan')) {
            $file = $request->file('file_balasan');
            $fileName = '/' . $file->store('layanan_terpadu', 'public');

            if ($data->file_balasan) {
                unlink(public_path('storage' . $data->file_balasan));
            }

            //update post with new image
            $data->update([
                'file_balasan' => $fileName,
                'service'     => $service,
                'nim'   => $nim,
                'desc'   => $desc,
                'progress' => $progress
            ]);
        } else {
            $data->update([
                'service'     => $service,
                'nim'   => $nim,
                'desc'   => $desc,
                'progress' => $progress
            ]);
        }



        request()->session()->flash('data', 'Berhasil Update Data');
        return Redirect::back();
    }


    public function update_admin()
    {
        dd('update');
    }

    public function delete_admin()
    {
        dd('update');
    }

    public function atur_admin()
    {
        return view('pages.terpadu.dashboard', ['title' => 'Daftar Pengajuan', 'type' => 'admin_riwayat', 'view' => 'admin']);
    }


    public function forward(Request $request)
    {

        $id = $request->id;
        $tujuan = $request->tujuan;
        $data = LayananTerpadu::find($id);
        // dd($data);
        if ($data) {
            $data->update([
                'tujuan' => $tujuan
            ]);
            request()->session()->flash('data', 'Berhasil Update Tujuan');
            return Redirect::back();
        }
        return Redirect::back();
    }
}
