<?php

namespace App\Console\Commands;

use App\Application;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateExpiredLeaves extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:expiredLeavesUpdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily update all expired leaves with status expired';

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
     * @return mixed
     */
    public function handle()
    {
        $pending_leaves = Application::where('status', 2)->get();
        foreach ($pending_leaves as $leave) {
            if (strtotime($leave->start_from) < strtotime(Carbon::today())) {
                $leave->status = 3;
                $leave->save();
            }
        }
    }
}
