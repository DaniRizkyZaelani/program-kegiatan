<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKegiatan;
use App\Models\User;
use App\Models\Bidang;
use Carbon\Carbon;

class ProgramKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prokeg = ProgramKegiatan::all();
        return view('prokeg.index', ['prokeg' => $prokeg]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        $bidang = Bidang::all();

        return view('prokeg.create', ['users' => $users, 'bidang' => $bidang]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $prokeg = ProgramKegiatan::find($request->id);
        if ($request->tanggal_pengajuan) {
            ProgramKegiatan::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                [
                    'nama_program' => $request->nama_program,
                    'bidang_id' => $request->bidang_id,
                    'user_id' => $request->user_id,
                    'tanggal_pengajuan' => $request->tanggal_pengajuan, // contoh
                    'tanggal_mulai' => $request->tanggal_mulai,
                    'tanggal_selesai' => $request->tanggal_selesai,
                    'anggaran' => $request->anggaran,
                ]
            );
        } else {
            ProgramKegiatan::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                [
                    'nama_program' => $request->nama_program,
                    'bidang_id' => $request->bidang_id,
                    'user_id' => $request->user_id,
                    'tanggal_pengajuan' => Carbon::now(),
                    'tanggal_mulai' => $request->tanggal_mulai,
                    'tanggal_selesai' => $request->tanggal_selesai,
                    'anggaran' => $request->anggaran,
                ]
            );
        }

        return redirect()
            ->route('prokeg')
            ->with('status', 'Data Berhasil Dimasuakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $bidang = Bidang::all();
        $prokeg = ProgramKegiatan::find($id);
        $users = User::all();
        return view('prokeg.edit', [
            'prokeg' => $prokeg,
            'users' => $users,
            'bidang' => $bidang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

    }
}
