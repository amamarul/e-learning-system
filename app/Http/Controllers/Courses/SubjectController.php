<?php

namespace App\Http\Controllers\Courses;

use Illuminate\Support\Facades\Auth;
use App\Awesome\Categories\CategoryRepository as CategoryRepository;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Libraries\Util;

class SubjectController extends BaseController
{

    private $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->user = Auth::user();
    }

    public function index()
    {
        return $this->categoryRepo->index();
    }

    public function store(Request $request)
    {
        $this->categoryRepo->Store($request->input());

        Util::flash('message', 'Item is toegevoegd', false);

        return redirect('/admin');
    }

    public function show($id)
    {
        return $this->categoryRepo->show($id);
    }

    public function destroy(Request $request)
    {
        $this->categoryRepo->delete($request->input('delete'));

        Util::flash('message', 'Item is verwijderd', false);
        return back();
    }

    public function subjectView($id = null)
    {
        if ($id != null) {
            return view('courses.subjects')->with([
                'subjects' => $this->index(),
                'selectedSubject' => $this->show($id)
            ]);
        }
        return view('courses.subjects')->with([
            'subjects' => $this->index(),
            'selectedSubject' => []
        ]);
    }
}
