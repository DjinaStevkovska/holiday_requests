<?php

namespace App\Console\Commands;

use App\HolidayRequests;
use Illuminate\Console\Command;

class SendEmailWithRequests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendEmailWithRequests';

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
    public function handle()
    {
        $sendEmail = 

        $oldRequests = HolidayRequests::where('reportIsSent', '=', '0')
              ->update(['reportIsSent' => '1']);
        // dd($oldRequests);

        echo "The holidays request report has been exported to excel and sent to the managers mail. \n";

    }
}
