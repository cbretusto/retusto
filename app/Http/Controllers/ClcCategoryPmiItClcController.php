<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use DataTables;

//MODEL
Use App\ClcCategoryPmiItClc;
Use App\RapidXUser;

class ClcCategoryPmiItClcController extends Controller
{
    public function view_clc_category_pmi_it_clc(){

        $pmi_it_clc = ClcCategoryPmiItClc::where('logdel',0)->orderBy('id', 'asc')->get();
        // return $pmi_it_clc;
        return DataTables::of($pmi_it_clc)

        ->addColumn('it_clc_status', function($pmi_it_clc){
            $result = "<center>";
            if($pmi_it_clc->it_clc_status == 1){
                $result .= '<span class="badge badge-pill badge-success">Active</span>';
            }
            else{
                $result .= '<span class="badge badge-pill badge-danger">Inactive</span>';
            }
                $result .= '</center>';
                return $result;
        })

        ->addColumn('uploaded_file', function($pmi_it_clc){
            $result = "<center>";
            $result .= '<button class="btn actionViewUploadedFile" pmi_it_clc-id="' . $pmi_it_clc->id . '" data-toggle="modal" data-target="#modalViewUploadedFile" data-keyboard="false"><i class="fa fa-eye"></i> </button>&nbsp;';
            // if ($pmi_it_clc->uploaded_file_status == 1){
            //     $result .= "<a href='download_file_pmi_it_clc_category/" . $pmi_it_clc->id . "'  > See Attachment</a>";
            // }else{
            //     $result .= '<span class="badge badge-pill badge-dark">No File Uploaded</span>';
            // }
                $result .= '</center>';
                return $result;
        })

        ->addColumn('action', function($pmi_it_clc){
            $result = '<center>';
            if($pmi_it_clc->it_clc_status == 1){
                $result .= '<button type="button" class="btn btn-primary btn-sm text-center actionEditPmiItClcCategory" style="width:105px;margin:2%;" pmi_it_clc-id="' . $pmi_it_clc->id . '" data-toggle="modal" data-target="#modalEditPmiItClcCategory" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Edit</button>&nbsp;';
                $result .= '<br>';
                // $result .= '<button type="button" class="btn btn-dark btn-sm text-center actionSelectFiles" style="width:105px;margin:2%;" pmi_it_clc-id="' . $pmi_it_clc->id . '" data-toggle="modal" data-target="#modalSelectFiles" data-keyboard="false"><i class="nav-icon far fa-file"></i> Select File</button>&nbsp;';
                // $result .= '<br>';
                $result .= '<button type="button" class="btn btn-danger btn-sm text-center actionChangeClcCategoryPmiItClcStat" style="width:105px;margin:2%;" pmi_it_clc-id="' . $pmi_it_clc->id . '" it_clc_status="2" data-toggle="modal" data-target="#modalChangeClcCategoryPmiItClcStat" data-keyboard="false"><i class="nav-icon fas fa-ban"></i> Deactivate</button>&nbsp;';
                $result .= '<br>';
            }else{
                $result .= '<button type="button" class="btn btn-success btn-sm text-center actionChangeClcCategoryPmiItClcStat" style="width:105px;margin:2%;" pmi_it_clc-id="' . $pmi_it_clc->id . '" it_clc_status="1" data-toggle="modal"  data-target="#modalChangeClcCategoryPmiItClcStat" data-keyboard="false"><i class="nav-icon fas fa-check"></i> Active</button>&nbsp;';
            }
            $result .= '</center>';
            return $result;   
        })

        ->rawColumns(['it_clc_status', 'uploaded_file', 'action']) // to format the added columns(status & action) as html format
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

    // ========================================= ADD REPORTS ===================================================
    public function add_pmi_it_clc_category(Request $request){
        date_default_timezone_set('Asia/Manila');
        // session_start();
        
        $data = $request->all();

        $rules = [
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
                Storage::putFileAs('public/pmi_it_clc_category', $request->uploaded_file,  $original_filename);
                ClcCategoryPmiItClc::insert([
                    'it_clc_status'                                => 1,
                    'control_objectives'                    => $request->control_objectives,
                    'internal_controls'                     => $request->internal_controls,
                    'status'                                => $request->status,
                    'detected_problems_improvement_plans'   => $request->detected_problems_improvement_plans,
                    'review_findings'                       => $request->review_findings,
                    'follow_ups'                            => $request->follow_ups,
                    'status_last'                           => $request->status_last,
                    // 'uploaded_file'                         => $original_filename,
                    'created_by'                            => $request->created_by,
                    'created_at'                            => date('Y-m-d H:i:s')
                ]);
                return response()->json(['result' => "1"]);
            }else{
                ClcCategoryPmiItClc::insert([
                    'it_clc_status'                                => 1,
                    'control_objectives'                    => $request->control_objectives,
                    'internal_controls'                     => $request->internal_controls,
                    'status'                                => $request->status,
                    'detected_problems_improvement_plans'   => $request->detected_problems_improvement_plans,
                    'review_findings'                       => $request->review_findings,
                    'follow_ups'                            => $request->follow_ups,
                    'status_last'                           => $request->status_last,
                    // 'uploaded_file'                         => 'N/A',
                    // 'uploaded_file_status'                  => 2,
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
    public function download_file_pmi_it_clc_category(Request $request, $id){
        $pmi_it_clc = ClcCategoryPmiItClc::where('id', $id)->first();
        $file =  storage_path() . "/app/public/pmi_it_clc_category/" . $pmi_it_clc->uploaded_file;
        // return $file;
        return Response::download($file, $pmi_it_clc->uploaded_file);  
    }
    //============================== GET FCRP CATEGORY BY ID TO EDIT ==============================
    public function get_pmi_it_clc_category_by_id(Request $request){
        $pmi_it_clc_category = ClcCategoryPmiItClc::where('id', $request->pmi_it_clc_category_id)->get(); // get all reports where id is equal to the clc_categories-id attribute of the action(Edit)
        // return $pmi_it_clc_category;
        return response()->json(['pmi_it_clc_category' => $pmi_it_clc_category]);  // pass the $clc_category_id(variable) to ajax as a response for retrieving and pass the values on the inputs
    }

    // ========================================= EDIT FCRP EVIDENCE ===================================================
    public function edit_pmi_it_clc_category(Request $request){
        date_default_timezone_set('Asia/Manila');
        // session_start();
        
        $data = $request->all();

        $rules = [
            'status'   => 'required|string|max:555',
            'detected_problems_improvement_plans'   => 'required|string|max:555',
            'review_findings'                       => 'required|string|max:555',
            'follow_ups'                            => 'required|string|max:555',
            'status_last'                            => 'required|string|max:555',
        ];      

        $validator = Validator::make($data, $rules);

        if($validator->passes()){
            if(isset($request->uploaded_file)){
                $original_filename = $request->file('uploaded_file')->getClientOriginalName();
                // return $original_filename;
                Storage::putFileAs('public/pmi_it_clc_category', $request->uploaded_file,  $original_filename);
                ClcCategoryPmiItClc::where('id', $request->pmi_it_clc_category_id)
                ->update([
                    'control_objectives'                    => $request->control_objectives,
                    'internal_controls'                     => $request->internal_controls,
                    'status'                                => $request->status,
                    'detected_problems_improvement_plans'   => $request->detected_problems_improvement_plans,
                    'review_findings'                       => $request->review_findings,
                    'follow_ups'                            => $request->follow_ups,
                    'status_last'                           => $request->status_last,
                    // 'uploaded_file'                         => $original_filename,
                    'updated_by'                            => $request->updated_by,
                    'updated_at'                            => date('Y-m-d H:i:s')
                ]);
                return response()->json(['result' => "1"]);
            }else{
                ClcCategoryPmiItClc::where('id', $request->pmi_it_clc_category_id)
                ->update([
                    'control_objectives'                    => $request->control_objectives,
                    'internal_controls'                     => $request->internal_controls,
                    'status'                                => $request->status,
                    'detected_problems_improvement_plans'   => $request->detected_problems_improvement_plans,
                    'review_findings'                       => $request->review_findings,
                    'follow_ups'                            => $request->follow_ups,
                    'status_last'                           => $request->status_last,
                    // 'uploaded_file'                         => 'N/A',
                    // 'uploaded_file_status'                  => 2,
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

    //============================== CHANGE USER STAT ==============================
    public function change_clc_category_pmi_it_clc_stat(Request $request){        
        date_default_timezone_set('Asia/Manila');

        $data = $request->all(); // collect all input fields
// return $request->status;
        $validator = Validator::make($data, [
            'clc_category_pmi_it_clc_id' => 'required',
            'it_clc_status' => 'required',
        ]);

        if($validator->passes()){
            ClcCategoryPmiItClc::where('id', $request->clc_category_pmi_it_clc_id)
            ->update([
                'it_clc_status' => $request->it_clc_status,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return response()->json(['result' => "1"]);
        }
        else{
            return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
        }
    }

}
