<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomeContent;
<<<<<<< HEAD
use App\Service;
use App\Event;
=======
>>>>>>> a8bfc4ccac48bacc183d1ade2521ca7a9754cf75

class HomeContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        //
        $bannerTexts = HomeContent::where('txtTitle','Banner Text')->get();
        $bannerTextDescriptions = HomeContent::where('txtTitle','Banner Text Description')->get();

        $ServiceDescriptions = HomeContent::where('txtTitle','Services Description')->get();
        $Services = Service::all();

        $EventsDescriptions = HomeContent::where('txtTitle','News and Events Description')->get();
        $Events = Event::all();

        $Contacts = HomeContent::where('txtTitle','Contact Number')->get();
        $ContactDescriptions = HomeContent::where('txtTitle','Contact Us Description')->get();

      return view('admin.homepageView')->with(compact('bannerTexts','bannerTextDescriptions','ServiceDescriptions','Services','EventsDescriptions','Events','Contacts','ContactDescriptions'));
=======
      $bannerText = HomeContent::where('txttitle', 'bannerText')->get();
      return view('welcome')->with('bannerText', $bannerText);

      //$bannerDescription = HomeContent::where('txttitle', 'bannerDescription')->get();
      //return view('welcome')->with('bannerDescription', $bannerDescription);
>>>>>>> a8bfc4ccac48bacc183d1ade2521ca7a9754cf75
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
<<<<<<< HEAD
      /*  $description = HomeContent::find($id);
        return view('admin.homepageView')->with('description',$description);*/
=======
>>>>>>> a8bfc4ccac48bacc183d1ade2521ca7a9754cf75
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function edit(Request $id)
    {
        //


=======
    public function edit($id)
    {
        //
>>>>>>> a8bfc4ccac48bacc183d1ade2521ca7a9754cf75
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function update(Request $request)
    {
        //
        $id =$request->input('contentid');
        $data = HomeContent::find($id);
        //$data = HomeContent::where('intHomeContentId',$request->input('contentid'))->get();
        $data->txtDescription = $request->input('description');
        $data->save();

        return redirect('/admin/homepageView');
=======
    public function update(Request $request, $id)
    {
        //
>>>>>>> a8bfc4ccac48bacc183d1ade2521ca7a9754cf75
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
