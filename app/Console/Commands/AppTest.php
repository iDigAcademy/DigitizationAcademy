<?php

namespace App\Console\Commands;

use App\Models\Course;
use App\Models\User;
use DateTimeZone;
use Illuminate\Console\Command;

class AppTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Application testing';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::find(1);
        $course = Course::find(1);
        dd($course->end_date->tz($user->timezon)->toDayDateTimeString());
    }
}
