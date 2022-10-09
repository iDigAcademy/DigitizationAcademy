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
use App\Models\Services\PageService;
use App\Models\User;
use App\Notifications\Contact;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;
use Alert;

class HomeController extends Controller
{
    /**
     * @var \App\Models\Services\PageService
     */
    private PageService $pageService;

    /**
     * Create a new controller instance.
     *
     * @param \App\Models\Services\PageService $pageService
     */
    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    /**
     * Show home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): Renderable
    {
        $topImage = $this->pageService->getHomeTopImage();
        $bottomImage = $this->pageService->getHomeBottomImage();

        return view('home', compact('topImage', 'bottomImage'));
    }

    /**
     * Show courses page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function courses(): Renderable
    {
        $topImage = $this->pageService->getCourseImage();
        return view('courses', compact('topImage'));
    }

    /**
     * Show calendar page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function calendar(): Renderable
    {
        $topImage = $this->pageService->getCalendarImage();
        return view('calendar', compact('topImage'));
    }

    /**
     * Show community page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function community(): Renderable
    {
        $topImage = $this->pageService->getCommunityImage();
        return view('community', compact('topImage'));
    }

    /**
     * Show about page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about(): Renderable
    {
        $topImage = $this->pageService->getAboutImage();
        return view('about', compact('topImage'));
    }

    public function contact()
    {
        return view('contact');
    }

    /**
     * Send contact form.
     *
     * @param \App\Http\Requests\ContactFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postContact(ContactFormRequest $request): RedirectResponse
    {
        try{
            $users = User::whereHas("roles", function($q){ $q->where("name", "Super Admin"); })->get();
            Notification::send($users, new Contact($request->all()));

            return redirect()->back()->with('toast_success', trans('Contact message sent successfully.'));
        }
        catch (\Throwable $exception)
        {
            return redirect()->back()->with('toast_error', trans('An error occurred sending your message. ' . $exception->getMessage()));
        }
    }

    /**
     * Custom log out.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }
}
