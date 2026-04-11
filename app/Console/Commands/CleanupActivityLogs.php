<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Activitylog\Models\Activity;
use Carbon\Carbon;


class CleanupActivityLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cleanup-activity-logs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        // $days = (int) $this->argument('days');
        $days = 90;

        $date = Carbon::now()->subDays($days);

        $deleted = Activity::where('created_at', '<', $date)->delete();

        $this->info("Deleted {$deleted} activity logs older than {$days} days.");

        return Command::SUCCESS;
    }
}
