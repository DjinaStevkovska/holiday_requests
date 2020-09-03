<?php

namespace App\Console\Commands;

use App\HolidayRequests;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Mail;
use App\Mail\DailyReport;
use App\Exports\HolidayRequestsExport;




class SendEmailWithRequests extends Command
{
    // public $details;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:holiday-reports';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email with excel files for holiday requests';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Schedule $schedule)
    {
        $newRequests = HolidayRequests::where('reportIsSent', '=', '0')->get();

        (new HolidayRequestsExport)->store('holiday_requests_exports.xlsx', 'local');

        $oldRequests = HolidayRequests::where('reportIsSent', '=', '0')
              ->update(['reportIsSent' => '1']);

        $details = [
        'title' => 'Daily requests report',
        'body'  => 'Daily reports for holiday requests from the employees for the last 24 hours.',
        'message' => 'Thank you for using mailtrap'

        ];

        foreach ($newRequests as $request) {
            $managerId = $request->manager_id;
            $managerEmail = \App\Managers::find($managerId)->email;
            // dd($managerEmail);

            Mail::to($managerEmail)->send(new DailyReport($details));

//echo "The holidays request report has been exported to excel and sent to the managers mail. \n";

    }
}
