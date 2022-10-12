<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    /**
     * Set timezone value in session if user timezone does not exist.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function timezone(Request $request): JsonResponse
    {
        if ( ! $request->isJson()) {
            return response()->json(['failed', 500]);
        }

        \Session::put('timezone', $request->get('value'));

        return response()->json(['success', 200]);
    }
}
