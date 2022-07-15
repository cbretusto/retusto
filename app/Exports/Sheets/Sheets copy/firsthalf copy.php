<?php

namespace App\Exports\Sheets;

// use App\FactorItemList;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
Use \Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class firsthalf implements FromView, WithTitle, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    protected $date;
    protected $plc_module_sa_concerned_dept;
    // protected $range1;

    function __construct($date,$plc_module_sa_concerned_dept)
    {
        $this->date = $date;
        $this->plc_module_sa_concerned_dept = $plc_module_sa_concerned_dept;
    }


    public function view(): View {
        return view('exports.first_half', ['date' => $this->date,'concerned_dept' =>$this->plc_module_sa_concerned_dept]);
    }


    public function title(): string
    {
        return '1stHalf';
    }


    // for designs
    public function registerEvents(): array
    {


        $get_concerned_dept = $this->plc_module_sa_concerned_dept;

        // dd($get_concerned_dept);


        $style1 = array(
            'font' => array(
                'name'      =>  'Arial',
                'size'      =>  12,
                // 'color'      =>  'red',
                // 'italic'      =>  true
            )
        );

        $stylex = array(
            'font' => array(
                'name'      =>  'Arial',
                'size'      =>  10,
                // 'color'      =>  'red',
                // 'italic'      =>  true
            )
        );

        $arial_font12_bold = array(
            'font' => array(
                'name'      =>  'Arial',
                'size'      =>  12,
                // 'color'      =>  'red',
                'bold'      =>  true
            )
        );

        $style2 = array(
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ]
        );

        $style3 = array(
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical' => Alignment::VERTICAL_CENTER,
            ]
        );

        $style4 = array(
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_RIGHT,
                'vertical' => Alignment::VERTICAL_CENTER,
            ]
        );
        $styleBorderBottomThin= [
            'borders' => [
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $styleBorderAll = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $style5 = array(
            'font' => array(
                'name'      =>  'Arial',
                'size'      =>  14,
                // 'color'      =>  'red',
                // 'italic'      =>  true
            )
        );

        return [
            AfterSheet::class => function(AfterSheet $event) use ($style1,$style2,$style3, $style4,$styleBorderBottomThin,$styleBorderAll,$style5,$stylex,$arial_font12_bold,$get_concerned_dept)  {


                $event->sheet->getDelegate()->getStyle('A1')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('E3')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('E4')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('E5')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('E6')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('E7')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('E8')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('E9')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('E10')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('E11')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('E12')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('B2')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('D2')->getAlignment()->setWrapText(true);

                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(35);


            $event->sheet->getDelegate()->getStyle('A2:E2')->applyFromArray($styleBorderAll);
            $event->sheet->getDelegate()->getStyle('A2:E2')->applyFromArray($style2);


                $event->sheet->getColumnDimension('A')->setWidth(20);
                $event->sheet->getColumnDimension('B')->setWidth(10);
                $event->sheet->getColumnDimension('C')->setWidth(40);
                $event->sheet->getColumnDimension('D')->setWidth(20);
                $event->sheet->getColumnDimension('E')->setWidth(50);

                $event->sheet->setCellValue('A2','Section');
                $event->sheet->setCellValue('B2','No. of Findings');
                $event->sheet->setCellValue('C2','Process Name');
                $event->sheet->setCellValue('D2','Internal Control No. Affected');
                $event->sheet->setCellValue('E2','Statement of Findings');
                $event->sheet->getDelegate()->getStyle('A2:E2')->applyFromArray($arial_font12_bold);


                $start_col = 3;
                $start_colb = 3;

                $result = 'A'.$start_colb.':E'.$start_col;
                $result_a = 'A'.$start_colb.':A'.$start_col;
                $result_b = 'B'.$start_colb.':B'.$start_col;
                $result_c = 'C'.$start_colb.':C'.$start_col;
                $result_d = 'D'.$start_colb.':D'.$start_col;
                $result_e = 'E'.$start_colb.':E'.$start_col;

                // dd($result);

                // $event->sheet->getDelegate()->getStyle((string)$result)->applyFromArray($styleBorderAll);
                // $event->sheet->getDelegate()->getStyle((string)$result)->applyFromArray($stylex);
                $event->sheet->getDelegate()->getStyle((string)$result_a)->applyFromArray($style3);
                $event->sheet->getDelegate()->getStyle((string)$result_b)->applyFromArray($style2);
                $event->sheet->getDelegate()->getStyle((string)$result_c)->applyFromArray($style3);
                $event->sheet->getDelegate()->getStyle((string)$result_d)->applyFromArray($style2);
                $event->sheet->getDelegate()->getStyle((string)$result_e)->applyFromArray($style3);



                for($i = 0; $i < count($get_concerned_dept); $i++){

                    $concerned_dept = $get_concerned_dept[$i]->concerned_dept;
                    $event->sheet->setCellValue('A'.$start_col,$concerned_dept);

                    for($q=0; $q < count($get_concerned_dept[$i]->plc_categories); $q++){
                        // $process_name = $get_concerned_dept[$i]->plc_categories[$q]->plc_category;

                        // $event->sheet->setCellValue('A'.$start_col,$process_name);

                    }


                    $start_col++;
                }





            },
        ];
    }
}
