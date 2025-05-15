<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use DB;
use App\Models\Career;
use Illuminate\Support\Facades\Auth;

class CareerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $career=Career::orderBy('id', 'DESC')->get();
        return view('admin.career',compact('career'));
    }
     public function delete(Request $request, $id)
    {
        DB::table('careers')->where('id',$id)->delete();

        return redirect()->route('career-list')->with('success', 'Career deleted successfully.');
    }
    public function exportToExcel()
{
    $careers = Career::all();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'SlNo');
    $sheet->setCellValue('B1', 'Name');
    $sheet->setCellValue('C1', 'Email');
    $sheet->setCellValue('D1', 'Position');
    $sheet->setCellValue('E1', 'CV URL');
    $sheet->getStyle('A1:E1')->getFont()->setBold(true);

    $baseUrl = url('uploads/cv'); // Laravel helper generates the base URL dynamically

    $rowNumber = 2;
    foreach ($careers as $career) {
        $sheet->setCellValue('A' . $rowNumber, $rowNumber - 1);
        $sheet->setCellValue('B' . $rowNumber, $career->name);
        $sheet->setCellValue('C' . $rowNumber, $career->email);
        $sheet->setCellValue('D' . $rowNumber, $career->position);

        $cvUrl = $baseUrl . '/' . $career->cv;

        // Set hyperlink text and URL
        $sheet->setCellValue('E' . $rowNumber, $cvUrl);
        $sheet->getCell('E' . $rowNumber)->getHyperlink()->setUrl($cvUrl);

        $rowNumber++;
    }


    $writer = new Xlsx($spreadsheet);
    $fileName = 'Careers_' . date('Y-m-d') . '.xlsx';

    return response()->stream(
        function () use ($writer) {
            $writer->save('php://output');
        },
        200,
        [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment;filename="' . $fileName . '"',
            'Cache-Control' => 'max-age=0',
        ]
    );
}

}
