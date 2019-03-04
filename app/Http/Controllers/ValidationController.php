<?php

namespace App\Http\Controllers;

use App\Http\Requests\Validation\Store;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dump(session()->all());
        return view('validation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Store $request
     */
    public function store(Store $request)
    {
        dump($request->all());
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
}
