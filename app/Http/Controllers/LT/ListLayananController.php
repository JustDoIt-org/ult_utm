<?php

namespace App\Http\Controllers\LT;

use App\Http\Controllers\Controller;
use App\Models\JenisLayananModel;
use Illuminate\Http\Request;

class ListLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.terpadu.dashboard', ['title' => 'Daftar Pengajuan', 'type' => 'admin_riwayat', 'view' => 'admin', 'tableType' => 'list_layanan']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'type' => ['required', 'unique:jenis_layanan'],
        ]);

        $data = JenisLayananModel::updateOrCreate(['type' => $request->type]);
        request()->session()->flash('sukses', [
            'title' => 'Berhasil Menambah Data',
            'message' => 'Sukses',
            'type' => 'success'
        ]);
        // $this->swal(
        //     title: 'Berhasil',
        //     message: 'Berhasil ' . $data->name,
        //     type: 'success'
        // );
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'type' => ['required'],
        ]);

        $data = JenisLayananModel::updateOrCreate(['id' => $id], ['type' => $request->type]);
        request()->session()->flash('sukses', [
            'title' => 'Berhasil Update Data',
            'message' => 'Sukses',
            'type' => 'success'
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        JenisLayananModel::destroy($id);
        request()->session()->flash('sukses', [
            'title' => 'Berhasil Hapus Data',
            'message' => 'Sukses',
            'type' => 'success'
        ]);

        return redirect()->back();
    }
}
