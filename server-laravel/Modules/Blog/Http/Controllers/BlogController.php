<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Post;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('blog::index');
    }

 

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param Post $post
     * @return Renderable
     */
    public function show(Post $post)
    {
        return view('blog::show');
    }
 
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param post $post
     * @return Renderable
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param post $post
     * @return Renderable
     */
    public function destroy(Post $post)
    {
        //
    }
}
