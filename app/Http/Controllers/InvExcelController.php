<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExports;
use App\Exports\Sheets\audit_result;


// use App\Model\BasemoldWip;
// use App\Model\FgsRecieve;
// use App\Model\ReworkVisual;
use App\PLCModuleSA;







class InvExcelController extends Controller
{
    //

    public function export(Request $request, $id)
    {



//    return $user_approver[0]->safety_officer_in_charge->name;
// return $user_approver;

    // $user_approvers = array();
    // for($i = 0; $i < count($user_approver); $i++) {
    //     $user_approvers[] = $user_approver[$i]->rapidx_user_details->name;
    // }
    // dump($user_approvers);
    // return $work_permit;
    // return $contractor;
    // return $worker;
    // return $ohs_requirements;
    // return $tools;
    // return $contractor_contact;

    $status_check_array = array();
    $second_half_status_check_array = array();
    $assessment_status_array_dic = array();
    $second_assessment_status_array = array();
    // $assessment_status_array_oec = array();



    for($x = 1; $x<= 36; $x++){

        $plc_module_sa_category1 = PLCModuleSA::where('category', $id)
        ->get();

        // $plc_module_sa_NG = PLCModuleSA::where('category', $x)
        // ->orWhere('dic_status', 'NG')
        // ->orWhere('oec_status', 'NG')
        // ->get();

        $plc_module_sa = PLCModuleSA::where('id', $id)->get();

        $plc_module_sa_NG = PLCModuleSA::where('category', $id)
        ->where('dic_status', '!=', 'G')
        ->orWhere('oec_status','!=', 'G')
        ->get();

        // $plc_module_sa_NG = PLCModuleSA::where('category', $id)->where(function ($query){
        //     $query->where('dic_status', '!=', 'G')
        //         ->orWhere('oec_status','!=', 'G');
        // })->get();

        // return $plc_module_sa_category1;

        $approver_status_array = array();
        $second_half_approver_status_array = array();
        $first_half_assessment_status_array_dic = array();
        $first_half_assessment_status_array_oec = array();
        $second_half_assessment_status_array =  array();
        $second_half_assessment_status_array_rf =  array();
        // $first_half_assessment_status_array1 = array();
        // // $second_half_assessment_rf_status_array = ['rf_status' => ''];

                $status_check = "";
                $second_half_status_check = "";
                $assessment_status = "";
                $second_assessment_status = "";
                // $assessment_status_oec = "";
        //     // $second_half_assessment_rf_status = "";

        if(count($plc_module_sa_category1) > 0){

            for ( $i = 0; $i < count($plc_module_sa_category1); $i++){
                $approver_status_array[] = $plc_module_sa_category1[$i]->approver_status;
                $second_half_approver_status_array[] = $plc_module_sa_category1[$i]->approver_status;
                $first_half_assessment_status_array_dic[] = $plc_module_sa_category1[$i]->dic_status;
                $first_half_assessment_status_array_oec[] = $plc_module_sa_category1[$i]->oec_status;
                $second_half_assessment_status_array[] = $plc_module_sa_category1[$i]->non_key_control;
                $second_half_assessment_status_array_rf[] = $plc_module_sa_category1[$i]->rf_status;
                // $first_half_assessment_status_array['oec_status'] = $plc_module_sa_category1[$i]->oec_status;
                // $second_half_assessment_status_array['rf_status'] = $plc_module_sa_category1[$i]->rf_status;
            }


            return $approver_status_array;

            if (in_array(0,$approver_status_array,TRUE)){
                $status_check = "0";
            }else if (in_array(1,$approver_status_array,TRUE)){
                $status_check = "1";
            }else if (in_array(2,$approver_status_array,TRUE)){
                $status_check = "2";
            }

            if (in_array(3,$second_half_approver_status_array,TRUE)){
                $second_half_status_check = "3";
                $status_check = "1";
                $status_check = "2";

            }else if (in_array(4,$second_half_approver_status_array,TRUE)){
                $second_half_status_check = "4";
                $status_check = "1";
                $status_check = "2";
            }

            // return $status_check;

            if (in_array('NG',$first_half_assessment_status_array_dic) || in_array('NG',$first_half_assessment_status_array_oec)){
                $assessment_status = "No Good";
            } else if (in_array('G',$first_half_assessment_status_array_dic)){
                $assessment_status = "Good";
            }

            if (in_array('X',$second_half_assessment_status_array)){
                $second_assessment_status = "Not tested (non-key control)";
            }else if (in_array('G',$second_half_assessment_status_array_rf)){
                $second_assessment_status = "Good";
            }else if (in_array('NG',$second_half_assessment_status_array_rf)){
                $second_assessment_status = "No Good";
            }

            // return $second_half_assessment_status_array_rf;

            // else{
            //     $second_assessment_status = "Good";

            // }


            // return ($second_half_assessment_status_array_rf);
            // return ($approver_status_array);

            // if (array_unique($second_half_approver_status_array) == array(3)) {
            //     // Checked all by Arlene
            //     $second_half_status_check = "3";
            // }
            // else if(array_unique($second_half_approver_status_array) == array(4)){
            //     $second_half_status_check= "4";
            // }

            // return $approver_status_array;


            // return $approver_status_array;

            // if (array_unique($approver_status_array) == array(0)) {
            //     // Checked all by Arlene
            //     $status_check = "0";
            // }
            // else if(array_unique($approver_status_array) == array(1)){
            //     $status_check= "1";
            // }

            // else if(array_unique($approver_status_array) == array(2)) {
            //     $status_check = "2";

            // }

            // else{
            //     // $status_check = "1";
            //     $status_check= "";

            // }
            // return $first_half_assessment_status_array;


            // if (in_array('NG',$first_half_assessment_status_array_oec)){
            //     $assessment_status_oec = "No Good";
            // } else if (in_array('G',$first_half_assessment_status_array_oec)){
            //     $assessment_status_oec = "Good";
            // }else{
            //     $assessment_status_oec = "ITO AY WALANG LAMAN";
            // }


            // return $assessment_status_oec;

            // if($first_half_assessment_status_array['dic_status'] != null && $first_half_assessment_status_array['oec_status'] == null){
            //     $assessment_status = "fsdfsd";
            // }elseif($first_half_assessment_status_array['dic_status'] == 'G' && $first_half_assessment_status_array['oec_status'] == null){
            //         $assessment_status = "Good";
            //     }elseif($first_half_assessment_status_array['oec_status'] == 'G' && $first_half_assessment_status_array['dic_status'] == null){
            //         $assessment_status = "Good";
            //     }elseif($first_half_assessment_status_array['oec_status'] == null && $first_half_assessment_status_array['dic_status'] == null){
            //         // $assessment_status = "N/A";
            //     }elseif($first_half_assessment_status_array['dic_status'] == 'G' && $first_half_assessment_status_array['oec_status'] == 'NG'){
            //         $assessment_status = "Not Good";
            //     }elseif($first_half_assessment_status_array['dic_status'] == 'NG' && $first_half_assessment_status_array['oec_status'] == 'G'){
            //         $assessment_status = "Not Good";
            //     }


            // return ($first_half_assessment_status_array);

            // if (array_unique($first_half_assessment_status_array == array('G'))){
            //     $assessment_status = "Good";
            // }else if(array_unique($first_half_assessment_status_array) == array('NG')) {
            //     $assessment_status = "No Good";
            // }else {
            //     $assessment_status = null;
            // }

            // if(array_unique($second_half_assessment_status_array) == array('X')){
            //     $second_assessment_status = "Not tested (non-key control)";

            // }else {
            //     $second_assessment_status = "";
            // }

            // if($second_half_assessment_status_array['non_key_control'] == 'X'){
            //     $second_assessment_status = "Not tested (non-key control)";
            // }elseif ($second_half_assessment_status_array['rf_status'] == 'G'){
            //     $second_assessment_status = "Good";
            // } elseif ($second_half_assessment_status_array['rf_status'] == 'NG'){
            //     $second_assessment_status = "No Good";
            // }




            array_push($status_check_array, $status_check);
            array_push($second_half_status_check_array,$second_half_status_check);
            array_push($assessment_status_array_dic,$assessment_status);
            array_push($second_assessment_status_array,$second_assessment_status);
            // array_push($assessment_status_array_oec,$assessment_status_oec);


        }
        else{
            // $status_check = "0";
            // $assessment_status = "";
            array_push($status_check_array, $status_check);
            array_push($second_half_status_check_array,$second_half_status_check);
            array_push($assessment_status_array_dic,$assessment_status);
            array_push($second_assessment_status_array,$second_assessment_status);
            // array_push($assessment_status_array_oec,$assessment_status_oec);

        }


    }
    // return $assessment_status_array_dic;
    // return $second_assessment_status_array;
    // return $second_assessment_status_array;


    // $fy_summary_first_half_assessment = array();

    // for($y = 1; $y<= 36; $y++){

    // $fy_summary_first_assessment = ['dic_status' => '', 'oec_status' => ''];
    // $assessment_status = "";

    // $plc_module_sa_NG = PLCModuleSA::where('category', $y)
    // ->orWhere('dic_status', 'NG')
    // ->orWhere('oec_status', 'NG')
    // ->get();

    // if(count($plc_module_sa_NG) > 0){
    //     for ( $q = 0; $q < count($plc_module_sa_NG); $q++){
    //         // $fy_summary_first_assessment[] = $plc_module_sa_NG[$q]->dic_status;
    //         $fy_summary_first_assessment['dic_status'] = $plc_module_sa_NG[$q]->dic_status;
    //         $fy_summary_first_assessment['oec_status'] = $plc_module_sa_NG[$q]->oec_status;
    //     }

    //     array_push($fy_summary_first_half_assessment, $fy_summary_first_assessment);
    // }else{
    //     array_push($fy_summary_first_half_assessment, $fy_summary_first_assessment);
    // }

    // }
        // $plc_module_sa = PLCModuleSA::get();

        // return $plc_module_sa;



        $date = date('Ymd',strtotime(NOW()));
        // return $date;
        return Excel::download(new UsersExports($date,$plc_module_sa,$status_check_array,$assessment_status_array_dic,$second_half_status_check_array,$second_assessment_status_array,$plc_module_sa_NG), 'PMI FY21 PLC Audit Result - '.$date.'.xlsx');
        // return Excel::download(new audit_result($date,$plc_module_sa), 'PMI FY21 PLC Audit Result - '.$date.'.xlsx');


    }
}
