<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\PLCModuleRCM;
use DataTables;
use App\RapidXUser;
use App\PLCModuleSA;
use Carbon\Carbon;

class PlcModulesRcmController extends Controller
{
    public function view_plc_modules_rcm(Request $request)
        {
            $plc_module_rcm = PLCModuleRCM::where('category', $request->session)
            ->where('logdel', 0)
            ->get();

            return DataTables::of($plc_module_rcm)
            ->addColumn('action', function ($plc_module_rcm){
                $result = "";

                    $result .= '<button class="m-r-15 text-muted btn actionGetRcmData" rcm_data-id="' . $plc_module_rcm->id . '" data-toggle="modal" data-target="#modalViewRcmData" data-keyboard="false"><i class="fa fa-eye" style="color: #40E0D0;"></i> </button>&nbsp;';
                    $result .= '<br>';

                    $result .= '<button class="btn btn-primary btn-sm  text-center actionEditRcmData" rcm_data-id="' . $plc_module_rcm->id . '" data-toggle="modal" data-target="#modalEditRcmData" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Edit</button>&nbsp;';
                    $result .= '<br>';
                    // $result .= '<br>';
                    $result .= '<button class="btn btn-danger btn-sm text-center actionDeleteRcmData" rcm_data-id="' . $plc_module_rcm->id . '"  data-toggle="modal" data-target="#modalDeleteRcmData" data-keyboard="false"><i class ="nav-icon fa fa-ban"></i>  Delete</button>&nbsp;';

                    return $result;
            })


                ->rawColumns(['action'])
                ->make(true);

        }

        public function go_to_plc_category_session(Request $request){
            date_default_timezone_set('Asia/Manila');
            session_start();
            // $token = $request->session()->token();

            // $token = csrf_token();

            // $_SESSION['goto_id'] = $request->userApproverStat;
            // Session::put('goto_id', $request->userApproverStat);
            session(['goto_id' => $request->useSession]);

            return response()->json(['result' => 1]);
        }

            //===== ADD RCM DATA FUNCTION ====//
        public function add_rcm_data(Request $request)
        {
                date_default_timezone_set('Asia/Manila');
                session_start();

                $data = $request->all();

                // return $data;

                $validator = Validator::make($data, [
                // 'control_objective' => 'required',
                // 'risk_summary' => 'required',
                // 'risk_detail' => 'required',
                // 'control_id' => 'required',
                // 'internal_control' => 'required',
                // 'system' => 'required'

                ]);

                if ($validator->fails())
                {
                    return response()->json(['validation' => 'hasError', 'error' => $validator->messages()]);
                }
                else{

                    PLCModuleRCM::insert([
                        'category'          => $request->category_name,
                        'control_objective' => $request->add_control_objective,
                        'risk_summary'      => $request->add_risk_summary,
                        'risk_detail'       => $request->add_risk_detail,
                        'debit'             => $request->add_debit,
                        'credit'            => $request->add_credit,
                        'validity'          => $request->add_validity,
                        'completeness'      => $request->add_completeness,
                        'accuracy'          => $request->add_accuracy,
                        'cut_off'           => $request->add_cutoff,
                        'valuation'         => $request->add_valuation,
                        'presentation'      => $request->add_presentation,
                        'key_control'       => $request->add_key_control,
                        'it_control'        => $request->add_it_control,
                        'control_id'        => $request->add_control_id,
                        'internal_control'  => $request->add_internal_control,
                        'preventive'        => $request->add_preventive,
                        'defective'         => $request->add_defective,
                        'manual'            => $request->add_manual,
                        'automatic'         => $request->add_automatic,
                        'system'            => $request->add_system,
                        'logdel'            => 0,
                    ]);

                    PLCModuleSA::insert([
                        'category'          => $request->category_name,
                        'control_no'        => $request->add_control_id,
                        'internal_control'  => $request->add_internal_control,
                    ]);
                    return response()->json(['result' => "1"]);
                }

        }
        //===== ADD RCM DATA FUNCTION END ====//

        public function get_rcm_data_id_to_edit(Request $request){
            $rcm_data = PLCModuleRCM::where('id', $request->rcm_data_id)->get(); // get all users where id is equal to the user-id attribute of the dropdown-item of actions dropdown(Edit)

            // return $rcm_data;

            return response()->json(['rcm_data' => $rcm_data]);  // pass the $user(variable) to ajax as a response for retrieving and pass the values on the inputs
        }

        public function edit_rcm_data(Request $request){
            date_default_timezone_set('Asia/Manila');

            $data = $request->all(); // collect all input fields

            $validator = Validator::make($data, [
                // 'edit_plc_category' => 'required|string|max:255'

            ]);

            if($validator->fails()) {
                return response()->json(['validation' => 'hasError', 'error' => $validator->messages()]);
            }
            else{

                PLCModuleRCM::where('id', $request->rcm_data_id)
                    ->update([ // The update method expects an array of column and value pairs representing the columns that should be updated.
                        'control_objective' => $request->edit_control_objective,
                        'risk_summary' => $request->edit_risk_summary,
                        'risk_detail' => $request->edit_risk_detail,
                        'debit' => $request->edit_debit,
                        'credit' => $request->edit_credit,
                        'validity' => $request->edit_validity,
                        'completeness' => $request->edit_completeness,
                        'accuracy' => $request->edit_accuracy,
                        'cut_off' => $request->edit_cut_off,
                        'valuation' => $request->edit_valuation,
                        'presentation' => $request->edit_presentation,
                        'key_control' => $request->edit_key_control,
                        'it_control' => $request->edit_it_control,
                        'control_id' => $request->edit_control_id,
                        'internal_control' => $request->edit_internal_control,
                        'preventive' => $request->edit_preventive,
                        'defective' => $request->edit_defective,
                        'manual' => $request->edit_manual,
                        'automatic' => $request->edit_automatic,
                        'system' => $request->edit_system
                    ]);


                /*DB::commit();*/
                return response()->json(['result' => "1"]);

            }
        }

          //============================== DELETE RCM DATA ==============================
        public function delete_rcm_data(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all(); // collect all input fields

        try{
            PLCModuleRCM::where('id', $request->rcm_data_id)
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

    public function get_rcm_data_id_to_view(Request $request){
        $rcm_data_view = PLCModuleRCM::where('id', $request->rcm_data_id_view)->get(); // get all users where id is equal to the user-id attribute of the dropdown-item of actions dropdown(Edit)

        // return $rcm_data;

        return response()->json(['rcm_data_view' => $rcm_data_view]);  // pass the $user(variable) to ajax as a response for retrieving and pass the values on the inputs
    }


}
