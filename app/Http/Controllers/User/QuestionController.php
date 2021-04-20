<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Pool;
use Auth;
use Str;
use App\Models\User;
use App\Models\QuestionAnswer;
class QuestionController extends Controller
{


	 public function index()
    {
        return view('user.questions.questions', get_defined_vars());
    }


    public function postQuestion()
    {
        return view('user.questions.post_question', get_defined_vars());
    }

    public function storeQuestion(Request $request)
    {


    	      $request->validate([
		        'title'=>'required',
		        'category'=>'required',
		        'tags' =>'required',
		        'detail' =>'required'
		      ]);


    	            $user = Question::create([
			        'user_id'=>Auth::Id(),
                    'qid'  => date('ymdhis'),
			        'title'=>$request->title,
			        'slug'=>Str::slug($request->title),
			        'category'=>$request->category,
			        'tags'=>$request->tags,
			        'detail'=>$request->detail,
                    'is_anonymous' => $request->is_anonymous ?? 0
			      ]);

    	     return redirect()->route('user.index.questions')->withMessage('Your question has been posted.');
    }



    public function editQuestion($id)
    {
		$question = Question::find(base64_decode($id));
        return view('user.questions.edit_question', get_defined_vars());
    }


    public function updateQuestion(Request $request)
    {

    	      $request->validate([
		        'title'=>'required',
		        'category'=>'required',
		        'tags' =>'required',
		        'detail' =>'required'
		      ]);


    	      $question = Question::find(base64_decode($request->id));



    	           $question->update([
			        'title'=>$request->title,
			        'slug'=>Str::slug($request->title),
			        'category'=>$request->category,
			        'tags'=>$request->tags,
			        'detail'=>$request->detail,
			      ]);

    	     return redirect()->route('user.index.questions')->withMessage('Question has been updated.');
    }





    public function removeQuestion($id)
    {
    	Question::find(base64_decode($id))->delete();
    	return back()->withMessage('Your question has been deleted.');
    }

    public function postQuestionAnswer(Request $request)
    {

        QuestionAnswer::create([
            'user_id'     => Auth::Id(),
            'question_id' => base64_decode($request->question_id),
            'answer'      => $request->answer,
            'answered_by' => Auth::User()->role
        ]);

        return back()->withMessage('Your answer has been posted.');
    }


}
