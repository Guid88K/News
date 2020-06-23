<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsTranslate;
use Illuminate\Http\Request;

class UserRole extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (((session('locale') == "ru"))){
            $news = NewsTranslate::orderBy('updated_at','desc')->paginate(5);
            return view('index',['news'=>$news]);
        }else{
            $news = News::orderBy('updated_at','desc')->paginate(5);
            return view('index',['news'=>$news]);
        }
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
    public function show($id, Request $request)
    {

        if (($request->submit == "rus")||((session('locale') == "ru"))){
            $news = NewsTranslate::find($id);
            $all_news = NewsTranslate::orderBy('updated_at','desc')->paginate(5);
            return view('pages.show',['news'=>$news],compact('all_news'));
        }elseif( $request->submit = "ukr"){
            $news = News::find($id);
            $all_news = News::orderBy('updated_at','desc')->paginate(5);
            return view('pages.show',['news'=>$news],compact('all_news'));
        }

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
