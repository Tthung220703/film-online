<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\quocgia;

class quocgiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $list = quocgia::all();
        return view('admin.quocgia.form', compact('list'));
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
        $data = $request->all();
        $quocgia = new quocgia();
        $quocgia->title = $data['title'];
        $quocgia->description = $data['description'];
        $quocgia->slug = $data['slug'];
        $quocgia->status = $data['status'];
        $quocgia->save();
        return redirect()->back();
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
        $quocgia = quocgia::find($id);
        $list = quocgia::all();
        return view('admin.quocgia.form', compact('list', 'quocgia'));
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
        $data = $request->all();
        $quocgia = quocgia::find($id);
        $quocgia->title = $data['title'];
        $quocgia->description = $data['description'];
        $quocgia->slug = $data['slug'];
        $quocgia->status = $data['status'];
        $quocgia->save();
        return redirect()->route('quocgia.create');
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
        quocgia::find($id) -> delete();
        return redirect()->back();
    }
}
