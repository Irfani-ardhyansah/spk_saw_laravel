<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UpdatePeriod extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:period';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'Update Status Period When its time';

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
        DB::table('periods')->whereDate('end', '<', Carbon::now())->update(['status' => '0']);
        
        $this->info('Status Periode Berhasil DiUpdate!');
    }
}
