<?php

namespace App\Http\Controllers\Courses;

 use App\BadgeUser;
 use App\CourseUser;
 use App\GivenAnswer;
 use Illuminate\Support\Facades\Auth;
 use App\Awesome\Courses\CourseRepository as CourseRepository;
 use App\Awesome\CoursesUser\CoursesUserRepository as CoursesUserRepository;
 use Illuminate\Routing\Controller as BaseController;
 use Illuminate\Http\Request;
 use App\Libraries\Util;
 use App\Question;
 use Illuminate\Support\Facades\Redirect;

 class CourseController extends BaseController
 {

     private $courseRepo;
     private $activeCourseRepo;

     public function __construct(
         CourseRepository $courseRepo,
         CoursesUserRepository $activeCourseRepo)
     {
         $this->courseRepo = $courseRepo;
         $this->activeCourseRepo = $activeCourseRepo;
         $this->user = Auth::user();
         $this->checkForBadges();
     }

     public function index()
     {
         return $this->courseRepo->index();
     }

     public function show($category = '', $courseId, $courseTitle = '')
     {
         $course = $this->courseRepo->show($courseId);

         if (isset($this->user->id)) {
             $courseCompleted = $this->activeCourseRepo->byUserbyCourse($courseId, $this->user->id);

             if( $courseCompleted) {
                 return view('courses.course')->with(['course' => $course, 'completed' => true]);
             }
         }

         return view('courses.course')->with(['course' => $course, 'completed' => false]);
     }

     public function store(Request $request)
     {
         $this->courseRepo->store($request->input());

         Util::flash('message', 'Item is toegevoegd', false);

         return redirect('/admin');
     }

     public function edit($id, Request $request)
     {
         $this->courseRepo->update($id, $request->input('course'));

         Util::flash('message', 'Item is gewijzigd', false);

         return back();
     }

     public function destroy(Request $request)
     {
         //return $request->input();
         foreach ($request->input('toDelete') as $item) {

             $tCourses = count($this->courseRepo->index());
             if ($tCourses != 1) {
                 $this->courseRepo->delete($item);
             } else {
                 Util::flash('message', 'Kan de huidige training niet verwijderen. Maak eerst een nieuwe aan.', false);
                 return back();
             }
         }

         Util::flash('message', 'Item is verwijderd', false);
         return Redirect('/admin');
     }

     public function startCourse(Request $request, $courseId)
     {
         $newActiveCourseData = [
             'user_id' => $this->user->id,
             'course_id' => $courseId
         ];

         $activeCourse = $this->activeCourseRepo->firstOrCreate($newActiveCourseData);

         return view('courses.course-questions')->with(['course' => $activeCourse->course]);
     }

     public function startFirstQuestion(Request $request, $courseId, $key)
     {
         $newActiveCourseData = [
             'user_id' => $this->user->id,
             'course_id' => $courseId
         ];

         $activeCourse = $this->activeCourseRepo->firstOrCreate($newActiveCourseData);
         $totalQuestions = count($activeCourse->course->questions);

         $data = [
             'questions' => $activeCourse->course->questions,
             'totalQuestions' => count($activeCourse->course->questions),
             'key' => $key
         ];

         if ($key + 1 > $totalQuestions) {
             $this->checkCourse($courseId);
             return redirect('/profile');
         }

         return view('courses.course-question')->with(['course' => $activeCourse->course, 'key' => $key]);
     }

     public function checkCourse($courseId)
     {
         $courseCompleted = $this->activeCourseRepo->byUserbyCourse($courseId, $this->user->id);
         $done = true;

         foreach ($courseCompleted->course->questions as $question) {
             if ($question->given['answer'] == '') {
                 $done = false;
             }
         }

         if ($done) {
             $courseCompleted->completed = 1;
             $courseCompleted->save();
         }
     }

     public function checkForBadges()
     {

         if ( ! Auth::user()) {
             return;
         }
         $userId = Auth::user()->id;

         $completeCourses = CourseUser::where('user_id', '=', $userId)
             ->where('completed', '=', 1)
             ->get();

         if (count($completeCourses) >= 5) {
             $this->firstOrCreateToDB(1);
         }
         if (count($completeCourses) >= 10) {
             $this->firstOrCreateToDB(2);
         }
     }

     public function firstOrCreateToDB($badgeId)
     {
         BadgeUser::firstOrCreate([
             'user_id' => $this->user->id,
             'badge_id' => $badgeId
         ]);
     }

 }
