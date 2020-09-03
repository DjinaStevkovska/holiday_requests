<?php

namespace App\Exports;

// use App\Http\Controllers\HolidayRequestsController
use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\contracts\Support\Responsable;
use App\HolidayRequests;




class HolidayRequestsExport implements FromCollection, Responsable 
{
    use Exportable;
    
    private $filename = 'holiday_requests_exports.xlsx';
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return HolidayRequests::all()->where('reportIsSent', '=', '0');
    }
}
