<?php


/*
 * Copyright (c) 2022. Digitization Academy
 * idigacademy@gmail.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace App\Console\Commands;

use App\Jobs\iDigBioEventCalendarJob;
use App\Mail\JobError;
use App\Models\IDigBioEvent;
use App\Models\User;
use App\Services\IDigBioEventCalendar;
use Carbon\Carbon;
use Illuminate\Console\Command;
use ICal\ICal;
use Spatie\GoogleCalendar\Event;

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
     * @var \ICal\ICal
     */
    private ICal $ICal;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ICal $ICal)
    {
        parent::__construct();
        $this->ICal = $ICal;
    }

    /**
     * Execute the console command.
     * https://github.com/u01jmg3/ics-parser
     *
     * event->iCalUID: "calendar.3447.field_start_date.5@www.idigbio.org" = idigbio_events->event_uid
     */
    public function handle()
    {
        //iDigBioEventCalendarJob::dispatch();
        //$this->getIcsFile();
        //$this->createEvent();
    }

    public function readCalendarEvents()
    {
        $start = Carbon::create('2022', '01', '01');
        $end = Carbon::create('2024', '01', '01');
        $events = Event::get($start, $end);
        foreach ($events as $event) {
            $iDigBioEvent = IDigBioEvent::where('event_uid', $event->iCalUID)->get()->first();
            if (is_null($iDigBioEvent)) {
                echo "found null " . $event->id . PHP_EOL;
                continue;
            }
            $iDigBioEvent->event_id = $event->id;
            $iDigBioEvent->save();
        }
    }

    public function createEvent()
    {
        /*
        $now = Carbon::now();
        $lookup = $now;

        $event = new Event();
        $event->name = 'A new event';
        $event->description = 'The iDigBio Core Team consists of the Project Director, Project Managers, and representatives from all six iDigBio domains. The Core Team meets regularly to coordinate activities, establish priorities, and support operations for the project as a whole.';
        $event->location = 'https://ufl.zoom.us/my/idigbio';
        $event->startDateTime = $now;
        $event->endDateTime = $now->addHour();

        $newEvent = $event->save();
        echo $newEvent->id . PHP_EOL;

        $event = new Event();
        $event->name = 'Another new event';
        $event->description = 'This is a test';
        $event->location = 'https://ufl.zoom.us/my/idigbio';
        $event->startDateTime = $now->addDay();
        $event->endDateTime = $now->addHour();

        $new2Event = $event->save();

        echo $new2Event->id . PHP_EOL;
        */
        $event = Event::find('kvtmf8cac2l5tl7tf7gglnm2co');
        dd($event);
    }

    public function getIcsFile()
    {
        try {


            $ical = new ICal('https://www.idigbio.org/events-calendar/export.ics', array(
                'defaultSpan'                 => 2,     // Default value
                'defaultTimeZone'             => 'America/New_York', // 'UTC',
                'defaultWeekStart'            => 'MO',  // Default value
                'disableCharacterReplacement' => false, // Default value
                'filterDaysAfter'             => null,  // Default value
                'filterDaysBefore'            => null,  // Default value
                'httpUserAgent'               => null,  // Default value
                'skipRecurrence'              => false, // Default value
            ));

            foreach ($ical->events() as $event) {
                $dt = new \DateTime($event->dtstart);   // <== instance from another API
                $carbon = Carbon::instance($dt);
                dd($carbon->isPast());
                dd($carbon->toDateTimeString());                      // 2008-01-01 00:00:00
                dd(Carbon::createFromIsoFormat($event->dtstart));
            }

            //dd($ical->events());

        } catch (\Exception $e) {
            die($e);
        }
    }
}
