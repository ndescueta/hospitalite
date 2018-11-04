<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Question;
use App\GeneralQuestion;
use App\Category;

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
    $activecategories = Category::where('stfCategoryStatus', 'Active')
    ->get();
    return view('admin.faqs')->with(compact('questions', 'generalQuestions', 'activecategories'));
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

  public function storeCategory(Request $request){
    $category = new Category();
    try {
      $category->strCategoryName = $request->txtCategory;
      $category->stfCategoryStatus = "Active";
      $category->save();
    } catch (\Exception $e) {
      echo $e;
    }
  }

  public function showGeneralQuestions($intCategoryId){
      $generalQuestions = DB::table('tblgeneralquestion')
      ->join('tblcategory', 'tblgeneralquestion.intCategoryId', '=', 'tblcategory.intCategoryId')
      ->where('tblgeneralquestion.intCategoryId', $intCategoryId)
      ->select('*')
      ->get();
      return view('admin.faqsViewGeneralQuestions')->with('generalQuestions', $generalQuestions);
  }

  public function getCategoryDetails(Request $request){
    $categoryDetails = Category::where('intCategoryId', $request->id)
    ->get();
    echo json_encode($categoryDetails);
  }

  public function updateCategory(Request $request){
    $getCategoryDetails = GeneralQuestion::where('intCategoryId', $request->hdnCategoryId)
    ->get();
    if (count($getCategoryDetails) > 0){
      echo "1"; // forbid user to deactivate category because it has general questions in it
    }
    else {
      $updateCategoryDetails = Category::where('intCategoryId', $request->hdnCategoryId)
      ->update(['strCategoryName' => $request->txtEditCategory, 'stfCategoryStatus' => $request->selCategoryStatus]);
      echo "2"; // success
    }
  }

  public function categorizeGenQue(Request $request){
    $generalQuestions = GeneralQuestion::all();
    if(empty($request->selAvailableCategories)){
      echo 1; // ekis
    }
    else {
      $catID = $request->selAvailableCategories;
      $selectedGenQueId = $request->hdnSelectedGenQue;
      $selGQID = explode(',', $selectedGenQueId);
      foreach($selGQID as $id){
        $generalQuestions = GeneralQuestion::where('intGeneralQuestionId', $id)
        ->update(['intCategoryId' => $catID]);
      }
      echo 2; //success
    }
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
    if (empty($request->selGeneralQuestions)){
      echo 1; // no selected general question
    }
    else {
      $genQID = $request->selGeneralQuestions;
      $selectedQuestionsId = $request->hdnSelectedQuestions;
      $selQID = explode(",", $selectedQuestionsId);
      foreach($selQID as $sid){
        $questions = Question::where('intQuestionId', $sid)
        ->update(['intGeneralQuestionId' => $genQID]);
      }
      echo 2; // success
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
