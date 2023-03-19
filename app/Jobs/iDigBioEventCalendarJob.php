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

namespace App\Jobs;

use App\Mail\JobComplete;
use App\Mail\JobError;
use App\Services\IDigBioEventCalendar;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class iDigBioEventCalendarJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public int $timeout = 180;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->onQueue('calendar');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(IDigBioEventCalendar $IDigBioEventCalendar)
    {
        try {
            $count = $IDigBioEventCalendar->process('https://www.idigbio.org/events-calendar/export.ics');
            $message = [
                'Message: Calendar job complete. ' . $count . ' created'
            ];
            $mail = (new JobComplete($message))->onQueue('mail');
            \Mail::to(config('mail.from.address'))->queue($mail);

        } catch (\Throwable $e) {
            $message = [
                'Message: ' .  $e->getMessage(),
                'File : ' . $e->getFile() . ': ' . $e->getLine()
            ];

            $mail = (new JobError($message))->onQueue('mail');
            \Mail::to(config('mail.from.address'))->queue($mail);

            $this->delete();
        }
    }
}
