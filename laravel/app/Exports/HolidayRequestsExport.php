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
        // dd(User::all());
        return HolidayRequests::all();
    }

    // public function headings(): array
    // {
    //     return [
    //         'id',
    //         'user_id',
    //         'first_name',
    //         'last_name',
    //         'email',
    //         'phone_number',
    //         'holiday_start',
    //         'holiday_end',
    //         'remark',
    //         'reportIsSent',
    //         'created_at',
    //         'updated_at'
    //     ];
    // }

}
