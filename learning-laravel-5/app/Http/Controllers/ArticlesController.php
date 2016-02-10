<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class ArticlesController extends Controller
{
    /**
     * Create a new articles controller instance
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }
    /**
     * Show all the articles
     * @return view articles.index
     */
    public function index()
    {
        $articles = Article::latest()->published()->get();
        return view('articles.index', compact('articles'));
    }
    /**
     * Show the specified Article
     * @param  Article $article [routing model]
     * @return view articles.show
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
    /**
     * Create new Article
     * @return view articles.create
     */
    public function create()
    {
        $tags = Tag::lists('name','id');
        return view('articles.create',compact('tags'));
    }
    /**
     * Store an article to the database
     * @param  ArticleRequest $request validate form
     * @return redirect to articles list
     */
    public function store(ArticleRequest $request)
    {
        $this->createArticle($request);
        flash()->success('Your article has been successfully created!');
        return redirect('articles');
    }

    /**
     * Edit an article
     * @param  Model $article Specified article model
     * @return view          articles.edit
     */         
    public function edit($article)
    {
        $tags = Tag::lists('name','id');
        return view('articles.edit', compact('article','tags'));
    }
    /**
     * update article
     * @param  Article        $article 
     * @param  ArticleRequest $request 
     */
    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());
        $this->syncTags($article, $request->input('tag_list'));
        return redirect('articles');
    }
    /**
     * sync up the list of tag in the database
     * @param  Article $article         
     * @param  array   $tags    
     */
    private function syncTags(Article $article, array $tags){
        $article->tags()->sync($tags);
    }
    /**
     * create a new Article
     * @param  Request $request 
     * @return Article          $article
     */
    private function createArticle(ArticleRequest $request){
        $article = Auth::user()->articles()->create($request->all());
        $this->syncTags($article, $request->input('tag_list'));
        return $article;
    }

}
