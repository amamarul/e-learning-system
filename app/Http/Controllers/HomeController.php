<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests;
use App\mParent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $news = mParent::where('type', '=', 'news')->with('children')->get();
        $data['news']= $news;
        $data['content'] = Content::all();
        return view('home', $data);
    }
}
