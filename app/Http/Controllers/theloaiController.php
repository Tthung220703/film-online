<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\theloai;

class theloaiController extends Controller
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
        $list = theloai::all();
        return view('admin.theloai.form', compact('list'));
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
        $theloai = new theloai();
        $theloai->title = $data['title'];
        $theloai->description = $data['description'];
        $theloai->slug = $data['slug'];
        $theloai->status = $data['status'];
        $theloai->save();
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
        $theloai = theloai::find($id);
        $list = theloai::all();
        return view('admin.theloai.form', compact('list', 'theloai'));
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
        $theloai = theloai::find($id);
        $theloai->title = $data['title'];
        $theloai->description = $data['description'];
        $theloai->slug = $data['slug'];
        $theloai->status = $data['status'];
        $theloai->save();
        return redirect()->route('theloai.create');
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
        theloai::find($id) -> delete();
        return redirect()->back();
    }
}
