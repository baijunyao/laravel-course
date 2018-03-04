<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DatabaseController extends Controller
{
    /**
     * 插入数据
     */
    public function insert()
    {
        DB::table('articles')->insert([
            [
                'category_id' => 2,
                'title' => '文章2',
                'content' => '内容2'
            ],
            [
                'category_id' => 3,
                'title' => '文章3',
                'content' => '内容3'
            ],
        ]);
    }

    /**
     * 查询数据
     */
    public function get()
    {
        $data = DB::table('articles')
            ->select('category_id', 'title', 'content')
            ->where('title', '<>', '文章1')
            ->whereIn('id', [1, 2, 3])
            ->groupBy('category_id')
            ->orderBy('id', 'desc')
            ->get();
        dump($data);
    }

    /**
     * collect 集合
     */
    public function collect()
    {
        $array = [
            '', '帅', '白', 0, '俊', false, '遥', null, '博', '客'
        ];
        $collect = collect($array);
        // unset() 删除 '帅' 字
        // array_filter() 过滤为假的值
        // implode() 用 - 连接
        unset($array[1]);
        dump(implode('-', array_filter($array)));
        // forget() 删除 '帅字'
        // filter() 过滤为假的值
        // implode() 用 - 连接
        dump($collect->forget(1)->filter()->implode('-'));
        $data = DB::table('articles')->where('id', '>', 1)->get()->pluck('title')->implode('-');
        dump($data);

    }
}
