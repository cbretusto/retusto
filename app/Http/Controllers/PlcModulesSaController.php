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
use App\UserManagement;
use App\SelectPlcEvidence;
use Carbon\Carbon;

class PlcModulesSaController extends Controller
{

    public function view_plc_sa_data(Request $request){
        $plc_module_sa = PLCModuleSA::where('category', $request->session)->where('logdel', 0)->get();
        // return $plc_module_sa[0]->assessed_by;
        session_start();
        $rapidx_name = $_SESSION['rapidx_name'];
        // return $rapidx_name;
        return DataTables::of($plc_module_sa)

        ->addColumn('dic_assessment', function($plc_module_sa){
            $plc_sa_module = SelectPlcEvidence::where('assessment_details_and_findings', 1)->where('logdel', 0)->get();
            $category = "";
            $file =  "storage/app/public/plc_sa_attachment/" . $plc_module_sa->dic_attachment;
            // return $plc_sa_module;
            if (count($plc_sa_module) != 0){
                $category = $plc_sa_module[0]->assessment_details_and_findings;
                $result = "";
                $result .= "$plc_module_sa->dic_assessment";
                $result .= '<center>';
                $result .= '<br>';

                //Chan 03-25-2022
                //VIEW IMAGE START
                if($plc_module_sa->dic_attachment != null){
                    // $result .= '<a class="image" href="'. $file .'" target="_blank">View Attachment</a>';
                    $result .= '<a class="image" href="'. $file .'" target="_blank"><img src="' . $file . '" style="max-width: 200px; max-height: 150px; width: 200px; height: auto;"></a>';
                    $result .= '<br>';
                }else{
                }//VIEW IMAGE END

                $result .= '<br>';
                $result .= '<button class="btn btn-outline-dark btn-sm actionViewUploadedFile" button-id="'.$category.'" sa_data-id="' . $plc_module_sa->id . '" data-toggle="modal" data-target="#modalViewUploadedFile" data-keyboard="false"><i class="fa fa-eye"></i> View Reference Document</button>&nbsp;';
                $result .= '<br>';
                $result .= '<br>';
                $result .= '</center>';
            }else{
                $result = "";
                $result .= "$plc_module_sa->dic_assessment";
                $result .= '<center>';
                $result .= '<br>';

                //Chan 03-25-2022
                //VIEW IMAGE START
                if($plc_module_sa->dic_attachment != null){
                    // $result .= '<a class="image" href="'. $file .'" target="_blank">View Attachment</a>';
                    $result .= '<a class="image" href="'. $file .'" target="_blank"><img src="' . $file . '" style="max-width: 200px; max-height: 150px; width: 200px; height: auto;"></a>';
                    $result .= '<br>';
                }else{
                }//VIEW IMAGE END

                $result .= '<br>';
                $result .= '<button class="btn btn-outline-dark btn-sm actionViewUploadedFile" sa_data-id="' . $plc_module_sa->id . '" data-toggle="modal" data-target="#modalViewUploadedFile" data-keyboard="false"><i class="fa fa-eye"></i> View Reference Document</button>&nbsp;';
                $result .= '<br>';
                $result .= '<br>';
                $result .= '</center>';
            }
            return $result;
        })

        ->addColumn('oec_assessment', function($plc_module_sa){
            $plc_sa_module = SelectPlcEvidence::where('assessment_details_and_findings', 2)->where('logdel', 0)->get();
            $category = "";
            $file =  "storage/app/public/plc_sa_attachment/" . $plc_module_sa->oec_attachment;
            // return $plc_sa_module;
            if (count($plc_sa_module) != 0){
                $category = $plc_sa_module[0]->assessment_details_and_findings;
                $result = "";
                $result .= "$plc_module_sa->oec_assessment";
                $result .= '<center>';
                $result .= '<br>';

                //Chan 03-25-2022
                //VIEW IMAGE START
                if($plc_module_sa->oec_attachment != null){
                    // $result .= '<a class="image" href="'. $file .'" target="_blank">View Attachment</a>';
                    $result .= '<a class="image" href="'. $file .'" target="_blank"><img src="' . $file . '" style="max-width: 200px; max-height: 150px; width: 200px; height: auto;"></a>';
                    $result .= '<br>';
                }else{
                }//VIEW IMAGE END

                $result .= '<br>';
                $result .= '<button class="btn btn-outline-dark btn-sm actionViewUploadedFile" button-id="'.$category.'" sa_data-id="' . $plc_module_sa->id . '" data-toggle="modal" data-target="#modalViewUploadedFile" data-keyboard="false"><i class="fa fa-eye"></i> View Reference Document</button>&nbsp;';
                $result .= '<br>';
                $result .= '<br>';
                $result .= '</center>';
            }else{
            $result = "";
            $result .= "$plc_module_sa->oec_assessment";
            $result .= '<center>';
            $result .= '<br>';

             //Chan 03-25-2022
            //VIEW IMAGE START
            if($plc_module_sa->oec_attachment != null){
                // $result .= '<a class="image" href="'. $file .'" target="_blank">View Attachment</a>';
                $result .= '<a class="image" href="'. $file .'" target="_blank"><img src="' . $file . '" style="max-width: 200px; max-height: 150px; width: 200px; height: auto;"></a>';
                $result .= '<br>';
            }else{
            }//VIEW IMAGE END

            $result .= '<br>';
            $result .= '<button class="btn btn-outline-dark btn-sm actionViewUploadedFile" sa_data-id="' . $plc_module_sa->id . '" data-toggle="modal" data-target="#modalViewUploadedFile" data-keyboard="false"><i class="fa fa-eye"></i> View Reference Document</button>&nbsp;';
            $result .= '<br>';
            $result .= '<br>';
            $result .= '</center>';
            }
            return $result;
        })

        ->addColumn('rf_assessment', function($plc_module_sa){
            $plc_sa_module = SelectPlcEvidence::where('assessment_details_and_findings', 3)->where('logdel', 0)->get();
            $category = "";
            $file =  "storage/app/public/plc_sa_attachment/" . $plc_module_sa->rf_attachment;
            // return $plc_sa_module;
            if (count($plc_sa_module) != 0){
            $category = $plc_sa_module[0]->assessment_details_and_findings;
            $result = "";
            $result .= "$plc_module_sa->rf_assessment";
            $result .= '<center>';
            $result .= '<br>';

            //Chan 03-25-2022
            //VIEW IMAGE START
            if($plc_module_sa->rf_attachment != null){
                // $result .= '<a class="image" href="'. $file .'" target="_blank">View Attachment</a>';
                $result .= '<a class="image" href="'. $file .'" target="_blank"><img src="' . $file . '" style="max-width: 200px; max-height: 150px; width: 200px; height: auto;"></a>';
                $result .= '<br>';
            }else{
            }//VIEW IMAGE END

            $result .= '<br>';
            $result .= '<button class="btn btn-outline-dark btn-sm actionViewUploadedFile" button-id="'.$category.'" sa_data-id="' . $plc_module_sa->id . '" data-toggle="modal" data-target="#modalViewUploadedFile" data-keyboard="false"><i class="fa fa-eye"></i> View Reference Document</button>&nbsp;';
            $result .= '<br>';
            $result .= '<br>';
            $result .= '</center>';
            }else {
                $result = "";
                $result .= "$plc_module_sa->rf_assessment";
                $result .= '<center>';
                $result .= '<br>';

            //Chan 03-25-2022
            //VIEW IMAGE START
            if($plc_module_sa->rf_attachment != null){
                // $result .= '<a class="image" href="'. $file .'" target="_blank">View Attachment</a>';
                $result .= '<a class="image" href="'. $file .'" target="_blank"><img src="' . $file . '" style="max-width: 200px; max-height: 150px; width: 200px; height: auto;"></a>';
                $result .= '<br>';
            }else{
            }//VIEW IMAGE END

            $result .= '<br>';
            $result .= '<button class="btn btn-outline-dark btn-sm actionViewUploadedFile" sa_data-id="' . $plc_module_sa->id . '" data-toggle="modal" data-target="#modalViewUploadedFile" data-keyboard="false"><i class="fa fa-eye"></i> View Reference Document</button>&nbsp;';
            $result .= '</center>';
            $result .= '<br>';
            $result .= '<br>';
        }
            return $result;
        })

        ->addColumn('fu_assessment', function($plc_module_sa){
            $plc_sa_module = SelectPlcEvidence::where('assessment_details_and_findings', 4)->where('logdel', 0)->get();
            $category = "";
            $file =  "storage/app/public/plc_sa_attachment/" . $plc_module_sa->fu_attachment;
            // return $plc_sa_module;
            if (count($plc_sa_module) != 0){
            $category = $plc_sa_module[0]->assessment_details_and_findings;
            $result = "";
            $result .= "$plc_module_sa->fu_assessment";
            $result .= '<center>';
            $result .= '<br>';

            //Chan 03-25-2022
            //VIEW IMAGE START
            if($plc_module_sa->fu_attachment != null){
                // $result .= '<a class="image" href="'. $file .'" target="_blank">View Attachment</a>';
                $result .= '<a class="image" href="'. $file .'" target="_blank"><img src="' . $file . '" style="max-width: 200px; max-height: 150px; width: 200px; height: auto;"></a>';
                $result .= '<br>';
            }else{
            }//VIEW IMAGE END

            $result .= '<br>';
            $result .= '<button class="btn btn-outline-dark btn-sm actionViewUploadedFile" button-id="'.$category.'" sa_data-id="' . $plc_module_sa->id . '" data-toggle="modal" data-target="#modalViewUploadedFile" data-keyboard="false"><i class="fa fa-eye"></i> View Reference Document</button>&nbsp;';
            $result .= '<br>';
            $result .= '<br>';
            $result .= '</center>';
            }else{
                $result = "";
                $result .= "$plc_module_sa->fu_assessment";
                $result .= '<center>';
                $result .= '<br>';

                //Chan 03-25-2022
                //VIEW IMAGE START
                if($plc_module_sa->fu_attachment != null){
                    // $result .= '<a class="image" href="'. $file .'" target="_blank">View Attachment</a>';
                    $result .= '<a class="image" href="'. $file .'" target="_blank"><img src="' . $file . '" style="max-width: 200px; max-height: 150px; width: 200px; height: auto;"></a>';
                    $result .= '<br>';
                }else{
                }//VIEW IMAGE END

                $result .= '<br>';
                $result .= '<button class="btn btn-outline-dark btn-sm actionViewUploadedFile" sa_data-id="' . $plc_module_sa->id . '" data-toggle="modal" data-target="#modalViewUploadedFile" data-keyboard="false"><i class="fa fa-eye"></i> View Reference Document</button>&nbsp;';
                $result .= '<br>';
                $result .= '<br>';
                $result .= '</center>';
            }
            return $result;
        })

        ->addColumn('approval_status', function($plc_module_sa) {
			$result = "";
			$result .= '<center>';
                if($plc_module_sa->approver_status == 0){
                    if($plc_module_sa->assessed_by == null){
                        $result .= '<span class="badge badge badge-info mt-5 nowrap">For Update</span>';
                    }else{
                        $result .= '<span class="badge badge badge-warning mt-5 nowrap">For Appproval <br> -Jr. Auditor</span>';
                    }
                }
                else if($plc_module_sa->approver_status == 1){
                    $result .= '<span class="badge badge badge-warning mt-5 nowrap">For Approval <br> -IAS Manager</span>';
                }
                else if($plc_module_sa->approver_status == 2){
                    $result .= '<span class="badge badge badge-success mt-5 nowrap"><strong>(First Half) <br> Approved</strong></span>';
                    $result .= '<span class="badge badge badge-warning mt-5 nowrap"><strong>(Second Half) <br> For Approval <br> -Jr Auditor</br></strong></span>';
                }
                else if($plc_module_sa->approver_status == 3){
                    $result .= '<span class="badge badge badge-success mt-5 nowrap"><strong>(First Half) <br> Approved</strong></span>';
                    $result .= '<span class="badge badge badge-warning mt-5 nowrap"><strong>(Second Half) <br> For Approval <br> -IAS Manager</br></strong></span>';
                }
                else if($plc_module_sa->approver_status == 4){
                    $result .= '<span class="badge badge badge-success mt-5 nowrap"><strong>(First Half) <br> Approved</strong></span>';
                    $result .= '<span class="badge badge badge-success mt-5 nowrap"><strong>(Second Half) <br> Approved</strong></span>';
                }
			$result .= '</center>';
			return $result;
		})

        ->addColumn('action', function ($plc_module_sa) use ($rapidx_name){
            $result = "";
            $result = '<center>';
            $result .= '<br>';
            $result .= '<button type="button" class="btn btn-primary btn-sm text-center actionEditSaData"  style="width:85px;margin:2%;" sa_data-id="' . $plc_module_sa->id . '" data-toggle="modal" data-target="#modalEditSaData" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Edit </button>';
            $result .= '<br>';
            // $result .= '<button type="button" class="btn btn-danger btn-sm text-center actionDeleteSaData" style="width:85px;margin:2%;" sa_data-id="' . $plc_module_sa->id . '"  data-toggle="modal" data-target="#modalDeleteSaData" data-keyboard="false"><i class="nav-icon fas fa-ban">&nbsp;</i>Delete</button>&nbsp;';
            // $result .= '<br>';
            $result .= '<button type="button" class="btn btn-dark btn-sm text-center actionYecApprovedDate" style="width:85px;margin:2%;" sa_data-id="' . $plc_module_sa->id . '"  data-toggle="modal" data-target="#modalYecApprovedDate" data-keyboard="false"><i class="far fa-calendar-check">&nbsp;</i>Date</button>&nbsp;';
            $result .= '<br>';

            switch ($plc_module_sa->approver_status)
            {
                case 0:
                {
                    if($plc_module_sa->assessed_by == $rapidx_name){
                        // $result .= '<button type="button" class="btn btn-outline-success btn-sm fa fa-thumbs-up text-center actionApproveSaData" style="width:85px;margin:2%; font-size: 70%;" sa_data-id="' . $plc_module_sa->id  . '" status="1" data-toggle="modal" data-target="#modalApproveSaData" data-keyboard="false">  Approve</button>';
                        $result .= '<button type="button" class="btn btn-success btn-sm fa fa-thumbs-up text-center actionApproveSaData" style="width:95px;margin:2%; font-size: 80%;" sa_data-id="' . $plc_module_sa->id  . '" status="1" data-toggle="modal" data-target="#modalApproveSaData" data-keyboard="false">  Approve</button>';
                    }else{

                    }
                    break;
                }

                case 1:
                {
                    if($plc_module_sa->checked_by == $rapidx_name){
                        $result .= '<button type="button" class="btn btn-success btn-sm fa fa-thumbs-up text-center px-3 mb-1 actionApproveSaData" sa_data-id="' . $plc_module_sa->id  . '" status="2" data-toggle="modal" data-target="#modalApproveSaData" data-keyboard="false"> Approve</button>';
                        $result .= '<br>';
                        $result .= '<button type="button" class="btn btn-danger btn-sm fa fa-thumbs-down text-center actionDisapproveSaData" sa_data-id="' . $plc_module_sa->id  . '" status="0" data-toggle="modal" data-target="#modalDisapproveSaData" data-keyboard="false"> Disapprove</button>';
                    }
                    break;
                }

                case 2:
                {
                    if($plc_module_sa->second_half_assessed_by == $rapidx_name){
                        $result .= '<button type="button" class="btn btn-success btn-sm fa fa-thumbs-up text-center px-3 mb-1 actionApproveSaData" sa_data-id="' . $plc_module_sa->id  . '" status="3" data-toggle="modal" data-target="#modalApproveSaData" data-keyboard="false"> Approve</button>';
                    }
                    break;
                }

                case 3:
                {
                    if($plc_module_sa->second_half_checked_by == $rapidx_name){
                        $result .= '<button type="button" class="btn btn-success btn-sm fa fa-thumbs-up text-center px-3 mb-1 actionApproveSaData" sa_data-id="' . $plc_module_sa->id  . '" status="4" data-toggle="modal" data-target="#modalApproveSaData" data-keyboard="false"> Approve</button>';
                        $result .= '<br>';
                        $result .= '<button type="button" class="btn btn-danger btn-sm fa fa-thumbs-down text-center actionDisapproveSaData" sa_data-id="' . $plc_module_sa->id  . '" status="2" data-toggle="modal" data-target="#modalDisapproveSaData" data-keyboard="false"> Disapprove</button>';
                    }
                    break;
                }
            }

            $result .= '</center>';
            return $result;



                // $result .= '<button class="m-r-15 text-muted btn actionGetRcmData" sa_module-id="' . $plc_module_sa->id . '" data-toggle="modal" data-target="#modalViewRcmData" data-keyboard="false"><i class="fa fa-eye" style="color: #40E0D0;"></i> </button>&nbsp;';
                // $result .= '<br>';
                // $result .= '<button class="btn btn-primary btn-sm  text-center actionEditSaData" sa_data-id="' . $plc_module_sa->id . '" data-toggle="modal" data-target="#modalEditSaData" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Edit</button>&nbsp;';
                // $result .= '<br>';
                // $result .= '<button class="btn btn-danger btn-sm text-center actionDeleteSaData" sa_data-id="' . $plc_module_sa->id . '"  data-toggle="modal" data-target="#modalDeleteSaData" data-keyboard="false"><i class ="nav-icon fa fa-ban"></i>  Delete</button>&nbsp;';
        })
        ->addColumn('dic_status', function($plc_module_sa){
            $result = "";
            $result = "<center>";

            $result .= $plc_module_sa->dic_status;


            $result .= '</center>';
            return $result;

        })
            ->rawColumns(['action', 'dic_assessment','oec_assessment', 'rf_assessment', 'fu_assessment', 'dic_status', 'approval_status'])
            ->make(true);
    }

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
            // 'control_no'        => 'required|string|max:255',
            // 'internal_control'  => 'required|string|max:555',
            // 'dic_assessment'    => 'required|string|max:555',
            // 'dic_status'        => 'required|string|max:555',
            // 'oec_assessment'    => 'required|string|max:555',
            // 'oec_status'        => 'required|string|max:555',
            // 'rf_improvement'    => 'required|string|max:555',
            // 'rf_assessment'     => 'required|string|max:555',
            // 'rf_status'         => 'required|string|max:555',

            // 'dic_attachment'    => 'required|string|max:555',
            // 'oec_attachment'    => 'required|string|max:555',
            // 'rf_attachment'     => 'required|string|max:555',
            // 'fu_attachment'     => 'required|string|max:555',
        ];

        $validator = Validator::make($data, $rules);
        if($validator->passes()){
            $original_filename = $request->dic_attachment;
            if ($original_filename != null){
                $dic_original_filename = $request->file('dic_attachment')->getClientOriginalName();
                $dic = $dic_original_filename;
                Storage::putFileAs('public/plc_sa_attachment', $request->dic_attachment, $dic_original_filename);
            }else{
                $dic = null;
            }

            $original_filename1 = $request->oec_attachment;
            if ($original_filename1 != null){
                $oec_original_filename = $request->file('oec_attachment')->getClientOriginalName();
                $oec = $oec_original_filename;
                Storage::putFileAs('public/plc_sa_attachment', $request->oec_attachment, $oec_original_filename);
            }else{
                $oec = null;
            }

            $original_filename2 = $request->rf_attachment;
            if ($original_filename2 != null){
                $rf_original_filename = $request->file('rf_attachment')->getClientOriginalName();
                $rf = $oec_original_filename;
                Storage::putFileAs('public/plc_sa_attachment', $request->rf_attachment, $rf_original_filename);
            }else{
                $rf = null;
            }

            $original_filename3 = $request->fu_attachment;
            if ($original_filename3 != null){
                $fu_original_filename = $request->file('fu_attachment')->getClientOriginalName();
                $fu = $fu_original_filename;
                Storage::putFileAs('public/plc_sa_attachment', $request->fu_attachment, $fu_original_filename);
            }else{
                $fu = null;
            }
            PLCModuleSA::where('id', $request->sa_data_id)
            ->update([
                'category'                  => $request->category_name,
                'fiscal_year'               => $request->fiscal_year,
                'assessed_by'               => $request->assesed_by_rapidx_name,
                'checked_by'                => $request->checked_by,
                'dic_assessment'            => $request->dic_assessment,
                'dic_attachment'            => $dic,
                // 'dic_attachment'            => $request->txt_dic_attachment,
                'dic_status'                => $request->dic_status,
                'oec_assessment'            => $request->oec_assessment,
                'oec_attachment'            => $oec,
                'oec_status'                => $request->oec_status,
                'second_half_assessed_by'   => $request->second_half_assesed_by_rapidx_name,
                'second_half_checked_by'    => $request->checked_by,
                'rf_improvement'            => $request->rf_improvement,
                'rf_assessment'             => $request->rf_assessment,
                'rf_attachment'             => $rf,
                'rf_status'                 => $request->rf_status,
                'fu_improvement'            => $request->fu_improvement,
                'fu_assessment'             => $request->fu_assessment,
                'fu_attachment'             => $fu,
                'fu_status'                 => $request->fu_status,
                'concerned_dept'            => $request->concerned_dept,
                'non_key_control'           => $request->edit_non_key_control,
                'updated_at'                => date('Y-m-d H:i:s')
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

    //============================== GET USERS ==============================
    public function load_user_management_SA(Request $request){
        $users = UserManagement::where('user_level_id', 2)->get();
        // return $users;
        return response()->json(['users' => $users]);
    }

    //============================== GET USERS ==============================
    public function load_user_SA(Request $request){
        $users = UserManagement::where('user_level_id', 1)->get();
        // return $users;
        return response()->json(['users' => $users]);
    }

    // ================== APPROVE BUTTON==================
    public function approved_sa_data(Request $request){
        date_default_timezone_set('Asia/Manila');

        $data = $request->all(); // collect all input fields
        $data1 = PLCModuleSA::where('id', $request->sa_data_id)
            ->update([
                'approver_status' => $request->status,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return response()->json(['result' => 1]);
    }

    // ================== APPROVE BUTTON==================
    public function disapproved_sa_data(Request $request){
        date_default_timezone_set('Asia/Manila');

        $data = $request->all(); // collect all input fields
        $data1 = PLCModuleSA::where('id', $request->sa_data_id)
            ->update([
                'approver_status' => $request->status,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return response()->json(['result' => 1]);
    }

    //============================== YEC APPROVED DATE ==============================
    public function yec_approved_date(Request $request){
        date_default_timezone_set('Asia/Manila');

        $data = $request->all(); // collect all input fields

        $validator = Validator::make($data, [
            'yec_approved_date_id' => 'required',
        ]);

        if($validator->passes()){
            PLCModuleSA::where('id', $request->yec_approved_date_id)
            ->update(['yec_approved_date' => $request->yec_approved_date]);

            return response()->json(['result' => "1"]);
        }else{
            return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
        }
    }

    //============================== GET YEC APPROVED DATE ==============================
    public function get_yec_approved_date(Request $request){
        $yec_approved_date =  PLCModuleSA::where('id', $request->yec_approved_date_id)->get();
        return response()->json(['yec_approved_date' => $yec_approved_date]);
    }

}
