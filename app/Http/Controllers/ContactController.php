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

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\Contact;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

/**
 * Controller for handling contact form functionality.
 *
 * This controller manages the contact form display and submission process,
 * including sending emails through the queue system.
 */
class ContactController extends Controller
{
    /**
     * Contact index.
     */
    public function index(): Renderable
    {
        return view('contact');
    }

    /**
     * Process and store the contact form submission.
     *
     * This method handles the contact form submission by:
     * - Validating the request using ContactFormRequest
     * - Creating a new Contact mail instance
     * - Queuing the mail for sending
     * - Redirecting with the appropriate success/error message
     *
     * @param  ContactFormRequest  $request  The validated form request
     * @return RedirectResponse Redirect response with a success or error message
     */
    public function store(ContactFormRequest $request): RedirectResponse
    {
        try {
            $mail = (new Contact($request->all()))->onQueue('mail');
            \Mail::to(config('mail.from.address'))->queue($mail);

            return redirect()->back()->with('toast_success', 'Contact message sent successfully.');
        } catch (\Throwable $exception) {
            return redirect()->back()->with('toast_error', 'An error occurred sending your message.');
        }
    }
}
