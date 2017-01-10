<?php

namespace App\Http\Controllers\Parent;

use App\mChild;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller as BaseController;

class ChildController extends BaseController
{
    public function index()
    {
        //
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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        $child = mChild::where('id', '=', $request->input('toDelete'));
        $child->delete();

        return redirect('/admin');
    }
}
