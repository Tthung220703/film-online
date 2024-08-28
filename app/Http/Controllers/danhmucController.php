<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuc;

class danhmucController extends Controller
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
        $list = danhmuc::all();
        return view('admin.danhmuc.form', compact('list'));
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
        $danhmuc = new danhmuc();
        $danhmuc->title = $data['title'];
        $danhmuc->description = $data['description'];
        $danhmuc->slug = $data['slug'];
        $danhmuc->status = $data['status'];
        $danhmuc->save();
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
        $danhmuc = danhmuc::find($id);
        $list = danhmuc::all();
        return view('admin.danhmuc.form', compact('list', 'danhmuc'));
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
        $danhmuc = danhmuc::find($id);
        $danhmuc->title = $data['title'];
        $danhmuc->description = $data['description'];
        $danhmuc->slug = $data['slug'];
        $danhmuc->status = $data['status'];
        $danhmuc->save();
        return redirect()->route('danhmuc.create');
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
        danhmuc::find($id) -> delete();
        return redirect()->back();
    }
}
