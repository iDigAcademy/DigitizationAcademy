<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppTestDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:testdb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create test db';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       \Storage::disk('database')->put('database.sqlite', '');
       $this->call('migrate', ['----database' => 'sqlite']);
    }
}
