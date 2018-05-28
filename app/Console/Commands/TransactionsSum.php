<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Transaction;
use App\TotalTransactions;


class TransactionsSum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sum';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Total amount form previous day';

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
        $today = date("Y-m-d");
        $amount = Transaction::where('created_at', $today)->sum('amount');

        TotalTransactions::create([
            'date' => $today,
            'amount' => $amount
        ]);
    }
}
