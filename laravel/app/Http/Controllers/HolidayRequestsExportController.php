<?php

namespace App\Http\Controllers;

use App\Exports\HolidayRequestsExport;
use Maatwebsite\Excel\Excel;

class HolidayRequestsExportController extends Controller
{
    private $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }
    public function export(Excel $excel)
    {
        return $this->excel->download(new HolidayRequestsExport, 'holiday_requests_exports.xlsx');
        // return Excel::download(new HolidayRequestsExport, 'holiday_requests_exports.xlsx');
    }
}
