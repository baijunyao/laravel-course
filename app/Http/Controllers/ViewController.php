<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    /**
     * 文章列表
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = '文章列表';
        $article = Article::withTrashed()
            ->orderBy('id', 'desc')
            ->get();
        $assign = [
            'title' => $title,
            'article' => $article,
        ];
        $assign = compact('title', 'article');
        return view('article.index', $assign);
    }

    /**
     * 新增文章页面
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $title = '新增文章';
        $assign = compact('title');
        return view('article.create', $assign);
    }

    /**
     * 新增文章
     *
     * @param Request $request
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        Article::create($data);
        return redirect('view/index');
    }

    /**
     * 编辑文章页面
     *
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $title = '编辑文章';
        $article = Article::find($id);
        $assign = compact('article', 'title');
        return view('article.edit', $assign);
    }

    /**
     * 编辑文章
     *
     * @param Request $request
     * @param         $id
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        Article::where('id', $id)->update($data);
        return redirect('view/index');
    }

    /**
     * 删除文章
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Article::destroy($id);
        return redirect()->back();
    }

    /**
     * 恢复文章
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        Article::where('id', $id)->restore();
        return redirect()->back();
    }

    /**
     * 彻底删除文章
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($id)
    {
        Article::where('id', $id)->forceDelete();
        return redirect()->back();
    }
}
