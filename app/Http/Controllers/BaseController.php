<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Jabatan as Jb;
use App\Models\Role;

class BaseController extends Controller
{
    public function index()
    {
        $data_jabatan = Jb::all();
        return view('master_jabatan_all', [
            "judul" => "View | Jabatan"
        ], compact('data_jabatan'));
    }

    public function about()
    {
        return view('dasboard', [
            "judul" => "About | Me.!"
        ]);
    }

    public function addJabatan(Request $req): JsonResponse
    {
        $req->validate([
            'jabatan_code' => 'required',
            'jabatan_name' => 'required'
        ]);

        $insert = [
            'jabatan_code' => $req->jabatan_code,
            'jabatan_name' => $req->jabatan_name
        ];

        $input_jabatan = Jb::create($insert);

        if ($input_jabatan == true) {
            return response()->json([
                'status' => true,
                'respon code' => Response::HTTP_CREATED,
                'message' => 'Data has been successfully created'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'respon code' => Response::HTTP_NO_CONTENT
            ]);
        }
    }

    public function getForEdit(Request $req)
    {
        $run_query = Jb::find($req->id);
        return view('master_jabatan_edit', [
            "judul" => "View | Jabatan"
        ], compact('run_query'));
    }

    public function getJbtById($id)
    {
        $get_id = Jb::find($id);
        return response()->json($get_id);
    }


    public function updateJbt(Request $request): JsonResponse
    {
        $update_jbt = Jb::find($request->id);
        $update_jbt->jabatan_code = $request->jabatan_code;
        $update_jbt->jabatan_name = $request->jabatan_name;
        if ($update_jbt->save() == true) {
            return response()->json([
                'status' => true,
                'respon code' => Response::HTTP_OK,
                'message' => 'Data has been successfully modify'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'respon code' => Response::HTTP_NOT_MODIFIED,
                'message' => 'Data failled modify'
            ]);
        }
    }

    public function delJbt($id): JsonResponse
    {
        $del_jbt = Jb::find($id);
        $runn_del = $del_jbt->delete();
        if ($runn_del == true) {
            return response()->json([
                'status' => true,
                'respon code' => Response::HTTP_OK,
                'message' => 'Data has been successfully deleted'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'respon code' => Response::HTTP_NOT_FOUND,
                'message' => 'No data are deleted'
            ]);
        }
    }

    /*==================== Function for roles ===============================================*/

    public function indexRoles()
    {
        $data_role = Role::all();
        return view('master_roles_all', [
            "judul" => "View | Roles"
        ], compact('data_role'));
    }

    public function addRoles(Request $req): JsonResponse
    {
        $req->validate([
            'access_name' => 'required',
            'access_desc' => 'required'
        ]);

        $insert = [
            'access_name' => $req->access_name,
            'access_desc' => $req->access_desc
        ];

        $input_role = Role::create($insert);

        if ($input_role == true) {
            return response()->json([
                'status' => true,
                'respon code' => Response::HTTP_CREATED,
                'message' => 'Data has been successfully added'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'respon code' => Response::HTTP_NO_CONTENT,
                'message' => 'Data unccessfull added'
            ]);
        }
    }

    public function getRoleById($id)
    {
        $get_id = Role::find($id);
        return response()->json($get_id);
    }


    public function updateRole(Request $request): JsonResponse
    {
        $update_role = Role::find($request->id);
        $update_role->access_name = $request->access_name;
        $update_role->access_desc = $request->access_desc;
        if ($update_role->save() == true) {
            return response()->json([
                'status' => true,
                'respon code' => Response::HTTP_OK,
                'message' => 'Data has been successfully modify'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'respon code' => Response::HTTP_NOT_MODIFIED,
                'message' => 'Data failled modify'
            ]);
        }
    }

    public function delRole($id): JsonResponse
    {
        $del_role = Role::find($id);
        $runn_del = $del_role->delete();
        if ($runn_del == true) {
            return response()->json([
                'status' => true,
                'respon code' => Response::HTTP_OK,
                'message' => 'Data has been successfully deleted'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'respon code' => Response::HTTP_NOT_FOUND,
                'message' => 'No data are deleted'
            ]);
        }
    }
}