<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(4);
        return view('news.index')->with('news', $news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'NewsTitle' => 'required',
          'NewsDescription' => 'required'
          //'NewsReference' => 'required'
      ]);

      $news = new News;
      $news->strNewsTitle = $request->input("NewsTitle");
      $news->txtNewsDescription = $request->input("NewsDescription");
      $news->txtNewsReference = $request->input("NewsReference");
      //$post->user_id = auth()->user()->id;
      $news->save();

      return redirect('/news')->with('success', 'News Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($intNewsId)
    {
      $news = News::find($intNewsId);
      return view('news.show')->with('news', $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($intNewsId)
    {
      $news = News::find($intNewsId);
      return view('news.edit')->with('news', $news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $intNewsId)
    {
      $this->validate($request, [
          'NewsTitle' => 'required',
          'NewsDescription' => 'required'
          //'NewsReference' => 'required'
      ]);
      $news = News::find($intNewsId);
      $news->strNewsTitle = $request->input("NewsTitle");
      $news->txtNewsDescription = $request->input("NewsDescription");
      $news->txtNewsReference = $request->input("NewsReference");
      //$post->user_id = auth()->user()->id;
      $news->save();

      return redirect('/news')->with('success', 'News Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($intNewsId)
    {
      $news = News::find($intNewsId);
      $news->delete();
      return redirect('/news')->with('success', 'News Removed');
    }
}
