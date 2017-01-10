<?php

namespace App\Http\Controllers\Content;

use App\Content;
use App\Libraries\Util;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class ContentController extends Controller
{
    public function index()
    {
        return Content::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $position)
    {
        Content::where('position', '=', $request->input('position'))->first()->update($request->input('child'));
        Util::flash('message', 'Item is gewijzigd', false);
        return back();
    }

    public function destroy($id)
    {
        //
    }
}
