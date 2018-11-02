<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\GeneralQuestion;

class FaqsController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $questions = Question::whereNull('intGeneralQuestionId')
    ->orderBy('intQuestionId', 'DESC')
    ->get();
    $generalQuestions = GeneralQuestion::all();
    return view('admin.faqs')->with(compact('questions','generalQuestions'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  public function showQuestions(){
    // $question = new Question();


  }
  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function storeQuestion(Request $request)
  {
    $question = new Question();
    $genQuestion = new GeneralQuestion();

    $question->txtQuestion = $request->inqQuestion;
    $question->save();
  }

  public function storeGeneralQuestion(Request $request){
    $generalQuestion = new GeneralQuestion();
    $question = new Question();
    echo $request->txtAnswer.$request->txtGeneralQuestion;
    // INSERT BLOCK
    $generalQuestion->txtGeneralQuestion = $request->txtGeneralQuestion;
    $generalQuestion->txtAnswer = $request->txtAnswer;
    $generalQuestion->save();
  }

  public function generalizeQuestion(Request $request){
    $question = new Question();
    $genQID = $request->selGeneralQuestions;
    $selectedQuestionsId = $request->hdnSelectedQuestions;
    $selQID = explode(",", $selectedQuestionsId);
    foreach($selQID as $sid){
      $questions = Question::where('intQuestionId', $sid)
      ->update(['intGeneralQuestionId' => $genQID]);
    }
  }


  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {

  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
