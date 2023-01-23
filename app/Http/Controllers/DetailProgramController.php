<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailProgram;

class DetailProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $data = DetailProgram::where('program_kegiatan_id', $id)->get();
        // return response()->json([
        //     'success' => true,
        //     'message' => 'List Semua Detail Program',
        //     'data' => $data
        // ], 200);
        // if ($request->ajax()) {
        //     $data = DetailProgram::all();
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'List Semua Detail Program',
        //         'data' => $data
        //     ], 200);
        // }

        $data = DetailProgram::where('program_kegiatan_id', $id)->with('program_kegiatan')->get();
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }
}
