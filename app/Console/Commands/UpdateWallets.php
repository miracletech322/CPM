<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateWallets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //Every 20 mins
        //Loop Over All Payments
            //Update Wallet
            //Update Ledger //Make sure to connect paymnet id //Type = 4 in ledger

        return 0;
    }
}
