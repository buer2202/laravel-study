<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestConsole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'buer:fuck {name} {--mother}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fuck a man';

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
        $name = $this->argument('name');
        $mother = $this->option('mother');

        $this->info("Ah! Ah! mottto! mottto!");
    }
}
