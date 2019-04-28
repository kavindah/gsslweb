<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $articles=Article::orderBy('created_at','desc')->paginate(10);
        return view('/article_published')->with('articles',$articles);
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
        $this->validate($request, [
            'title'=>'required|max:255|min:5'
        ]);
         if($request->hasFile('article_image')){
                $filenameWithExt=$request->file('article_image')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('article_image')->getClientOriginalExtension();
                $fileNameToStore=$filename.'_'.time().'.'.$extension;
                $path=$request->file('article_image')->storeAs('public/article_images',$fileNameToStore);
           }else{
            $fileNameToStore='noimage.jpg';
           }

        
    $articles=new Article;
    $articles->title=$request->input('title');
    $articles->body=$request->input('body');
    $articles->user_id=auth()->user()->id;
    $articles->article_image=$fileNameToStore;
    $articles->save();

    return redirect('/article_create')->with('success','Article uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article=Article::find($id);
        return view('articles.index')->with('articles',$article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $article=Article::find($id);
        return view('articles.edit')->with('articles',$article);
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
        
         $articles=Article::find($id);
  if($request->hasFile('article_image')){
                $filenameWithExt=$request->file('article_image')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('article_image')->getClientOriginalExtension();
                $fileNameToStore=$filename.'_'.time().'.'.$extension;
                $path=$request->file('article_image')->storeAs('public/article_images',$fileNameToStore);
                 $articles->article_image=$fileNameToStore;
           }
    
    $articles->title=$request->input('title');
    $articles->body=$request->input('body');
    
    $articles->user_id=auth()->user()->id;
    $articles->save();

    return redirect('/article_published')->with('success','Article Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $articles=Article::find($id);
      $articles->delete();
      return redirect('/article_published')->with('success','Article deleted');
    }
}
