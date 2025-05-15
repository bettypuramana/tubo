<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use DB;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $contact=Contact::orderBy('id', 'DESC')->get();
        return view('admin.contact',compact('contact'));
    }
     public function delete(Request $request, $id)
    {
        DB::table('contacts')->where('id',$id)->delete();

        return redirect()->route('contact-list')->with('success', 'Contact deleted successfully.');
    }
    public function exportToExcel()
    {
        $contacts = Contact::all(); // get all contact records from the database

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header columns
        $sheet->setCellValue('A1', 'SlNo');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'Subject');
        $sheet->setCellValue('E1', 'Message');
        $sheet->getStyle('A1:E1')->getFont()->setBold(true);

        // Add data rows
        $rowNumber = 2; // Start from the second row (after header)
        foreach ($contacts as $contact) {
            $sheet->setCellValue('A' . $rowNumber, $rowNumber - 1);
            $sheet->setCellValue('B' . $rowNumber, $contact->name);
            $sheet->setCellValue('C' . $rowNumber, $contact->email);
            $sheet->setCellValue('D' . $rowNumber, $contact->subject);
            $sheet->setCellValue('E' . $rowNumber, $contact->message);
            $rowNumber++;
        }

        // Set writer and output the file
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Contact_Enquiry_' . date('Y-m-d') . '.xlsx';

        // Save and download the file
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
