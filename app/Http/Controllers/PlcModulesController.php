<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use DataTables;
use Carbon\Carbon;

use App\PLCModule;
use App\PLCModuleFlowChart;
use App\RapidXUser;
use App\RapidXDepartment;
use App\UserManagement;

class PlcModulesController extends Controller
    {
        public function view_plc_modules(Request $request)
        {
            $plc_module = PLCModule::with([
                'rapidx_user_details',
                'rapidx_user_details1'
                ])
            ->where('category', $request->session)->where('logdel', 0) ->orderBy('id', 'desc')->get();

            // return $plc_module;

            return DataTables::of($plc_module)

            ->addColumn('status', function($user){
                $result = "<center>";
                if($user->status == 1){
                    $result .= '<span class="badge badge-pill badge-success">Active</span>';
                }
                else{
                    $result .= '<span class="badge badge-pill badge-danger">Inactive</span>';
                }
                    $result .= '</center>';
                    return $result;
            })

            ->addColumn('action', function ($plc_module){
                $result = "";
                $result = "<center>";
                if ($plc_module->status == 1) {
                    $result .= '<button type="button" class="btn btn-primary btn-sm text-center actionEditRevisionHistory" style="width:105px;margin:2%;" revision_history-id="' . $plc_module->id . '" data-toggle="modal" data-target="#modalEditRevisionHistory" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Edit</button>&nbsp;';
                    $result .= '<button type="button" class="btn btn-danger btn-sm text-center actionChangePlcRevisionHistoryStat" style="width:105px;margin:2%;" revision_history-id="' . $plc_module->id . '" status="2" data-toggle="modal" data-target="#modalChangePlcRevisionHistoryStat" data-keyboard="false"><i class="nav-icon fas fa-ban"></i> Deactivate</button>&nbsp;';
                } else {
                    $result .= '<button type="button" class="btn btn-success btn-sm text-center actionChangePlcRevisionHistoryStat" style="width:105px;margin:2%;" revision_history-id="' . $plc_module->id . '" status="1" data-toggle="modal" data-target="#modalChangePlcRevisionHistoryStat" data-keyboard="false"><i class ="fa fa-key">  Activate</button>';
                }
                $result .= '</center>';

                return $result;
            })

            ->addColumn('revision_date', function($plc_module){
                $result = "";
                $date =$plc_module->revision_date;
                $process_owner = $plc_module->process_owner;

                if($process_owner != NULL){
                    $result .= Carbon::parse($date)->format('M d, Y');
                }else{
                    $result = $date;
                }
            //    $result = Carbon::$date->format('M. d, Y');

            return $result;

            })

            ->addColumn('version_no', function($plc_module){
                $result = "";
                $result = "<center>";

                $result .= $plc_module->version_no;


                $result .= '</center>';
                return $result;

            })

            ->addColumn('reason_for_revision', function($plc_module){
                $result = "";
                $result .= $plc_module->reason_for_revision;

                return $result;

            })

            ->addColumn('concerned_dept', function($plc_module){
                $result = "";
                $result = "<center>";

                $result .= $plc_module->concerned_dept;


                $result .= '</center>';
                return $result;

            })

                ->rawColumns(['status', 'action','revision_date','reason_for_revision','version_no','concerned_dept'])
                ->make(true);

        }


            //===== ADD REVISION HISTORY FUNCTION ====//
        public function add_revision_history(Request $request)
        {
            date_default_timezone_set('Asia/Manila');
            session_start();

            $data = $request->all();

            // return $data;
            // return $request->process_owner;


            $validator = Validator::make($data, [
            'process_owner' => 'required',
            'revision_date' => 'required',
            'version_no' => 'required',
            'add_reason_for_revision' => 'required',
            'concerned_dept' => 'required',
            'add_details_of_revision' => 'required',
            'process_in_charge' => 'required'

            ]);

            if ($validator->fails())
            {
                return response()->json(['validation' => 'hasError', 'error' => $validator->messages()]);
            }
            else{
                // $revision_array = array();
                // $add_revision = "reason_for_revision_";

                // for ($index=1; $index <= $request->txt_max_row_reason; $index++) {
                //     if($request->txt_max_row_reason >= 1){
                //         $revision_data = $add_revision.$index;

                //         $rules["reason_for_revision_$index"] = ['required'];

                //         $revision_array[] = $request->$revision_data;

                //     }
                //     else{
                //         $rules["reason_for_revision_$index"] = [''];

                //     }

                // }
                // $reason_revision = implode(", ", $revision_array);
                    // return $reason_revision;


                // $revision_details_array = array();
                // $add_revision_details = "details_of_revision_";

                // for ($index=1; $index <= $request->txt_max_row_reason_details; $index++) {
                //     if($request->txt_max_row_reason_details >= 1){
                //         $revision_details_data = $add_revision_details.$index;

                //         $rules["details_of_revision_$index"] = ['required'];

                //         $revision_details_array[] = $request->$revision_details_data;

                //     }
                //     else{
                //         $rules["details_of_revision_$index"] = [''];

                //     }

                // }
                $add_revision_process_owner = implode(" / ", $request->process_owner);
                $add_concerned_department = implode(" / ", $request->concerned_dept);
                // return $add_revision_process_owner;
                $get_rev_history_id = PLCModule::insertGetId([
                    'category' => $request->category_name,
                    'process_owner' => $add_revision_process_owner,
                    'revision_date' => $request->revision_date,
                    'version_no' =>    $request->version_no,
                    'reason_for_revision' => $request->add_reason_for_revision,
                    'concerned_dept' =>  $add_concerned_department,
                    'details_of_revision' =>  $request->add_details_of_revision,
                    'in_charge' =>  $request->process_in_charge,
                    'logdel' => 0,
                ]);
                
                // $get_rev_history_id = PLCModule::where('id', $request->id)->get();

                // $get_id_to_flow_chart_id = $get_rev_history_id[0]->id;
                // return $get_id_to_flow_chart_id;

                PLCModuleFlowChart::insert([
                    'rev_history_id'    => $get_rev_history_id,
                    'category'          => $request->category_name,
                    'process_owner'     => $add_revision_process_owner,
                    'revision_date'     => $request->revision_date,
                    'version_no'        => $request->version_no,
                ]);

                    return response()->json(['result' => "1"]);
            }
        }
        //===== ADD REVISION HISTORY FUNCTION END ====//


        //=====NO REVISION HISTORY FUNCTION ====//
        public function no_revision_history(Request $request)
        {
            date_default_timezone_set('Asia/Manila');
            session_start();

            $data = $request->all();

            $validator = Validator::make($data, [

            ]);

            if ($validator->fails())
            {
                return response()->json(['validation' => 'hasError', 'error' => $validator->messages()]);
            } else
                {

                    PLCModule::insert([

                            'revision_date' => $request->no_revision,
                            'category' => $request->category_name,
                            'logdel' => 0
                        ]);

                    return response()->json(['result' => "1"]);


                }
        }
        //=====NO REVISION HISTORY FUNCTION END ====//

             //============================== GET PLC CATEGORY BY ID TO EDIT ==============================
    public function get_revision_history_id_to_edit(Request $request){
        $revision_history = PLCModule::where('id', $request->revision_history_id)->get(); // get all users where id is equal to the user-id attribute of the dropdown-item of actions dropdown(Edit)
        // return $user[0]->rapidx_user_details->name;
        // $test = array();

        $explodeReasonForRevision = explode (', ', $revision_history[0]->reason_for_revision);
        $explodeDetailsForRevision = explode (', ', $revision_history[0]->details_of_revision);
        // $test = $revision_history[0]->reason_for_revision;

        // print_r($explodeDetailsForRevision);

        return response()->json(['revision_history' => $revision_history, 'explodeReasonForRevision' => $explodeReasonForRevision, 'explodeReasonForDetailsRevision' => $explodeDetailsForRevision ]);  // pass the $user(variable) to ajax as a response for retrieving and pass the values on the inputs
    }

     //============================== EDIT REVISION HISTORY ==============================
     public function edit_revision_history(Request $request){
        date_default_timezone_set('Asia/Manila');

        $data = $request->all(); // collect all input fields

        $validator = Validator::make($data, [
            // 'edit_plc_category' => 'required|string|max:255'

        ]);

        if($validator->fails()) {
            return response()->json(['validation' => 'hasError', 'error' => $validator->messages()]);
        }
        else{
            // $edit_revision_array = array();

            // for ($index=0; $index < $request->txt_max_row_reason; $index++) {
            //     if($request->txt_max_row_reason > 0 ){

            //         // $revision_data = $edit_revision.$index;
            //         // return $request->reasonIndex;

            //         $edit_revision_reason = $request->input("edit_revision_history_reason_$index");

            //         $rules["edit_revision_history_reason_$index"] = ['required'];

            //         array_push($edit_revision_array, $edit_revision_reason);

            //     }
            //     else{
            //         $rules["edit_revision_history_reason_$index"] = [''];

            //     }

            // }
            // $edit_reason_revision = implode(", ", $edit_revision_array);
            // //  return $reason_revision;

            // $edit_revision_details_array = array();

            // for ($index=0; $index < $request->txt_max_row_reason; $index++) {
            //     if($request->txt_max_row_reason > 0 ){

            //         // $revision_data = $edit_revision.$index;
            //         // return $request->reasonIndex;

            //         $edit_revision_details = $request->input("edit_revision_history_details_$index");

            //         $rules["edit_revision_history_details_$index"] = ['required'];

            //         array_push($edit_revision_details_array, $edit_revision_details);

            //     }
            //     else{
            //         $rules["edit_revision_history_details_$index"] = [''];

            //     }

            // }
            // $edit_reason_details = implode(", ", $edit_revision_details_array);
            // //  return $reason_revision;

            $edit_revision_process_owner = implode(" / ", $request->edit_revision_history_process_owner);
            $edit_revision_history_concerned_department = implode(" / ", $request->edit_revision_history_concerned_dept);
            PLCModule::where('id', $request->revision_history_id)
            ->update([ // The update method expects an array of column and value pairs representing the columns that should be updated.
                'process_owner' => $edit_revision_process_owner,
                'revision_date' => $request->edit_revision_history_date,
                'version_no' =>    $request->edit_version_no,
                'reason_for_revision' => $request->edit_reason_for_revision,
                'concerned_dept' => $edit_revision_history_concerned_department,
                'details_of_revision' => $request->edit_details_of_revision,
                'in_charge' => $request->edit_revision_history_in_charge
            ]);

            if(PLCModuleFlowChart::where('rev_history_id', $request->revision_history_id)->exists()){
                PLCModuleFlowChart::where('rev_history_id', $request->revision_history_id)
                ->update([
                    'process_owner' => $edit_revision_process_owner,
                ]);    
            }else{
                PLCModuleFlowChart::insert([
                    'category'      => $request->category_name,
                    'process_owner' => $edit_revision_process_owner,
                    'revision_date' => $request->edit_revision_history_date,
                    'version_no'    => $request->edit_version_no,    

                ]);
            }    

            /*DB::commit();*/
            return response()->json(['result' => "1"]);

        }
    }

    // //============================== DEACTIVATE PLC CATEGORY ==============================
    // public function deactivate_revision_history(Request $request)
    // {
    //     date_default_timezone_set('Asia/Manila');
    //     session_start();

    //     $data = $request->all();

    //     PLCModule::where('id', $request->deactivate_revision_history_id)
    //         ->update([
    //             // 'logdel' => 1,
    //             'status' => 2
    //         ]);

    //     return response()->json(['result' => "1"]);
    // }
    //  //============================== ACTIVATE PLC CATEGORY ==============================
    //  public function activate_revision_history(Request $request)
    //  {
    //      date_default_timezone_set('Asia/Manila');
    //      session_start();

    //      $data = $request->all();

    //      PLCModule::where('id', $request->activate_history_id)
    //      ->update([
    //         //  'logdel' => 0
    //          'status' => 1
    //      ]);

    //      return response()->json(['result' => "1"]);
    //  }

    //============================== CHANGE PMI CLC STAT ==============================
    public function change_plc_revision_history_stat(Request $request){        
    date_default_timezone_set('Asia/Manila');

    $data = $request->all(); // collect all input fields

    $validator = Validator::make($data, [
        'plc_revision_history_id' => 'required',
        'status' => 'required',
    ]);

    if($validator->passes()){
        PLCModule::where('id', $request->plc_revision_history_id)
        ->update([
            'status' => $request->status,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        // PLCModuleFlowChart::where('rev_history_id', $request->revision_history_id)
        // ->update([
        //     'flow_chart_status' => $request->flow_chart_status,
        //     'updated_at' => date('Y-m-d H:i:s'),
        // ]);

        PLCModuleFlowChart::where('id', $request->plc_revision_history_id)
        ->update([
            'flow_chart_status' => $request->status,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        return response()->json(['result' => "1"]);
    }
    else{
        return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
    }
}



    public function go_to_plc_category_session(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();
        // return $request->useSession;
        session(['pmi_plc_category_id' => $request->useSession]);

        return response()->json(['result' => 1]);
    }

    public function load_user_management_rev(Request $request){
        // $users = RapidXUser::where('user_stat', 1)->orderBy('name','asc')->whereNotIn('name',['Admin','Test QAD Admin Approver'])->get();
        $users = UserManagement::where('user_level_id', 2)->get();
        // return $users;
        return response()->json(['users' => $users]);
    }

    public function load_user_management_process_owner(Request $request){
        // $users = RapidXUser::where('user_stat', 1)->orderBy('name','asc')->whereNotIn('name',['Admin','Test QAD Admin Approver'])->get();
        $users = UserManagement::where('logdel', 0)->where('user_level_id', 2)->orWhere('user_level_id', 3)->get();
        // return $users;
        return response()->json(['users' => $users]);
    }

    public function load_concerned_department(Request $request){
        // $users = RapidXUser::where('user_stat', 1)->orderBy('name','asc')->whereNotIn('name',['Admin','Test QAD Admin Approver'])->get();
        $users_department = RapidXDepartment::all();

        // return $users_department;

        // $users = UserManagement::where('user_level_id', 2)->get();
        return response()->json(['users_department' => $users_department]);
    }

}
