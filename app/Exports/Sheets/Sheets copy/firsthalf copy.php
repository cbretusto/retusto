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
    // protected $factor_item_list;
    // protected $range1;

    function __construct($date)
    {
        $this->date = $date;
        // $this->factor_item_list = $factor_item_list;
    }


    public function view(): View {
        return view('exports.first_half', ['date' => $this->date]);
    }


    public function title(): string
    {
        return '1stHalf';
    }


    // for designs
    public function registerEvents(): array
    {

        $style1 = array(
            'font' => array(
                'name'      =>  'Arial',
                'size'      =>  8,
                // 'color'      =>  'red',
                // 'italic'      =>  true
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
            AfterSheet::class => function(AfterSheet $event) use ($style1,$style2,$style3, $style4,$styleBorderBottomThin,$styleBorderAll,$style5)  {

                
                // $event->sheet->getDelegate()->getStyle('A2')
                // ->getFill()
                // ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                // ->getStartColor()
                // ->setARGB('D1D1D1');

                // $event->sheet->getDelegate()->getStyle('C2')
                // ->getFill()
                // ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                // ->getStartColor()
                // ->setARGB('9dc8e1');
                // // 82b9d9
                
                // $event->sheet->getDelegate()->getStyle('C3')
                // ->getFill()
                // ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                // ->getStartColor()
                // ->setARGB('9dc8e1');

                // $event->sheet->getDelegate()->getStyle('D3')
                // ->getFill()
                // ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                // ->getStartColor()
                // ->setARGB('9dc8e1');

                // $event->sheet->getDelegate()->getStyle('E3')
                // ->getFill()
                // ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                // ->getStartColor()
                // ->setARGB('9dc8e1');

                // $event->sheet->getDelegate()->getStyle('F2')
                // ->getFill()
                // ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                // ->getStartColor()
                // ->setARGB('95aaf3'); 
                // //  7e97f1
                
                // $event->sheet->getDelegate()->getStyle('F3')
                // ->getFill()
                // ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                // ->getStartColor()
                // ->setARGB('95aaf3');

                // $event->sheet->getDelegate()->getStyle('G3')
                // ->getFill()
                // ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                // ->getStartColor()
                // ->setARGB('95aaf3');

                // $event->sheet->getDelegate()->getStyle('H3')
                // ->getFill()
                // ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                // ->getStartColor()
                // ->setARGB('95aaf3');

                // $event->sheet->getDelegate()->getStyle('I2')
                // ->getFill()
                // ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                // ->getStartColor()
                // ->setARGB('78d869'); 
                // //  7e97f1
                
                // $event->sheet->getDelegate()->getStyle('I3')
                // ->getFill()
                // ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                // ->getStartColor()
                // ->setARGB('78d869');

                // $event->sheet->getDelegate()->getStyle('J3')
                // ->getFill()
                // ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                // ->getStartColor()
                // ->setARGB('78d869');

                // $event->sheet->getDelegate()->getStyle('K2')
                // ->getFill()
                // ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                // ->getStartColor()
                // ->setARGB('D1D1D1');


                


                

                

                $event->sheet->getDelegate()->getStyle('A1')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('B2')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('D2')->getAlignment()->setWrapText(true);
                
                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(35);
                // $event->sheet->getDelegate()->getStyle('A1')->getFont()->setSize(16);
                // $event->sheet->getDelegate()->getStyle('B1')->getFont()->setSize(16);



            $event->sheet->getDelegate()->getStyle('A2:E2')->applyFromArray($styleBorderAll);
            

                $event->sheet->getColumnDimension('A')->setWidth(20);
                $event->sheet->getColumnDimension('B')->setWidth(15);
                $event->sheet->getColumnDimension('C')->setWidth(40);
                $event->sheet->getColumnDimension('D')->setWidth(25);
                $event->sheet->getColumnDimension('E')->setWidth(50);
        


                $event->sheet->getDelegate()->getStyle('A2:E2')->applyFromArray($style1);
                $event->sheet->getDelegate()->getStyle('A2:E2')->applyFromArray($style2);
                $event->sheet->getDelegate()->getStyle('A1:B1')->applyFromArray($style3);
                $event->sheet->getDelegate()->getStyle('A1:B1')->applyFromArray($style5);

                // $event->sheet->getDelegate()->getStyle('C2:E2')->applyFromArray($style2);
                // $event->sheet->getDelegate()->getStyle('F2:H2')->applyFromArray($style2);
                // $event->sheet->getDelegate()->getStyle('I2:J2')->applyFromArray($style2);
                // $event->sheet->getDelegate()->getStyle('C3:C4')->applyFromArray($style2);
                // $event->sheet->getDelegate()->getStyle('D4')->applyFromArray($style2);
                // $event->sheet->getDelegate()->getStyle('E3:E4')->applyFromArray($style2);
                // $event->sheet->getDelegate()->getStyle('F3:F4')->applyFromArray($style2);
                // $event->sheet->getDelegate()->getStyle('G4')->applyFromArray($style2);
                // $event->sheet->getDelegate()->getStyle('H3:H4')->applyFromArray($style2);
                // $event->sheet->getDelegate()->getStyle('I3:I4')->applyFromArray($style2);
                // $event->sheet->getDelegate()->getStyle('J3:J4')->applyFromArray($style2);
                // $event->sheet->getDelegate()->getStyle('K2:K4')->applyFromArray($style2);
                // $event->sheet->getDelegate()->getStyle('A5:A40')->applyFromArray($style1);
                // $event->sheet->getDelegate()->getStyle('B5:B40')->applyFromArray($style1);


            },
        ];
    }
}
