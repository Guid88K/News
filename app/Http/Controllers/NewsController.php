<?php

namespace App\Http\Controllers;

use DomDocument;
use Illuminate\Http\Request;
use App\News;
use App\NewsTranslate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (((session('locale') == "ru"))){
            $news = NewsTranslate::orderBy('updated_at','desc')->paginate(5);
            return view('admin',['news'=>$news]);
        }else{
            $news = News::orderBy('updated_at','desc')->paginate(5);
            return view('admin',['news'=>$news]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'detail' => 'required',
            'categories'=>'required',
        ]);

        $detail=$request->input('detail');
        $dom = new DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/upload/" . time().$k.'.png';
            $picture = $image_name;
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);

        }
//        $detail = $dom->saveHTML();

        $file = $request->file('image');
        if ($file==null)
        {
            $news = new News();
            $news->title = $request->title;
            $news->content = $detail;
            $news->categories = $request->categories;
            $news->image = 'default.jpg';

            $trans = new NewsTranslate();

            $trans->title = $request->title;
            $trans->content = $detail;
            $trans->categories = $request->categories;
            $trans->image =  'default.jpg';
            $news->save();
            $news->translate()->save($trans);


            return redirect('/unews')->with('success', 'Stock has been added');
        }else
        $destinationPath = 'upload';
        $file->move($destinationPath, $file->getClientOriginalName());

        $news = new News();
        $news->title = $request->title;
        $news->content = $detail;
        $news->categories = $request->categories;
        $news->image = $file->getClientOriginalName();

        $trans = new NewsTranslate();

        $trans->title = $request->title;
        $trans->content = $detail;
        $trans->categories = $request->categories;
        $trans->image = $file->getClientOriginalName();
        $news->save();
        $news->translate()->save($trans);


        return redirect('/unews')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id, Request $request)
    {
        if ($request->submit == "rus") {
            $news = News::find($id);
            $all_news = News::orderBy('updated_at', 'desc')->paginate(5);
            return view('pages.show', ['news' => $news], compact('all_news'));
        } elseif ($request->submit = "ukr") {
            $news = News::find($id);
            $all_news = News::orderBy('updated_at', 'desc')->paginate(5);
            return view('pages.show', ['news' => $news], compact('all_news'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('pages.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $chekc_ckeckbox = Input::get('mycheckbox',false);
        if ($chekc_ckeckbox == 'rus'){
            $request->validate([
                'title'=>'required',
                'detail' => 'required',
            ]);

            $detail=$request->input('detail');
            $dom = new \DomDocument();
            libxml_use_internal_errors(true);
            $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');
            foreach($images as $k => $img){
                $data = $img->getAttribute('src');
                list($data) = explode(';', $data);
                list($data) = explode(',', $data);
                $data = base64_decode($data);
                $image_name= "/upload/" . time().$k.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
            //$detail = $dom->saveHTML();

            $img = News::find($id);
            $img = $img->image;


            $tnews = NewsTranslate::find($id);
            $tnews->title = $request->title;
            $tnews->content = $detail;
            $tnews->categories = $request->categories;
            $tnews->image = $img;

            $tnews->save();
            return redirect('/unews')->with('success', 'Stock has been added');

        }else                  //edit  version
            $request->validate([
                'title'=>'required',
                'detail' => 'required',
            ]);

        $detail=$request->input('detail');
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($data) = explode(';', $data);
            list($data) = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/upload/" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $file = $request->file('image');
        if($file==null){
            $img = News::find($id);
            $img = $img->image;

            $news = News::find($id);
            $news->title = $request->title;
            $news->content = $request->detail;
            $news->categories = $request->categories;
            $news->image =$img;
            $news->save();
            return redirect('/unews')->with('success', 'Stock has been added');

        }else

            $destinationPath = 'upload';
        $file->move($destinationPath, $file->getClientOriginalName());

        $news = News::find($id);
        $news->title = $request->title;
        $news->content = $request->detail;
        $news->categories = $request->categories;
        $news->image = $file->getClientOriginalName();
        $news->save();

        return redirect('/unews')->with('success', 'Stock has been added');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $tnews = NewsTranslate::find($id);
        $news->delete(); $tnews->delete();
        return redirect('/admin/news');
    }

    public function busy_filter()
    {
        $news = DB::table('news')->where('categories','like','business')->orderBy('updated_at','desc')->paginate(5);
        return view('index',['news'=>$news]);
    }

    public function marketing_filter()
    {
        $news = DB::table('news')->where('categories','like','marketing')->orderBy('updated_at','desc')->paginate(5);
        return view('index',['news'=>$news]);
    }
    public function management_filter()
    {
        $news = DB::table('news')->where('categories','like','management')->orderBy('updated_at','desc')->paginate(5);
        return view('index',['news'=>$news]);
    }
    public function finances_filter()
    {
        $news = DB::table('news')->where('categories','like','finances')->orderBy('updated_at','desc')->paginate(5);
        return view('index',['news'=>$news]);
    }
    public function other_filter()
    {
        $news = DB::table('news')->where('categories','like','other')->orderBy('updated_at','desc')->paginate(5);
        return view('index',['news'=>$news]);
    }

    public function search( Request $request){

        $search = $request->get('search');
        $news = DB::table('news')->where('title','like','%'.$search.'%')->orderBy('updated_at','desc')->paginate(5);
        return view('index',['news'=>$news]);
    }
}
