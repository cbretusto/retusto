<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use DataTables;

//MODEL
Use App\ClcCategoryPmiClc;
Use App\ClcEvidences;
Use App\RapidXUser;

class ClcCategoryPmiClcController extends Controller
{
    //============================== VIEW PMI CLC CATEGORY ==============================
    public function view_clc_category_pmi_clc(){

        $pmi_clc = ClcCategoryPmiClc::where('logdel',0)->get();
        // return $pmi_clc;
        return DataTables::of($pmi_clc)

        ->addColumn('status', function($pmi_clc){
            $result = "<center>";
            if($pmi_clc->status == 1){
                $result .= '<span class="badge badge-pill badge-success">Active</span>';
            }
            else{
                $result .= '<span class="badge badge-pill badge-danger">Inactive</span>';
            }
                $result .= '</center>';
                return $result;
        })

        ->addColumn('uploaded_file', function($pmi_clc){
            $result = "<center>";
            $result .= '<button class="btn actionViewUploadedFile" pmi_clc-id="' . $pmi_clc->id . '" data-toggle="modal" data-target="#modalViewUploadedFile" data-keyboard="false"><i class="fa fa-eye"></i> </button>&nbsp;';
            // if ($pmi_clc->uploaded_file_status == 1){
            //     $result .= "<a href='download_file_pmi_clc_category/" . $pmi_clc->id . "'  > See Attachment</a>";
            // }else{
            //     $result .= '<span class="badge badge-pill badge-dark">No File Uploaded</span>';
            // }
            //     $result .= '</center>';
                return $result;
        })

        ->addColumn('action', function($pmi_clc){
            $result = '<center>';
            if($pmi_clc->status == 1){
                $result .= '<button type="button" class="btn btn-primary btn-sm text-center actionEditPmiClcCategory" style="width:105px;margin:2%;" pmi_clc-id="' . $pmi_clc->id . '" data-toggle="modal" data-target="#modalEditPmiClcCategory" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Edit</button>&nbsp;';
                $result .= '<br>';
                $result .= '<button type="button" class="btn btn-danger btn-sm text-center actionChangeClcCategoryPmiClcStat" style="width:105px;margin:2%;" pmi_clc-id="' . $pmi_clc->id . '" status="2" data-toggle="modal" data-target="#modalChangeClcCategoryPmiClcStat" data-keyboard="false"><i class="nav-icon fas fa-ban"></i> Deactivate</button>&nbsp;';
                $result .= '<br>';
            }else{
                $result .= '<button type="button" class="btn btn-success btn-sm text-center actionChangeClcCategoryPmiClcStat" style="width:105px;margin:2%;" pmi_clc-id="' . $pmi_clc->id . '" status="1" data-toggle="modal"  data-target="#modalChangeClcCategoryPmiClcStat" data-keyboard="false"><i class="nav-icon fas fa-check"></i> Active</button>&nbsp;';
            }
            $result .= '</center>';
            return $result;   
        })

        ->rawColumns(['status', 'uploaded_file', 'action']) // to format the added columns(status & action) as html format
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

    // ========================================= ADD PMI CLC CATEGORY ===================================================
    public function add_pmi_clc_category(Request $request){
        date_default_timezone_set('Asia/Manila');
        
        $data = $request->all();

        $rules = [
            'titles'                                => 'required|string|max:255',
            'control_objectives'                    => 'required|string|max:555',
            'internal_controls'                     => 'required|string|max:555',
        ];
        // return $request;
        $validator = Validator::make($data, $rules);
        // generate file name

        if($validator->passes()){
            if(isset($request->uploaded_file)){
                $original_filename = $request->file('uploaded_file')->getClientOriginalName();
                // return $original_filename;
                Storage::putFileAs('public/pmi_clc_category', $request->uploaded_file,  $original_filename);
                ClcCategoryPmiClc::insert([
                    'titles'                                => $request->titles,
                    'control_objectives'                    => $request->control_objectives,
                    'internal_controls'                     => $request->internal_controls,
                    'g_ng'                                  => $request->g_ng,
                    'detected_problems_improvement_plans'   => $request->detected_problems_improvement_plans,
                    'review_findings'                       => $request->review_findings,
                    'follow_up_details'                     => $request->follow_up_details,
                    'g_ng_last'                             => $request->g_ng_last,
                    // 'uploaded_file'                         => $original_filename,
                    // 'uploaded_file_status'                  => 1, //with file
                    'created_by'                            => $request->created_by,
                    'created_at'                            => date('Y-m-d H:i:s')
                ]);
                return response()->json(['result' => "1"]);
            }else{
                ClcCategoryPmiClc::insert([
                    'titles'                                => $request->titles,
                    'control_objectives'                    => $request->control_objectives,
                    'internal_controls'                     => $request->internal_controls,
                    'g_ng'                                  => $request->g_ng,
                    'detected_problems_improvement_plans'   => $request->detected_problems_improvement_plans,
                    'review_findings'                       => $request->review_findings,
                    'follow_up_details'                     => $request->follow_up_details,
                    'g_ng_last'                             => $request->g_ng_last,
                    // 'uploaded_file'                         => 'N/A',
                    // 'uploaded_file_status'                  => 2, //no file
                    'created_by'                            => $request->created_by,
                    'created_at'                            => date('Y-m-d H:i:s')
                ]);
                return response()->json(['result' => "1"]);
            }
        }
        else{
            return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
        }
    }

    //====================================== DOWNLOAD FILE ======================================
    // public function download_file_pmi_clc_category(Request $request, $id){
    //     $pmi_clc = ClcCategoryPmiClc::where('id', $id)->first();
    //     $file =  storage_path() . "/app/public/pmi_clc_category/" . $pmi_clc->uploaded_file;
    //     // return $pmi_clc;
    //     return Response::download($file, $pmi_clc->uploaded_file);  
    // }

    //============================== GET PMI CLC CATEGORY BY ID TO EDIT ==============================
    public function get_pmi_clc_category_by_id(Request $request){
        $pmi_clc_category = ClcCategoryPmiClc::where('id', $request->pmi_clc_category_id)->get(); // get all reports where id is equal to the pmi_clc-id attribute of the action(Edit)
    //    return $pmi_clc_category;
        return response()->json(['pmi_clc_category' => $pmi_clc_category]);  // pass the $clc_category_pmi_clc_id(variable) to ajax as a response for retrieving and pass the values on the inputs
    }

    // ========================================= EDIT PMI CLC CATEGORY ===================================================
    public function edit_pmi_clc_category(Request $request){
        date_default_timezone_set('Asia/Manila');
        
        $data = $request->all();
        // return $data;
        $rules = [
            'titles'                                => 'required',
            'control_objectives'                    => 'required',
            'internal_controls'                     => 'required',
            'g_ng'                                  => 'required',
            'detected_problems_improvement_plans'   => 'required',
            'review_findings'                       => 'required',
            'follow_up_details'                     => 'required',
            'g_ng_last'                             => 'required',
        ];

        $validator = Validator::make($data, $rules);
        // return $request->pmi_clc_category_id;
        if($validator->passes()){
            if($request->uploaded_file){
                $original_filename = $request->file('uploaded_file')->getClientOriginalName();
                Storage::putFileAs('public/pmi_clc_category', $request->uploaded_file, $original_filename);
                ClcCategoryPmiClc::where('id', $request->pmi_clc_category_id)
                ->update([
                    'titles'                                => $request->titles,
                    'control_objectives'                    => $request->control_objectives,
                    'internal_controls'                     => $request->internal_controls,
                    'g_ng'                                  => $request->g_ng,
                    'detected_problems_improvement_plans'   => $request->detected_problems_improvement_plans,
                    'review_findings'                       => $request->review_findings,
                    'follow_up_details'                     => $request->follow_up_details,
                    'g_ng_last'                             => $request->g_ng_last,
                    // 'uploaded_file'                         => $original_filename,
                    // 'uploaded_file_status'                  => 1, //with file
                    'updated_by'                            => $request->updated_by,
                    'updated_at'                            => date('Y-m-d H:i:s')
                ]);
                return response()->json(['result' => "1"]);
            }else{
                    ClcCategoryPmiClc::where('id', $request->pmi_clc_category_id)
                    ->update([
                    'titles'                                => $request->titles,
                    'control_objectives'                    => $request->control_objectives,
                    'internal_controls'                     => $request->internal_controls,
                    'g_ng'                                  => $request->g_ng,
                    'detected_problems_improvement_plans'   => $request->detected_problems_improvement_plans,
                    'review_findings'                       => $request->review_findings,
                    'follow_up_details'                     => $request->follow_up_details,
                    'g_ng_last'                             => $request->g_ng_last,
                    // 'uploaded_file'                         => 'N/A',
                    // 'uploaded_file_status'                  => 2, //no file
                    'updated_by'                            => $request->updated_by,
                    'updated_at'                            => date('Y-m-d H:i:s')
                ]);
                return response()->json(['result' => "1"]);
            }
        }
        else{
            return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
        }
    }

    //============================== CHANGE PMI CLC STAT ==============================
    public function change_clc_category_pmi_clc_stat(Request $request){        
        date_default_timezone_set('Asia/Manila');

        $data = $request->all(); // collect all input fields

        $validator = Validator::make($data, [
            'clc_category_pmi_clc_id' => 'required',
            'status' => 'required',
        ]);

        if($validator->passes()){
            ClcCategoryPmiClc::where('id', $request->clc_category_pmi_clc_id)
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

    //====================================== AUTO ADD CLC EVIDENCE FILE ======================================
    // public function get_clc_evidence_file(Request $request){
    //     $get_uploaded_file = ClcEvidences::where('clc_category', 'PMI CLC')->get();
    //     // return $get_uploaded_file;
    //     return response()->json(["get_uploaded_file" => $get_uploaded_file]);
    // }
}

