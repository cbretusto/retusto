<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\PLCModuleFlowChart;
use DataTables;
use App\RapidXUser;
use Carbon\Carbon;

class PlcModulesFlowChartController extends Controller
{
    public function view_plc_modules_flow_chart(Request $request)
        {
            $plc_module_flow_chart = PLCModuleFlowChart::where('category', $request->session)->get();

            return DataTables::of($plc_module_flow_chart)
            ->addColumn('action', function ($plc_module_flow_chart){
                $result = "";

                $result .= '<button class="btn btn-primary btn-sm  text-center actionEditFlowChart" flow_chart-id="' . $plc_module_flow_chart->id . '" data-toggle="modal" data-target="#modalEditFlowChart" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Edit</button>&nbsp;';


                return $result;
            })
            ->addColumn('flow_chart', function($plc_module_flow_chart){
            $result = "<center>";

            if($plc_module_flow_chart->flow_chart == "No File Uploaded"){
                $result .= '<span class="badge badge-pill badge-danger">No file uploaded!</span>';
            }
            else{

                $result .= "<a href='download_flow_chart/" . $plc_module_flow_chart->id . "' > $plc_module_flow_chart->flow_chart</a>";
            }
                $result .= '</center>';
                return $result;
        })
        ->addColumn('uploaded_by', function($plc_module_flow_chart){
            $result = "";
          if ($plc_module_flow_chart->status == 0){

                $result .= $plc_module_flow_chart->uploaded_by;

          }else{
            $result .= $plc_module_flow_chart->revised_by;

          }
           return $result;

        })

        ->addColumn('date_uploaded', function($plc_module_flow_chart){
            $result = "";
          if ($plc_module_flow_chart->status == 0){

            $result .= $plc_module_flow_chart->date_uploaded;
          }else{
            $result .= $plc_module_flow_chart->revised_date;
          }

           return $result;

        })


                ->rawColumns(['action','flow_chart','uploaded_by','date_uploaded'])
                ->make(true);

        }

        //============GET RAPIDX USER===============
        public function get_rapidx_user(Request $request){
            session_start();
            $rapidx_user_id = $_SESSION['rapidx_user_id'];
            $get_user = RapidXUser::where('id', $rapidx_user_id)->get();
            // return $get_user;
            return response()->json(["get_user" => $get_user]);
            }

           // ========================================= ADD FLOW CHART ===================================================
    public function add_flow_chart(Request $request){
        date_default_timezone_set('Asia/Manila');
        // session_start();

        $data = $request->all();
        // $file = $request->file('upload_file');


        $validator = Validator::make($data, [
            // 'process_owner' => 'required',
        ]);


        if($validator->passes()){
            if($request->hasFile('uploaded_flow_chart')){
                // if ($request->file('uploaded_flow_chart')->getClientMimeType() == 'application/pdf')
                // {


                    // get original file name
                    $original_filename = $request->file('uploaded_flow_chart')->getClientOriginalName();
                    // return $original_filename;

                    Storage::putFileAs('public/flow_chart', $request->uploaded_flow_chart,  $original_filename);
                    PLCModuleFlowChart::insert([
                        'category' => $request->category_name,
                        'process_owner'   => $request->name_of_process_owner,
                        'flow_chart'  => $original_filename,
                        'date_uploaded' => $request->flow_chart_uploaded_date,
                        'uploaded_by'  => $request->name_of_uploader_flow_chart,
                        'status' => 0,
                        'logdel' => 0,
                        // 'updated_at' => date('Y-m-d H:i:s'),
                        'created_at' => date('Y-m-d H:i:s')
                    ]);

                    return response()->json(['result' => "1"]);
                // }else{
                //     return response()->json(['result' => "2"]);
                // }
            }
            else{
                PLCModuleFlowChart::insert([
                    'category' => $request->category_name,
                    'process_owner'   => $request->name_of_process_owner,
                    'flow_chart'  => 'No File Uploaded',
                    'date_uploaded' => $request->flow_chart_uploaded_date,
                    'uploaded_by'  => $request->name_of_uploader_flow_chart,
                    'status' => 0,
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
    public function download_flow_chart(Request $request, $id){
        $flowchart = PLCModuleFlowChart::where('id', $id)->first();

        $file =  storage_path() . "/app/public/flow_chart/" . $flowchart->flow_chart;

        return Response::download($file, $flowchart->flow_chart);
    }

    //============================== GET USER BY ID TO EDIT ==============================
    public function  get_flow_chart_id(Request $request){
        $flow_chart_data = PLCModuleFlowChart::where('id', $request->flow_chart_id)->get(); // get all users where id is equal to the user-id attribute of the dropdown-item of actions dropdown(Edit)
        // return $user[0]->rapidx_user_details->name;
        return response()->json(['flow_chart' => $flow_chart_data]);  // pass the $user(variable) to ajax as a response for retrieving and pass the values on the inputs
    }

    //============================== EDIT FLOW CHART DATA ==============================
    public function edit_flow_chart(Request $request){
        date_default_timezone_set('Asia/Manila');

        if($request->hasFile('edit_uploaded_flow_chart')){
            $data = $request->all(); // collect all input fields

            if(isset($request->edit_uploaded_flow_chart)){
                // if ($request->file('edit_uploaded_flow_chart')->getClientMimeType() == 'application/pdf')
                // {
                // get original file name
                $original_filename1 = $request->file('edit_uploaded_flow_chart')->getClientOriginalName();
                // return $original_filename1;

                Storage::putFileAs('public/flow_chart', $request->edit_uploaded_flow_chart,  $original_filename1);
                PLCModuleFlowChart::where('id', $request->flow_chart_id)
                ->update([
                    'process_owner' => $request->edit_process_owner,
                    'revised_by'   => $request->flow_chart_revised_by,
                    'flow_chart' => $original_filename1,
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
