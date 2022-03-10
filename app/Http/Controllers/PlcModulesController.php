<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\PLCModule;
use DataTables;
use App\RapidXUser;
use Carbon\Carbon;

class PlcModulesController extends Controller
    {
        public function view_plc_modules(Request $request)
        {
            $plc_module = PLCModule::where('category', $request->session)->where('logdel', 0)->get();

            return DataTables::of($plc_module)
            ->addColumn('action', function ($plc_module){
                $result = "";
                // if ($plc_module->logdel == 0) {
                    $result .= '<button class="btn btn-primary btn-sm  text-center actionEditRevisionHistory" revision_history-id="' . $plc_module->id . '" data-toggle="modal" data-target="#modalEditRevisionHistory" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Edit</button>&nbsp;';
                    $result .= '<button class="btn btn-danger btn-sm text-center actionDeleteHistory" revision_history-id="' . $plc_module->id . '"  data-toggle="modal" data-target="#modalDeleteHistory" data-keyboard="false"><i class ="fa fa-ban"></i>  Delete</button>';

                // } else {
                //     $result .= '<button class="btn btn-success btn-sm text-center actionActivateHistory" revision_history-id="' . $plc_module->id . '"  data-toggle="modal" data-target="#modalActivateHistory" data-keyboard="false"><i class ="fa fa-key">  Activate</button>';
                // }

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
            ->addColumn('reason_for_revision', function($plc_module){
                $result = "";
                $result .= $plc_module->reason_for_revision;

                return $result;

            })

                ->rawColumns(['action','revision_date','reason_for_revision'])
                ->make(true);

        }


            //===== ADD REVISION HISTORY FUNCTION ====//
        public function add_revision_history(Request $request)
        {
                date_default_timezone_set('Asia/Manila');
                session_start();

                $data = $request->all();

                // return $data;

                $validator = Validator::make($data, [
                'process_owner' => 'required',
                'revision_date' => 'required',
                'version_no' => 'required',
                'add_reason_for_revision' => 'required',
                'concerned_dept' => 'required',
                'add_details_of_revision' => 'required',
                'in_charge' => 'required'

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
                    // $reason_details_revision = implode(", ", $revision_details_array);



                        PLCModule::insert([
                                'category' => $request->category_name,
                                'process_owner' => $request->process_owner,
                                'revision_date' => $request->revision_date,
                                'version_no' =>    $request->version_no,
                                'reason_for_revision' => $request->add_reason_for_revision,
                                'concerned_dept' =>  $request->concerned_dept,
                                'details_of_revision' =>  $request->add_details_of_revision,
                                'in_charge' =>  $request->in_charge,
                                'logdel' => 0
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


                    PLCModule::where('id', $request->revision_history_id)
                    ->update([ // The update method expects an array of column and value pairs representing the columns that should be updated.
                        'process_owner' => $request->edit_revision_history_process_owner,
                        // 'revision_date' => $request->edit_revision_history_date,
                        // 'version_no' => $request->edit_revision_history_process_owner,
                        'reason_for_revision' => $request->edit_reason_for_revision,
                        'concerned_dept' => $request->edit_revision_history_concerned_dept,
                        'details_of_revision' => $request->edit_details_of_revision,
                        'in_charge' => $request->edit_revision_history_in_charge

                    ]);


                /*DB::commit();*/
                return response()->json(['result' => "1"]);

        }
    }

    //============================== DEACTIVATE PLC CATEGORY ==============================
    public function delete_revision_history(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        PLCModule::where('id', $request->delete_revision_history_id)
            ->update([
                'logdel' => 1,
                // 'status' => 1
            ]);

        return response()->json(['result' => "1"]);
    }
     //============================== ACTIVATE PLC CATEGORY ==============================
     public function activate_revision_history(Request $request)
     {
         date_default_timezone_set('Asia/Manila');
         session_start();

         $data = $request->all();

         PLCModule::where('id', $request->activate_history_id)
         ->update([
             'logdel' => 0
            //  'status' => 0
         ]);

         return response()->json(['result' => "1"]);
     }

     //========================================================




     public function go_to_plc_category_session(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        // $_SESSION['goto_id'] = $request->userApproverStat;
        // Session::put('goto_id', $request->userApproverStat);
        session(['goto_id' => $request->useSession]);

        return response()->json(['result' => 1]);
     }
}
