<?php

namespace App\Http\Controllers;

use App\Models\T_input;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ExportController extends Controller
{
    public function exportInput($program_id, $kegiatan_id, $subkegiatan_id, $bulan, $t_pptk_id)
    {
        if ($t_pptk_id == 0) {
            toastr()->error('Harap Isi PPTK Terlebih Dahulu');
            return back();
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet()->setTitle('INPUT');
        $sheet->setCellValue('A1', 'NO');
        $sheet->setCellValue('B1', 'KODE REKENING');
        $sheet->setCellValue('C1', 'URAIAN KEGIATAN');
        $sheet->setCellValue('D1', 'DPA');

        $data = T_input::where('t_pptk_id', $t_pptk_id)->where('bulan', $bulan)->where('subkegiatan_id', $subkegiatan_id)->get();

        $style1 = [
            'font' => [
                'size' => 14,
            ],

            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];

        // $style2 = [
        //     'alignment' => [
        //         'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        //         'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        //     ],
        //     'borders' => [
        //         'outline' => [
        //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        //             'color' => ['argb' => '000000'],
        //         ],
        //     ],
        // ];

        // $style3 = [
        //     'borders' => [
        //         'outline' => [
        //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        //             'color' => ['argb' => '000000'],
        //         ],
        //     ],
        // ];

        $sheet->getStyle('A1:D1')->applyFromArray($style1);
        // $sheet->getStyle('B6:B9')->applyFromArray($style1);
        // $sheet->getStyle('C6:C9')->applyFromArray($style1);
        // $sheet->getStyle('D6:D9')->applyFromArray($style1);
        // $sheet->getStyle('E6:E9')->applyFromArray($style1);
        // $sheet->getStyle('F6:F9')->applyFromArray($style1);
        // $sheet->getStyle('G6:G9')->applyFromArray($style1);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        // $sheet->getColumnDimension('E')->setAutoSize(true);
        // $sheet->getColumnDimension('F')->setAutoSize(true);
        // $sheet->getColumnDimension('G')->setAutoSize(true);

        $rows = 2;
        $no = 1;
        $countData = $rows + $data->count();

        foreach ($data as $item) {
            $sheet->setCellValue('A' . $rows, $no++);
            $sheet->setCellValue('B' . $rows, $item->uraiankegiatan->kode_rekening);
            $sheet->setCellValue('C' . $rows, $item->uraiankegiatan->nama);
            $sheet->setCellValue('D' . $rows, $item->uraiankegiatan->dpa);
            $rows++;
        }

        $styleBorder = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $styleCenter = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $sheet->getStyle('A2:A' . $countData)->applyFromArray($styleBorder);
        // $sheet->getStyle('B10:B' . $countData)->applyFromArray($styleBorder);
        // $sheet->getStyle('C10:C' . $countData)->applyFromArray($styleBorder);
        // $sheet->getStyle('D10:D' . $countData)->applyFromArray($styleBorder)->applyFromArray($styleCenter);
        // $sheet->getStyle('E10:E' . $countData)->applyFromArray($styleBorder);
        // $sheet->getStyle('F10:F' . $countData)->applyFromArray($styleBorder);
        // $sheet->getStyle('G10:G' . $countData)->applyFromArray($styleBorder);

        $filename = 'INPUT_' . $bulan . '_' . $subkegiatan_id . '.xls';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"'); // nama file
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save('php://output');
    }
}
