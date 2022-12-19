<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\DB;

class DailyMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily mail to users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        

    }
}
