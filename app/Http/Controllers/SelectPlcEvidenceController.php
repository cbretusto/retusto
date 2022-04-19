<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use DataTables;

//MODEL
Use App\SelectPlcEvidence;

class SelectPlcEvidenceController extends Controller
{
    public function view_select_plc_evidences(){
    $test = SelectPlcEvidence::with(['category_details','sa_details', 'plc_evidences_details'])
        ->where('logdel', 0)
        ->where('filter', 0)
        ->get();
        return $test;
    }

    //============================== ADD CLC EVIDENCES FILE ==============================
    public function add_plc_evidences_file(Request $request){
        date_default_timezone_set('Asia/Manila');

        $data = $request->all();

        $rules = [
            // 'category' => 'required|string|max:255',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json(['validation' => 'hasError', 'error' => $validator->messages()]);
        }
        else{
            DB::beginTransaction();
            try{
                SelectPlcEvidence::insert([
                    'plc_category_id' => $request->category_id,
                    'plc_sa_id' => $request->sa_id,
                    'assessment_details_and_findings' => $request->button,
                    'plc_evidences_id' => $request->select_clc_evidences_id,
                    'filter' => $request->filter,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
                
                DB::commit();
                return response()->json(['result' => "1"]);
            }
            catch(\Exception $e) {
                DB::rollback();
                return response()->json(['result' => $e]);
            }
        }
    }
}
