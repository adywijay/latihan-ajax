<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Jabatan as Jb;

class Cara1ForAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_jabatan = Jb::all();
        return view('master_jabatan_all', [
            "judul" => "View | Jabatan"
        ], compact('data_jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        //
        $postID = $request->post_id;
        $post   =   Jb::updateOrCreate(
            ['id' => $postID],
            [
                'jabatan_code' => $request->jabatan_code,
                'jabatan_name' => $request->jabatan_name
            ]
        );
        return response()->json($post);
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
        $where = array('id' => $id);
        $post  = Jb::where($where)->first();

        return response()->json($post);
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
        $post = Jb::where('id', $id)->delete();

        return response()->json($post);
    }
}