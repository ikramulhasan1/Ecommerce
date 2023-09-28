<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function categoryPDFReport()
    {
        $categories = Category::all();

        $mpdf = new \Mpdf\Mpdf();

        $mpdf->SetWatermarkText('IKRAMUL HASAN');
        $mpdf->showWatermarkText = true;

        $html = view('backend.categories.category_pdf', compact('categories'))->render();
        $mpdf->WriteHTML($html);

        $mpdf->Output('category.pdf', 'D');
    }

    public function categoryExcelReport()
    {
        return Excel::download(new Category, 'category.xlsx');
    }
}