<?php

namespace App\Console\Commands;

use App\Scheduled_Job;
use Illuminate\Console\Command;

class ScheduleJobEndDateUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scheduleJobEnddateUpdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update End Date of Scheduled Job corresponding to frequency';

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
        Scheduled_Job::all()->get();
    }
}
