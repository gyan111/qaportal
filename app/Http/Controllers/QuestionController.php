<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Exam;
use App\Question;

class QuestionController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except(['index', 'show']);
	}

    public function index($exam_id)
    {
    	$questions = Question::paginate(5);
    	return view('questions.index')->with(['questions' => $questions, 'exam_id' => $exam_id]);
    }

    public function create($exam_id){
    	return view('questions.create')->with('exam_id', $exam_id);
    }

    public function store($exam_id){
    	$this->validate(request(), [
    		'description' => 'required|min:10|max:500',
    	]);
    	
    	Question::create([
    		'description' => request('description'),
    		'exam_id' => $exam_id
    	]);

    	return redirect('/exams/' . $exam_id . '/questions');
    }

    public function show($exam_id, $question_id){
    	$exam = Exam::find($exam_id);
    	$question = Question::find($question_id);

    	// get previous question id
	    $previous = Question::where('id', '<', $question->id)->max('id');

	    // get next question id
	    $next = Question::where('id', '>', $question->id)->min('id');

    	return view('questions.show', compact(['question', 'exam']))->with('previous', $previous)->with('next', $next);;
    }

    public function edit(Question $question){
    	//
    }
    public function update(Question $question){
    	//
    }
}
