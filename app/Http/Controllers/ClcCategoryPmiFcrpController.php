<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use DataTables;

//MODEL
Use App\ClcCategoryPmiFcrp;
Use App\RapidXUser;

class ClcCategoryPmiFcrpController extends Controller
{
    //============================== VIEW PMI FCRP CATEGORY ==============================
    public function view_clc_category_pmi_fcrp(){

        $pmi_fcrp = ClcCategoryPmiFcrp::where('logdel',0)->orderBy('status', 'asc')->get();
        // return $pmi_fcrp;
        return DataTables::of($pmi_fcrp)

        ->addColumn('status', function($pmi_fcrp){
            $result = "<center>";
            if($pmi_fcrp->status == 1){
                $result .= '<span class="badge badge-pill badge-success">Active</span>';
            }
            else{
                $result .= '<span class="badge badge-pill badge-danger">Inactive</span>';
            }
                $result .= '</center>';
                return $result;
        })

        ->addColumn('uploaded_file', function($pmi_fcrp){
            $result = "<center>";
            $result .= '<button class="btn actionViewUploadedFile" pmi_fcrp-id="' . $pmi_fcrp->id . '" data-toggle="modal" data-target="#modalViewUploadedFile" data-keyboard="false"><i class="fa fa-eye"></i> </button>&nbsp;';
            // if ($pmi_fcrp->uploaded_file_status == 1){
            //     $result .= "<a href='download_file_pmi_fcrp_category/" . $pmi_fcrp->id . "'  > See Attachment</a>";
            // }else{
            //     $result .= '<span class="badge badge-pill badge-dark">No File Uploaded</span>';
            // }
                $result .= '</center>';
                return $result;
        })

        ->addColumn('action', function($pmi_fcrp){
            $result = '<center>';
            if($pmi_fcrp->status == 1){
                $result .= '<button type="button" class="btn btn-primary btn-sm text-center actionEditPmiFcrpCategory" style="width:105px;margin:2%;" pmi_fcrp-id="' . $pmi_fcrp->id . '" data-toggle="modal" data-target="#modalEditPmiFcrpCategory" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Edit</button>&nbsp;';
                $result .= '<br>';
                // $result .= '<button type="button" class="btn btn-dark btn-sm text-center actionSelectFiles" style="width:105px;margin:2%;" pmi_fcrp-id="' . $pmi_fcrp->id . '" data-toggle="modal" data-target="#modalSelectFiles" data-keyboard="false"><i class="nav-icon far fa-file"></i> Select File</button>&nbsp;';
                // $result .= '<br>';
                $result .= '<button type="button" class="btn btn-danger btn-sm text-center actionChangeClcCategoryPmiFcrpStat" style="width:105px;margin:2%;" pmi_fcrp-id="' . $pmi_fcrp->id . '" status="2" data-toggle="modal" data-target="#modalChangeClcCategoryPmiFcrpStat" data-keyboard="false"><i class="nav-icon fas fa-ban"></i> Deactivate</button>&nbsp;';
                $result .= '<br>';
            }else{
                $result .= '<button type="button" class="btn btn-success btn-sm text-center actionChangeClcCategoryPmiFcrpStat" style="width:105px;margin:2%;" pmi_fcrp-id="' . $pmi_fcrp->id . '" status="1" data-toggle="modal"  data-target="#modalChangeClcCategoryPmiFcrpStat" data-keyboard="false"><i class="nav-icon fas fa-check"></i> Active</button>&nbsp;';
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

    // ========================================= ADD PMI FCRP CATEGORY ===================================================
    public function add_pmi_fcrp_category(Request $request){
        date_default_timezone_set('Asia/Manila');
        // session_start();
        
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
                Storage::putFileAs('public/pmi_fcrp_category', $request->uploaded_file,  $original_filename);
                ClcCategoryPmiFcrp::insert([
                    'status'                                => 1,
                    'titles'                                => $request->titles,
                    'control_objectives'                    => $request->control_objectives,
                    'internal_controls'                     => $request->internal_controls,
                    'g_ng'                                  => $request->g_ng,
                    'detected_problems_improvement_plans'   => $request->detected_problems_improvement_plans,
                    'review_findings'                       => $request->review_findings,
                    'follow_up_details'                     => $request->follow_up_details,
                    'g_ng_last'                             => $request->g_ng_last,
                    // 'uploaded_file'                         => $original_filename,
                    'created_by'                            => $request->created_by,
                    'created_at'                            => date('Y-m-d H:i:s')
                ]);
                return response()->json(['result' => "1"]);
            }else{
                ClcCategoryPmiFcrp::insert([
                    'status'                                => 1,
                    'titles'                                => $request->titles,
                    'control_objectives'                    => $request->control_objectives,
                    'internal_controls'                     => $request->internal_controls,
                    'g_ng'                                  => $request->g_ng,
                    'detected_problems_improvement_plans'   => $request->detected_problems_improvement_plans,
                    'review_findings'                       => $request->review_findings,
                    'follow_up_details'                     => $request->follow_up_details,
                    'g_ng_last'                             => $request->g_ng_last,
                    // 'uploaded_file'                         => '',
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
    public function download_file_pmi_fcrp_category(Request $request, $id){
        $pmi_fcrp = ClcCategoryPmiFcrp::where('id', $id)->first();
        $file =  storage_path() . "/app/public/pmi_fcrp_category/" . $pmi_fcrp->uploaded_file;
        // return $pmi_fcrp->uploaded_file;
        return Response::download($file, $pmi_fcrp->uploaded_file);  
    }
    //============================== GET FCRP CATEGORY BY ID TO EDIT ==============================
    public function get_pmi_fcrp_category_by_id(Request $request){
        $pmi_fcrp_category = ClcCategoryPmiFcrp::where('id', $request->pmi_fcrp_category_id)->get(); // get all reports where id is equal to the clc_categories-id attribute of the action(Edit)
        return response()->json(['pmi_fcrp_category' => $pmi_fcrp_category]);  // pass the $clc_category_id(variable) to ajax as a response for retrieving and pass the values on the inputs
    }

    // ========================================= EDIT PMI FCRP CATEGORY ===================================================
    public function edit_pmi_fcrp_category(Request $request){
        date_default_timezone_set('Asia/Manila');
        // session_start();
        
        $data = $request->all();

        $rules = [
            'titles'                                => 'required|string|max:255',
            'control_objectives'                    => 'required|string|max:555',
            'internal_controls'                     => 'required|string|max:555',
            // 'g_ng'                                  => 'required|string|max:255',
            // 'detected_problems_improvement_plans'   => 'required|string|max:555',
            // 'review_findings'                       => 'required|string|max:555',
            // 'follow_up_details'                     => 'required|string|max:555',
            // 'g_ng_last'                             => 'required|string|max:255',
        ];

        $validator = Validator::make($data, $rules);

        if($validator->passes()){
            if(isset($request->uploaded_file)){
                $original_filename = $request->file('uploaded_file')->getClientOriginalName();
                // return $original_filename;
                Storage::putFileAs('public/pmi_fcrp_category', $request->uploaded_file,  $original_filename);
                ClcCategoryPmiFcrp::where('id', $request->pmi_fcrp_category_id)
                ->update([
                    'status'                                => 1,
                    'titles'                                => $request->titles,
                    'control_objectives'                    => $request->control_objectives,
                    'internal_controls'                     => $request->internal_controls,
                    'g_ng'                                  => $request->g_ng,
                    'detected_problems_improvement_plans'   => $request->detected_problems_improvement_plans,
                    'review_findings'                       => $request->review_findings,
                    'follow_up_details'                     => $request->follow_up_details,
                    'g_ng_last'                             => $request->g_ng_last,
                    // 'uploaded_file'                         => $original_filename,
                    'created_by'                            => $request->created_by,
                    'created_at'                            => date('Y-m-d H:i:s')
                ]);
                return response()->json(['result' => "1"]);
            }else{
                ClcCategoryPmiFcrp::where('id', $request->pmi_fcrp_category_id)
                ->update([
                    'status'                                => 1,
                    'titles'                                => $request->titles,
                    'control_objectives'                    => $request->control_objectives,
                    'internal_controls'                     => $request->internal_controls,
                    'g_ng'                                  => $request->g_ng,
                    'detected_problems_improvement_plans'   => $request->detected_problems_improvement_plans,
                    'review_findings'                       => $request->review_findings,
                    'follow_up_details'                     => $request->follow_up_details,
                    'g_ng_last'                             => $request->g_ng_last,
                    // 'uploaded_file'                         => '',
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

    //============================== CHANGE PMI FCRP CATEGORY STAT ==============================
    public function change_clc_category_pmi_fcrp_stat(Request $request){        
        date_default_timezone_set('Asia/Manila');

        $data = $request->all(); // collect all input fields

        $validator = Validator::make($data, [
            'clc_category_pmi_fcrp_id' => 'required',
            'status' => 'required',
        ]);

        if($validator->passes()){
            ClcCategoryPmiFcrp::where('id', $request->clc_category_pmi_fcrp_id)
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
}
