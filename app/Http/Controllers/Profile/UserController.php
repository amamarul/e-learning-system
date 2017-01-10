<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function index()
    {
        return User::with('badges')->get();
    }
}
