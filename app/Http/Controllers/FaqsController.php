<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
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

  public function saveEditedQuestion(Request $request){
    try {
      $generalQuestion = GeneralQuestion::where('intGeneralQuestionId', $request->hdnGenQueID)
      ->update(['txtGeneralQuestion' => $request->editQuestion,
      'txtAnswer' => $request->editAnswer]);
      echo "1";
    } catch (\Exception $e) {
      echo $e;
    }
  }

  public function showQuestions($intGeneralQuestionId){
    $questions = DB::table('tblquestion')
    ->join('tblgeneralquestion', 'tblquestion.intGeneralQuestionId', '=', 'tblgeneralquestion.intGeneralQuestionId')
    ->select('*')
    ->where('tblquestion.intGeneralQuestionId', $intGeneralQuestionId)
    ->orderBy('intQuestionId', 'asc')
    ->get();
    return view('admin.faqsViewQuestions')->with('questions', $questions);
  }

  public function showQuestionandAnswer(Request $request){
    $queAndans = GeneralQuestion::where('intGeneralQuestionId', $request->id)
    ->get();

    echo json_encode($queAndans);
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

  public function deleteQuestion(Request $request){
    // echo $request->id;
    $deleteQuestion = Question::where('intQuestionId', $request->id)
    ->delete();
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
