<?php
/*
 * Copyright (c) 2023. Digitization Academy
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

namespace App\Services;

use App\Models\IDigBioEvent;
use Carbon\Carbon;
use DateTime;
use ICal\ICal;
use Spatie\GoogleCalendar\Event;

class IDigBioEventCalendar
{
    /**
     * Ics file url.
     *
     * @var string
     */
    public string $file;

    /**
     * @var \ICal\ICal
     */
    private ICal $iCal;

    /**
     * @var \App\Models\IDigBioEvent
     */
    private IDigBioEvent $iDigBioEvent;

    /**
     * @param \App\Models\IDigBioEvent $iDigBioEvent
     */
    public function __construct(IDigBioEvent $iDigBioEvent)
    {
        $this->iDigBioEvent = $iDigBioEvent;
    }

    /**
     * Process the file.
     *
     * @param string $file
     * @return void
     * @throws \Exception
     */
    public function process(string $file)
    {
        $this->createICalFromFile($file);

        $events = $this->iCal->events();

        foreach ($events as $event) {
            $iDigBioEvent = $this->iDigBioEvent->firstOrCreate(['event_uid' => $event->uid]);
            if (is_null($iDigBioEvent->event_id)) {
                $id = $this->createGoogleCalenderEvent($event);
                $iDigBioEvent->calendar_id = $id;
                $iDigBioEvent->save();
            }
        }
    }

    /**
     * Create iCal.
     *
     * @param string $file
     */
    public function createICalFromFile(string $file)
    {
        $this->iCal = new ICal($file, [
            'defaultSpan'                 => 2,     // Default value
            'defaultTimeZone'             => 'America/New_York', // 'UTC',
            'defaultWeekStart'            => 'MO',  // Default value
            'disableCharacterReplacement' => false, // Default value
            'filterDaysAfter'             => null,  // Default value
            'filterDaysBefore'            => null,  // Default value
            'httpUserAgent'               => null,  // Default value
            'skipRecurrence'              => false, // Default value
        ]);
    }

    /**
     * Save event to calendar.
     *
     * @param \ICal\Event $data
     * @return string
     * @throws \Exception
     */
    public function createGoogleCalenderEvent(\ICal\Event $data): string
    {
        $startdt = new DateTime($data->dtstart);
        $enddt = new DateTime($data->dtend);

        $startDate = Carbon::instance($startdt);
        $endDate = Carbon::instance($enddt);

        $event = new Event();
        $event->name = $data->summary;
        $event->description = $data->description;
        $event->location = $data->location;
        $event->startDateTime = $startDate;
        $event->endDateTime = $endDate;

        $newEvent = $event->save();

        return $newEvent->id;
    }
}
