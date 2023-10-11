<?php

namespace App\Console\Commands;

use App\Events\TestEvent;
use Illuminate\Console\Command;

class DispatchEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dispatch:test';

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
        sleep(2);
        event(new TestEvent(1, 'User Teste', '3'));
        echo 'Enviou';
        return 0;
    }
}
