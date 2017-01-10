<?php

namespace App\Http\Controllers\Profile;

use App\BadgeUser;
use App\CourseUser;
use App\Http\Controllers\Controller;
use App\Libraries\MollieGateway as Mollie;
use Illuminate\Support\Facades\Auth;
use App\Libraries\Util as Util;
use App\Awesome\CoursesUser\CoursesUserRepository as ActiveCourseRepo;

class ProfileController extends Controller
{

    public function __construct(ActiveCourseRepo $activeCourseRepo)
    {
        $this->activeCourse = $activeCourseRepo;
        $this->user = Auth::user();
    }

    public function index()
    {
        $courses = CourseUser::where('user_id', '=', $this->user->id)->orderBy('course_id', 'DESC')->get();
        $badges= BadgeUser::where('user_id', '=', $this->user->id)->get();

        return view('profile.profile')->with(['courses' => $courses, 'badges' => $badges]);
    }

    public function getUpgrade()
    {
        return view('profile.upgrade');
    }

    public function createPayment()
    {
        return Mollie::create($this->user);
    }

    public function processPayment()
    {

        $payment  = Mollie::get($this->user->payment_token);

        if ($payment->isPaid()) {
            $this->user->paid = 1;
            $this->user->save();

        } else {
            dd('not success');
        }

        session()->flash('message','Welkom bij DGLearning. U kunt nu gebruik maken van alle trainingen.');

        return redirect('/profile');
    }

}
