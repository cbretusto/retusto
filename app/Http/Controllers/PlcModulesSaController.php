<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use DataTables;

//MODEL
use App\PLCModuleSA;
use App\RapidXUser;
use Carbon\Carbon;

class PlcModulesSaController extends Controller
{

    public function view_plc_sa_data(Request $request){
        $plc_module_sa = PLCModuleSA::where('category', $request->session)->where('logdel', 0)->get();
        // return $plc_module_sa;

        return DataTables::of($plc_module_sa)

        ->addColumn('dic_assessment', function($plc_module_sa){
            $result = "<center>";
            $result .= '<button class="btn btn-outline-dark btn-sm actionViewUploadedFile" plc_module_sa-id="' . $plc_module_sa->id . '" data-toggle="modal" data-target="#modalViewUploadedFile" data-keyboard="false"><i class="fa fa-eye"></i> View Attachment</button>&nbsp;';
            // if ($pmi_clc->uploaded_file_status == 1){
            //     $result .= "<a href='download_file_pmi_clc_category/" . $pmi_clc->id . "'  > See Attachment</a>";
            // }else{
            //     $result .= '<span class="badge badge-pill badge-dark">No File Uploaded</span>';
            // }
            //     $result .= '</center>';
                return $result;
        })

        ->addColumn('action', function ($plc_module_sa){
            $result = '<center>';
            // if($plc_module_sa->status == 2){
                $result .= '<button type="button" class="btn btn-primary btn-sm text-center actionEditSaData"  style="width:75px;margin:2%;" sa_data-id="' . $plc_module_sa->id . '" data-toggle="modal" data-target="#modalEditSaData" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Edit </button>';
                $result .= '<br>';
                $result .= '<button type="button" class="btn btn-danger btn-sm text-center actionDeleteSaData" style="width:75px;margin:2%;" sa_data-id="' . $plc_module_sa->id . '"  data-toggle="modal" data-target="#modalDeleteSaData" data-keyboard="false"><i class="nav-icon fas fa-ban">&nbsp;</i>Delete</button>&nbsp;';
                $result .= '<br>';
            // }else{
                // $result .= '<button type="button" class="btn btn-success btn-sm text-center actionChangeClcCategoryPmiClcStat" style="width:105px;margin:2%;" sa_data-id="' . $plc_module_sa->id . '" status="1" data-toggle="modal"  data-target="#modalChangeClcCategoryPmiClcStat" data-keyboard="false"><i class="nav-icon fas fa-check"></i> Active</button>&nbsp;';
            // }
            $result .= '</center>';
            return $result;

                // $result .= '<button class="m-r-15 text-muted btn actionGetRcmData" sa_module-id="' . $plc_module_sa->id . '" data-toggle="modal" data-target="#modalViewRcmData" data-keyboard="false"><i class="fa fa-eye" style="color: #40E0D0;"></i> </button>&nbsp;';
                // $result .= '<br>';
                // $result .= '<button class="btn btn-primary btn-sm  text-center actionEditSaData" sa_data-id="' . $plc_module_sa->id . '" data-toggle="modal" data-target="#modalEditSaData" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Edit</button>&nbsp;';
                // $result .= '<br>';
                // $result .= '<button class="btn btn-danger btn-sm text-center actionDeleteSaData" sa_data-id="' . $plc_module_sa->id . '"  data-toggle="modal" data-target="#modalDeleteSaData" data-keyboard="false"><i class ="nav-icon fa fa-ban"></i>  Delete</button>&nbsp;';
        })
            ->rawColumns(['action', 'dic_assessment'])
            ->make(true);
    }

    // // ========================================= ADD SA MODULE ===================================================
    // public function add_sa_module(Request $request){
    //     date_default_timezone_set('Asia/Manila');

    //     $data = $request->all();

    //     $rules = [
    //         'control_no'          => 'required|string|max:255',
    //         'internal_control'    => 'required|string|max:555',
    //     ];

    //     $validator = Validator::make($data, $rules);

    //     if($validator->passes()){
    //         PLCModuleSA::insert([
    //             'category'          => $request->category_name,
    //             'assessed_by'       => $request->assessed_by,
    //             'checked_by'        => $request->checked_by,
    //             'control_no'        => $request->control_no,
    //             'key_control'       => $request->key_control,
    //             'it_control'        => $request->it_control,
    //             'internal_control'  => $request->internal_control,
    //             'dic_assessment'    => $request->dic_assessment,
    //             'dic_status'        => $request->dic_status,
    //             'oec_assessment'    => $request->oec_assessment,
    //             'oec_status'        => $request->oec_status,
    //             'rf_improvement'    => $request->rf_improvement,
    //             'rf_assessment'     => $request->rf_assessment,
    //             'rf_status'         => $request->rf_status,
    //             // 'created_by'        => $request->created_by,
    //             'created_at'        => date('Y-m-d H:i:s')
    //         ]);
    //         return response()->json(['result' => "1"]);
    //     }
    //     else{
    //         return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
    //     }
    // }

    //============================== EDIT SA DATA BY ID TO EDIT ==============================
    public function get_sa_data_to_edit(Request $request){
        $sa_data = PLCModuleSA::where('id', $request->sa_data_id)->get(); // get all users where id is equal to the user-id attribute of the dropdown-item of actions dropdown(Edit)
        // return $sa_data;

        return response()->json(['sa_data' => $sa_data]);  // pass the $user(variable) to ajax as a response for retrieving and pass the values on the inputs
    }

    // ========================================= Edit SA MODULE ===================================================
    public function edit_sa_module(Request $request){
        date_default_timezone_set('Asia/Manila');

        $data = $request->all();

        $rules = [
            'control_no'        => 'required|string|max:255',
            'internal_control'  => 'required|string|max:555',
            'dic_assessment'    => 'required|string|max:555',
            'dic_status'        => 'required|string|max:555',
            'oec_assessment'    => 'required|string|max:555',
            'oec_status'        => 'required|string|max:555',
            'rf_improvement'    => 'required|string|max:555',
            'rf_assessment'     => 'required|string|max:555',
            'rf_status'         => 'required|string|max:555',
        ];

        $validator = Validator::make($data, $rules);

        if($validator->passes()){
            PLCModuleSA::where('id', $request->sa_data_id)
            ->update([
                'fiscal_year'       => $request->fiscal_year,
                'category'          => $request->category_name,
                'assessed_by'       => $request->assessed_by,
                'checked_by'        => $request->checked_by,
                'control_no'        => $request->control_no,
                'key_control'       => $request->key_control,
                'it_control'        => $request->it_control,
                'internal_control'  => $request->internal_control,
                'dic_assessment'    => $request->dic_assessment,
                'dic_status'        => $request->dic_status,
                'oec_assessment'    => $request->oec_assessment,
                'oec_status'        => $request->oec_status,
                'rf_improvement'    => $request->rf_improvement,
                'rf_assessment'     => $request->rf_assessment,
                'rf_status'         => $request->rf_status,
                'created_at'        => date('Y-m-d H:i:s')
            ]);
            return response()->json(['result' => "1"]);
        }
        else{
            return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
        }
    }

    //============================== DELETE SA DATA ==============================
    public function delete_sa_data(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all(); // collect all input fields

        try{
            PLCModuleSA::where('id', $request->sa_data_id)
            ->update([ // The update method expects an array of column and value pairs representing the columns that should be updated.
                'logdel' => 1, // deleted
                // 'last_updated_by' => $_SESSION['user_id'], // to track edit operation
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            /*DB::commit();*/
            return response()->json(['result' => "1"]);
        }
        catch(\Exception $e) {
            DB::rollback();
            // throw $e;
            return response()->json(['result' => "0", 'tryCatchError' => $e->getMessage()]);
        }
    } // DELETE RCM DATA END

    public function get_uploaded_file(Request $request){
        date_default_timezone_set('Asia/Manila');

        $get_control_id = PLCModuleSA::where('control_no')->get();
        return $get_control_id;
    }
}
