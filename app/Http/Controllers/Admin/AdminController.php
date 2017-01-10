<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Content;
use App\Course;
use App\mChild;
use App\mParent;
use App\Question;

use App\Awesome\Categories\CategoryRepository as CategoryRepository;
use App\Awesome\Courses\CourseRepository as CourseRepository;
use App\Awesome\Questions\QuestionRepository as QuestionRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct
    (
        CategoryRepository $categoryRepo,
        CourseRepository $courseRepo,
        QuestionRepository $questionRepo
    )
    {
        $this->categoryRepo = $categoryRepo;
        $this->courseRepo = $courseRepo;
        $this->questionRepo = $questionRepo;
        $this->middleware('admin');
    }

    public function index()
    {
        $adminData = $this->returnAdminData();
        $adminData['news'] = mParent::where('type', '=', 'news')->with('children')->get();
        $adminData['content'] =  Content::all();;
        return view('admin.admin', $adminData);
    }

    public function test(Request $request)
    {
        return $request->input();
    }

    public function angular()
    {
        return view('admin.admin');
    }

    public function course($categoryId)
    {
        $adminData = $this->returnAdminData();
        $adminData['category'] = $this->categoryRepo->show($categoryId);
        return view('admin.course', $adminData);
    }

    public function editCourse($courseId)
    {
        $adminData['course'] = $this->courseRepo->show($courseId);
        return view('admin.course-edit', $adminData);
    }

    public function editQuestion($courseId, $questionId)
    {
        //$adminData = $this->returnAdminData();
        $adminData['course'] = $this->courseRepo->show($courseId);
        $adminData['question'] = $this->questionRepo->show($questionId);
        return view('admin.question-edit', $adminData);
    }

    public function editPage($childID)
    {
        //$adminData = $this->returnAdminData();
        $news = mParent::where('type', '=', 'news')->with('children')->get();
        $adminData['news'] = $news;
        return view('admin.edit-page', $adminData);
    }

    public function editChild($childID)
    {
        $child = mChild::find($childID);
        $adminData['child'] = $child;
        return view('admin.child-edit', $adminData);

    }

    public function returnAdminData()
    {
        $categories = Category::all();
        $courses = Course::all();
        $questions = Question::all();

        $adminData = [
            'categories' => $categories,
            'courses' => $courses,
            'questions' => $questions,
        ];
        return $adminData;
    }

}
