<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use DataTables;

//MODEL
Use App\ClcCategory;
Use App\RapidXUser;

class ClcCategoryController extends Controller
{
    //============================== VIEW REPORT ==============================
    public function view_clc_category(){

        $clc_categories = ClcCategory::where('logdel',0)->get();
        return DataTables::of($clc_categories)

        ->addColumn('status', function($clc_categories){
            $result = "<center>";
            if($clc_categories->status == 1){
                $result .= '<span class="badge badge-pill badge-success">Active</span>';
            }
            else{
                $result .= '<span class="badge badge-pill badge-danger">Inactive</span>';
            }
                $result .= '</center>';
                return $result;
        })

        ->addColumn('action', function($clc_categories){
            $result = '<center>';
            if($clc_categories->status == 1){
                $result .= '<button class="btn btn-primary btn-sm text-center actionEditClcCategory" clc_categories-id="' . $clc_categories->id . '" data-toggle="modal" data-target="#modalEditClcCategory" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Edit</button>&nbsp;';
                $result .= '<button class="btn btn-danger btn-sm text-center actionChangeClcCategoryStat" clc_categories-id="' . $clc_categories->id . '" status="2" data-toggle="modal" data-target="#modalChangeClcCategoryStat" data-keyboard="false"><i class="nav-icon fas fa-ban"></i> Deactivate</button>&nbsp;';
            }else{
                $result .= '<button class="btn btn-success btn-sm text-center actionChangeClcCategoryStat" clc_categories-id="' . $clc_categories->id . '" status="1" data-toggle="modal"  data-target="#modalChangeClcCategoryStat" data-keyboard="false"><i class="nav-icon fas fa-check"></i> Active</button>&nbsp;';
            }
                $result .= '</br>';
            return $result;   
        })

        ->rawColumns(['status', 'action']) // to format the added columns(status & action) as html format
        ->make(true);  
    }

    //====================================== AUTO ADD CREATED BY ======================================
    public function get_rapidx_user(Request $request){
        session_start();
        $rapidx_user_id = $_SESSION['rapidx_user_id'];
        $get_user = RapidXUser::where('id', $rapidx_user_id)->get();
        // return $get_user;
        return response()->json(["get_user" => $get_user]);
    }

    //============================== ADD CLC CATEGORY ==============================
    public function add_clc_category(Request $request){
        date_default_timezone_set('Asia/Manila');

        $data = $request->all();

        $rules = [
            'category' => 'required|string|max:255',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json(['validation' => 'hasError', 'error' => $validator->messages()]);
        }
        else{
            DB::beginTransaction();
            try{
                ClcCategory::insert([
                    'category' => $request->category,
                    'created_by' => $request->created_by,
                    'status' => 1,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s')
                ]);
                
                DB::commit();
                return response()->json(['result' => "1"]);
            }
            catch(\Exception $e) {
                DB::rollback();
                return response()->json(['result' => $e]);
            }
        }
    }

    //============================== GET CLC CATEGORY BY ID TO EDIT ==============================
    public function get_clc_category_by_id(Request $request){
        $clc_category_id = ClcCategory::where('id', $request->clc_categories_id)->get(); // get all reports where id is equal to the clc_categories-id attribute of the action(Edit)
        return response()->json(['clc_category_id' => $clc_category_id]);  // pass the $clc_category_id(variable) to ajax as a response for retrieving and pass the values on the inputs
    }
    
    //============================== EDIT USER ==============================
    public function edit_clc_category(Request $request){
        date_default_timezone_set('Asia/Manila');

        $data = $request->all(); // collect all input fields

        $validator = Validator::make($data, [
            'category' => 'required|string|max:255',
        ]);

        if($validator->fails()) {
            return response()->json(['validation' => 'hasError', 'error' => $validator->messages()]);
        }
        else{
            /* DB::beginTransaction();*/
            try{
                ClcCategory::where('id', $request->clc_categories_id)
                ->update([ // The update method expects an array of column and value pairs representing the columns that should be updated.
                    'category' => $request->category,
                    'updated_by' => $request->updated_by,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
                
                /*DB::commit();*/
                return response()->json(['result' => "1"]);
            }
            catch(\Exception $e) {
                DB::rollback();
                // throw $e;
                return response()->json(['result' => "0", 'tryCatchError' => $e]);
            }
        }
    }

    //============================== CHANGE USER STAT ==============================
    public function change_clc_category_stat(Request $request){        
        date_default_timezone_set('Asia/Manila');

        $data = $request->all(); // collect all input fields

        $validator = Validator::make($data, [
            'clc_category_id' => 'required',
            'status' => 'required',
        ]);

        if($validator->passes()){
            ClcCategory::where('id', $request->clc_category_id)
            ->update([
                'status' => $request->status,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return response()->json(['result' => "1"]);
        }
        else{
            return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
        }
    }

    //============================== GET CLC CATEGORY  ==============================
    public function get_clc_category(Request $request){
        $clc_categories = ClcCategory::where('logdel', 0)->where('status', 1)->get();
    // return $user_approvers;
        return response()->json(['clc_categories' => $clc_categories]);
    }

}
