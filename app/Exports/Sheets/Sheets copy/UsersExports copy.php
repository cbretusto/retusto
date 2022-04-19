<?php

namespace App\Exports;



use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
Use \Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\WithTitle;
// use Maatwebsite\Excel\Concerns\WithDrawings;
// use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\Exportable;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

use App\Exports\Sheets\audit_result;
use App\Exports\Sheets\fy_summary;
use App\Exports\Sheets\firsthalf;
use App\Exports\Sheets\rollforward;



// class UsersExports implements  FromView, WithTitle, WithEvents, WithMultipleSheets
class UsersExports implements  WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;
    protected $date;
    protected $plc_module_sa_NG;
    protected $plc_module_sa_category1;
    protected $approver_status_array;
    protected $status_check_array;
    protected $assessment_status_array;
    protected $second_assessment_status_array;
    protected $second_half_status_check_array;
    protected $plc_module_sa;
    // protected $fy_summary_first_half_assessment;


    //
    function __construct($date, $plc_module_sa_NG,$plc_module_sa_category1,$approver_status_array, $status_check_array,$assessment_status_array,$second_assessment_status_array,$second_half_status_check_array,$plc_module_sa)
    {
        $this->date = $date;
        $this->plc_module_sa_NG = $plc_module_sa_NG;
        $this->plc_module_sa = $plc_module_sa;
        $this->plc_module_sa_category1 = $plc_module_sa_category1;
        $this->approver_status_array = $approver_status_array;
        $this->status_check_array = $status_check_array;
        $this->assessment_status_array = $assessment_status_array;
        $this->second_assessment_status_array = $second_assessment_status_array;
        $this->second_half_status_check_array = $second_half_status_check_array;
        // $this->fy_summary_first_half_assessment = $fy_summary_first_half_assessment;
    }


    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new audit_result($this->date, $this->plc_module_sa_NG, $this->plc_module_sa, $this->plc_module_sa_category1, $this->approver_status_array,$this->status_check_array,$this->assessment_status_array,$this->second_assessment_status_array,$this->second_half_status_check_array);
        $sheets[] = new fy_summary($this->date,$this->plc_module_sa_NG);
        $sheets[] = new firsthalf($this->date);
        $sheets[] = new rollforward($this->date);


        return $sheets;
    }



}
