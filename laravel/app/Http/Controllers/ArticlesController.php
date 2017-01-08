<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
// use Request;

use Auth;
use Flash;
use App\Article;
use App\Tag;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{

  public function __construct(){
    $this->middleware('auth', ['only' => 'create']);
  }

  public function index(){
    // $articles = Article::all();
    // $articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
    $articles = Article::latest('published_at')->published()->get();
    return view('articles.index', compact('articles'));
  }

  public function show(Article $article){
  /* Patern1: public function show($id){
    $article = Article::findOrFail($id); */
    return view('articles.show', compact('article'));
  }

  public function create(){
    $tags = Tag::pluck('name', 'id');
    return view('articles.create', compact('tags'));
  }

  // Validate Patern2; public function store(Request $request){
  // Requestパターン：
  public function store(ArticleRequest $request){
    /* パターン1
    $input = Request::all();
    Article::create($input);
    */
    /* validationを個別に実装する場合
    $this->validate($request, [
      'title' => 'required|min:3',
      'body' => 'required',
      'published_at' => 'required|date',
    ]);
    */

    /* $article = new Article($request->all());
    \Auth::user()->articles()->save($article);*/
    // Article::create($request->all());
    //$article = Auth::user()->articles()->create($request->all());
    //$tagIds = $request->input('tags');
    //$article->tags()->attach($request->input('tag_list'));
    $this->createArticle($request);
    flash()->success('Your article has been created!');
    return redirect('articles');
    /* Version:3
    return redirect('articles')->with([
      'flash_message' => 'Your article has been created!',
      'flash_message_important' => true,
    ]);
    \Session::flash('flash_message', 'Your article has been created');
    return redirect('articles');*/
  }

  public function edit(Article $article){
  /* Patern1: findOrFail public function edit($id){
    $article = Article::findOrFail($id);*/
    $tags = Tag::pluck('name', 'id');
    return view('articles.edit', compact('article', 'tags'));
  }

  public function update(Article $article, ArticleRequest $request){
  /* Patern1: public function update($id, ArticleRequest $request){
    $article = Article::findOrFail($id);*/
    $article->update($request->all());
    $this->syncTags($article, $request->input('tag_list'));
    return redirect('articles');
  }

  private function syncTags(Article $article, array $tags){
    $article->tags()->sync($tags);
  }

  private function createArticle(ArticleRequest $request){
    $article = Auth::user()->articles()->create($request->all());
    $article->tags()->sync($article, $request->input('tag_list'));
    return $article;
  }

}
