<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\PlcEvidences;
use App\SelectPlcEvidence;
use App\RapidXUser;
use DataTables;
use Carbon\Carbon;

class PlcEvidencesController extends Controller
{

    public function view_plc_evidences()
    {
        $plc_evidences = PlcEvidences::all();

        return DataTables::of($plc_evidences)
        ->addColumn('action',function($plc_evidences){
            $result = "";
            $result = "<center>";
            $result .= '<button class="btn btn-primary btn-sm  text-center actionEditPlcEvidences" plc_evidences-id="' . $plc_evidences->id . '" data-toggle="modal" data-target="#modalEditPlcEvidences" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Edit</button>&nbsp;';
            $result .= '</center>';
            return $result;
        })
        ->addColumn('plc_evidences', function($plc_evidences){
            // $result = "<center>";

            // if($plc_evidences->plc_evidences == "No File Uploaded"){
            //     $result .= '<span class="badge badge-pill badge-danger">No file uploaded!</span>';
            // }
            // else{
            //     $result .= "<a href='download_plc_evidences/" . $plc_evidences->id . "' > $plc_evidences->plc_evidences</a>";
            // }
            //     $result .= '</center>';
            $result = "";
            if($plc_evidences->plc_evidences != null){
                $exploded_arr_original_file = explode("/", $plc_evidences->plc_evidences);
                foreach($exploded_arr_original_file as $file){
                    // $result = $file;
                    $result .=  "<a href='download_plc_evidences/" . $file . "' > $file </a><br>";
                }
            }
                return $result;
        })

        ->addColumn('updated_a1', function($plc_evidences){
            $result = "";
            $date =$plc_evidences->updated_at;

            if($date != null){
                $result .= Carbon::parse($date)->format('M. d, Y');
            }
            //$result = Carbon::$date->format('M. d, Y');
            return $result;
        })
        ->addColumn('uploaded_by', function($plc_evidences){
                $result = "";
            if ($plc_evidences->status == 0){

                    $result .= $plc_evidences->uploaded_by;
            }else{
                $result .= $plc_evidences->revised_by;
            }
            return $result;
            })

        ->addColumn('date_uploaded', function($plc_evidences){
                $result = "";
            if ($plc_evidences->status == 0){
                $result .= $plc_evidences->date_uploaded;
            }else{
                $result .= $plc_evidences->revised_date;
            }
            return $result;
        })
            ->rawColumns(['action','plc_evidences','updated_a1','uploaded_by', 'date_uploaded'])
            ->make(true);
    }

    // Chan March 16, 2022
    public function view_select_pmi_plc_evidences_file(Request $request)
    {
        $plc_evidences = PlcEvidences::where('logdel', 0)->where('plc_category', 'like', '%'.$request->category.'%')->get();
        return DataTables::of($plc_evidences)
        ->addColumn('action',function($plc_evidences){
            $result = "";
            $result = '<center>';
            $result .= '<button type="button" class="btn btn-primary btn-sm text-center actionSelectPlcEvidences" plc_evidences-id="' . $plc_evidences->id . '" filter="1" data-toggle="modal" data-target="#modalSelectPlcEvidences" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Add Reference Document</button>';
            $result .= '</center>';
            return $result;
        })
        ->addColumn('plc_evidences', function($plc_evidences){
            $result = "";
            if($plc_evidences->plc_evidences != null){
                $exploded_arr_original_file = explode("/", $plc_evidences->plc_evidences);
                foreach($exploded_arr_original_file as $file){
                    // $result = $file;
                    $result .=  "<a href='download_plc_evidences/" . $file . "' > $file </a><br>";
                }
            }
                return $result;
        })
            ->rawColumns(['action','plc_evidences'])
            ->make(true);
    }

    // Chan March 16, 2022
    public function view_pmi_plc_evidences_file(Request $request)
    {
        // $plc_evidences = PlcEvidences::where('logdel', 0)->get();
        $plc_evidences = SelectPlcEvidence::with(['category_details','sa_details', 'plc_evidences_details'])
        ->where('plc_sa_id', $request->id)
        ->where('assessment_details_and_findings', $request->buttonid)
        ->where('filter', 1)
        ->get();
        // return $plc_evidences;
        return DataTables::of($plc_evidences)

        ->addColumn('plc_evidences', function($plc_evidences){
            $result = "";
            if($plc_evidences->plc_evidences_details != null){
                $exploded_arr_original_file = explode("/", $plc_evidences->plc_evidences_details->plc_evidences);
                foreach($exploded_arr_original_file as $file){
                    // $result = $file;
                    $result .=  "<a href='download_plc_evidences/" . $file . "' > $file </a><br>";
                }
            }
                return $result;
        })
            ->rawColumns(['plc_evidences'])
            ->make(true);
    }



    // public function view_select_pmi_plc_evidences_file(Request $request){
    //     $plc_evidences = PlcEvidences::where('logdel', 0)->where('plc_category', 'like', '%'.$request->category.'%')->get();

    //     return DataTables::of($plc_evidences)

    //     ->addColumn('plc_evidences', function($plc_evidences){
    //         $result = "<center>";
    //         if($plc_evidences->plc_evidences != null){
    //             $exploded_arr_original_file = explode(", ", $plc_evidences->plc_evidences);
    //             foreach($exploded_arr_original_file as $file){
    //                 // $result = $file;
    //                 $result .=  "<a href='download_plc_evidences/" . $file . "' > $file </a><br>";
    //             }
    //         }
    //         $result .= '</center>';
    //         return $result;
    //     })
    //         ->rawColumns(['plc_evidences'])
    //         ->make(true);
    // }

    public function get_rapidx_user(Request $request){
        session_start();
        $rapidx_user_id = $_SESSION['rapidx_user_id'];
        $get_user = RapidXUser::where('id', $rapidx_user_id)->get();
        // return $get_user;
        return response()->json(["get_user" => $get_user]);
        }


        // ========================================= ADD PLC EVIDENCES ===================================================
    public function add_plc_evidences(Request $request){
        date_default_timezone_set('Asia/Manila');
        // session_start();

        $data = $request->all();
        // $file = $request->file('upload_file');


        $validator = Validator::make($data, [
            'plc_category' => 'required',
        ]);

        if($validator->passes()){

            $arr_uploaded_file = array();
            $uploaded_file_orig = null;

            if($request->hasFile('uploaded_file')){
                // return $request->file('uploaded_file')[0]->getClientMimeType();
                if ($request->file('uploaded_file')[0]->getClientMimeType() == 'application/pdf')
                {

                    $files = $request->file('uploaded_file');
                        foreach($files as $file){
                            $uploaded_file_orig = $file->getClientOriginalName();
                            array_push($arr_uploaded_file, $uploaded_file_orig);
                            Storage::putFileAs('public/plc_evidences', $file,  $uploaded_file_orig);

                        }
                        // return $arr_uploaded_file;

                    // return $request->uploaded_file;

                    // get original file name
                    // $original_filename = $request->file('uploaded_file')->getClientOriginalName();

                    // return $original_filename;
                    $imploaded_arr_uploaded_file_orig = implode('/', $arr_uploaded_file);

                    // return $imploaded_arr_uploaded_file_orig;


                    PlcEvidences::insert([
                        'plc_category'   => $request->plc_category,
                        'plc_evidences'  => $imploaded_arr_uploaded_file_orig,
                        'date_uploaded' => $request->uploaded_date,
                        'uploaded_by'  => $request->name_of_uploader,
                        'status' => 0,
                        'logdel' => 0,
                        // 'updated_at' => date('Y-m-d H:i:s'),
                        'created_at' => date('Y-m-d H:i:s')
                    ]);

                    return response()->json(['result' => "1"]);
                }else{
                    return response()->json(['result' => "2"]);
                }
            }
            else{
                PlcEvidences::insert([
                    'plc_category'   => $request->plc_category,
                    'plc_evidences'  => 'No File Uploaded',
                    'date_uploaded' => $request->uploaded_date,
                    'uploaded_by'  => $request->name_of_uploader,
                    // 'status' => 0,
                    'logdel' => 0,
                    // 'updated_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s')
                ]);
                return response()->json(['result' => "0"]);
            }
        }
        else{
            return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
        }
    }

     //====================================== DOWNLOAD FILE ======================================
     public function download_plc_evidences(Request $request, $id){
        // $evidences = PlcEvidences::where('id', $id)->first();

        $file =  storage_path() . "/app/public/plc_evidences/" . $id;
        // $pattern = ('/[^A-Z-a-z-1-9\s+\,()_]/i');
        // $preg_pattern =  preg_replace($pattern);
        // return $id;
        return Response::download($file, $id);
    }

    //====================================== DOWNLOAD FILE ======================================
    // public function download_revised_plc_evidence(Request $request, $id){
    //     $evidences = PlcEvidences::where('id', $id)->first();

    //     $file =  storage_path() . "/app/public/revised_plc_evidences/" . $evidences->revised_plc_evidence;

    //     return Response::download($file, $evidences->revised_plc_evidence);
    // }

    //============================== GET USER BY ID TO EDIT ==============================
        public function  get_plc_evidences_id(Request $request){
            $plc_evidences = PlcEvidences::where('id', $request->plc_evidences_id)->get(); // get all users where id is equal to the user-id attribute of the dropdown-item of actions dropdown(Edit)
            // return $user[0]->rapidx_user_details->name;
            return response()->json(['plc_evidence' => $plc_evidences]);  // pass the $user(variable) to ajax as a response for retrieving and pass the values on the inputs
    }

    //============================== EDIT USER ==============================
    public function edit_plc_evidences(Request $request){
        date_default_timezone_set('Asia/Manila');

        // if($request->hasFile('edit_uploaded_file')){
            $data = $request->all(); // collect all input fields

            $edit_arr_uploaded_file = array();
            $edit_uploaded_file_orig = null;
            // if(isset($request->edit_uploaded_file)){
                if($request->hasFile('edit_uploaded_file')){
                if ($request->file('edit_uploaded_file')[0]->getClientMimeType() == 'application/pdf')
                {
                // get original file name
                // $original_filename1 = $request->file('edit_uploaded_file')->getClientOriginalName();
                // return $original_filename1;

                  $files = $request->file('edit_uploaded_file');
                        foreach($files as $file){
                            $edit_uploaded_file_orig = $file->getClientOriginalName();
                            array_push($edit_arr_uploaded_file, $edit_uploaded_file_orig);
                            Storage::putFileAs('public/plc_evidences', $file,  $edit_uploaded_file_orig);

                        }

                        // return $arr_uploaded_file;


                    // return $request->uploaded_file;

                    // get original file name
                    // $original_filename = $request->file('uploaded_file')->getClientOriginalName();

                    // return $original_filename;


                    $imploaded_arr_uploaded_file_orig_edit = implode('/', $edit_arr_uploaded_file);
                // Storage::putFileAs('public/plc_evidences', $request->edit_uploaded_file,  $original_filename1);
                PlcEvidences::where('id', $request->plc_evidence_id)
                ->update([
                    'revised_by'   => $request->revised_by,
                    'plc_evidences' => $imploaded_arr_uploaded_file_orig_edit,
                    'revised_date' => $request->revised_date,
                    'status' => $request->plc_evidence_status +1
                ]);
                return response()->json(['result' => "1"]);
            }else{
                return response()->json(['result' => "2"]);
            }

        }
    }



}








