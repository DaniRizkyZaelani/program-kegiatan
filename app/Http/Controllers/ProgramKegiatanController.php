<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKegiatan;
use App\Models\User;
use App\Models\Bidang;
use App\Models\DetailProgram;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\ErrorHandler\Debug;

class ProgramKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'mahasiswa') {
            $prokeg = ProgramKegiatan::where('user_id', Auth::user()->id)
                ->orderBy('tanggal_pengajuan', 'asc')
                ->get();
            return view('prokeg.index', ['prokeg' => $prokeg]);
        }
        $prokeg = ProgramKegiatan::orderBy('tanggal_pengajuan', 'asc')->get();
        return view('prokeg.index', ['prokeg' => $prokeg]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $prokeg = ProgramKegiatan::where(
            'nama_program',
            'like',
            '%' . $cari . '%'
        )->get();
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
        if ($request->tanggal_pengajuan) {
            $prokeg = ProgramKegiatan::where('id', $request->id)->first();
            ProgramKegiatan::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                [
                    'nama_program' => $request->nama_program,
                    'bidang_id' => $request->bidang_id,
                    'user_id' => $prokeg->user_id,
                    'penanggung_jawab_id' => $request->penanggung_jawab_id,
                    'tanggal_pengajuan' => $request->tanggal_pengajuan,
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
                    'user_id' => Auth::user()->id,
                    'penanggung_jawab_id' => $request->penanggung_jawab_id,
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

    public function showbukti()
    {
        $detail = DetailProgram::all();

        return view('prokeg.bukti', ['detail' => $detail]);
    }

    public function showpending(Request $request)
    {
        return view('prokeg.show-pending', [
            'prokeg' => ProgramKegiatan::all(),
        ]);
    }
    public function showsuccess(Request $request)
    {
        return view('prokeg.show-success', [
            'prokeg' => ProgramKegiatan::all(),
        ]);
    }

    public function approve(Request $request)
    {
        $prokeg = ProgramKegiatan::find($request->id);
        $prokeg->status = '1';
        $prokeg->save();
    }

    public function reject(Request $request)
    {
        $prokeg = ProgramKegiatan::find($request->id);
        $prokeg->status = '2';
        $prokeg->save();
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
        ProgramKegiatan::destroy($id);
    }
}
