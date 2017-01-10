<?php

namespace App\Http\Controllers\Courses;

use App\Answer;
use App\GivenAnswer;
use App\Libraries\Util;
use App\Option;
use Illuminate\Support\Facades\Auth;
use App\Awesome\Questions\QuestionRepository as QuestionRepository;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class QuestionController extends BaseController
{

    private $categoryRepo;

    public function __construct(QuestionRepository $questionRepo)
    {
        $this->questionRepo = $questionRepo;
        $this->user = Auth::user();
    }

    public function index()
    {
        return $this->questionRepo->get();
    }

    public function store(Request $request)
    {
        $courseId = $request->input('course_id');

        foreach ($request->input('questions') as $question) {
            $nQuestion = $this->storeQuestion($courseId, $question);
            $this->storeAnswerAssociated($question, $nQuestion);


            if (isset($question['options'])) {
                foreach ($question['options'] as $option) {
                    $o = new Option;
                    $o->option = $option;
                    $o->question_id = $nQuestion->id;
                    $o->save();
                }
            }
        }

        Util::flash('message', 'Item is toegevoegd', false);

        return Redirect::back();
    }

    public function edit($id, Request $request)
    {
        $this->questionRepo->update($id, $request->input('question'));

        Util::flash('message', 'Item is gewijzigd', false);

        return back();
    }

    public function checkAnswer(Request $request)
    {
        $question = $this->questionRepo->show($request->input('questionId'));
        $answer = $request->input('answer');
        $questionIndex = $request->input('questionIndex');


        if ($answer == 1) {
            $answer = 'A';
        } else if ($answer == 2) {
            $answer = 'B';
        } else if ($answer == 3) {
            $answer = 'C';
        } else if ($answer == 4) {
            $answer = 'D';
        }

        if ($question['answer']['context'] == $answer) {

            GivenAnswer::create([
                'question_id' => $question['id'],
                'user_id' => $this->user->id,
                'answer' => $answer,
                'filled' => 1
            ]);

            return redirect()->route('play-question', [
                'courseId' => $question->course_id,
                'key' => $questionIndex + 1
            ]);

        } else {
            Util::flash('message', 'Niet alle antwoorden zijn goed ingevuld.', false);
            return redirect('/play/' . $question->course_id . '/' . $questionIndex);
        }
    }


    public function destroy(Request $request)
    {
        $this->questionRepo->delete($request->input('toDelete'));
        Util::flash('message', 'Item is verwijderd', false);

        $r = parse_url(redirect()->back()->getTargetUrl());
        $redirectPath = substr($r['path'], 0, -3);

        return redirect($redirectPath);
    }
    /**
     * @param $courseId
     * @param $question
     * @return mixed
     */
    public function storeQuestion($courseId, $question)
    {
        $question['course_id'] = $courseId;
        $nQuestion = $this->questionRepo->store($question);

        return $nQuestion;
    }

    /**
     * @param $question
     * @param $nQuestion
     */
    public function storeAnswerAssociated($question, $nQuestion)
    {
        $answer = new Answer;
        $answer->context = $question['answer'];
        $answer->question()->associate($nQuestion);
        $answer->save();
    }
}
