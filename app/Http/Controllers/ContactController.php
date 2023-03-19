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
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    /**
     * Contact index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): Renderable
    {
        return view('contact');
    }

    /**
     * Send contact form.
     *
     * @param \App\Http\Requests\ContactFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContactFormRequest $request): RedirectResponse
    {
        try{
            $mail = (new \App\Mail\Contact($request->all()))->onQueue('mail');
            \Mail::to(config('mail.from.address'))->queue($mail);

            return redirect()->back()->with('toast_success', trans('Contact message sent successfully.'));
        }
        catch (\Throwable $exception)
        {
            return redirect()->back()->with('toast_error', trans('An error occurred sending your message. ' . $exception->getMessage()));
        }
    }
}
