<?php

namespace App\Http\Controllers\LT;

use App\Http\Controllers\Controller;
use App\Models\AdminLayananModel;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.terpadu.dashboard', ['title' => 'Daftar Pengajuan', 'type' => 'admin_riwayat', 'view' => 'admin', 'tableType' => 'admin_lt']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_layanan_id' => ['required'],
            'user_id' => ['required'],
        ]);
        // dd($user->roles->first()->name);

        $sup = Role::where('name', 'admin_layanan')->get();
        $user = User::find($request->user_id);
        $user->roles()->sync([$sup[0]->id]);

        AdminLayananModel::create($request->all());
        request()->session()->flash('sukses', [
            'title' => 'Berhasil Menambah Data',
            'message' => 'Sukses',
            'type' => 'success'
        ]);

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
            'jenis_layanan_id' => ['required'],
            'user_id' => ['required'],
        ]);
        AdminLayananModel::updateOrcreate(['id' => $id], $request->all());
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
        $userLayanan = AdminLayananModel::find($id);

        $sup = Role::where('name', 'guest')->get();
        $user = User::find($userLayanan->user_id);
        $user->roles()->sync([$sup[0]->id]);

        AdminLayananModel::destroy($id);
        request()->session()->flash('sukses', [
            'title' => 'Berhasil Hapus Data',
            'message' => 'Sukses',
            'type' => 'success'
        ]);

        return redirect()->back();
    }
}
