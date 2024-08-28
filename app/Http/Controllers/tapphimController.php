<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\phim;
use App\Models\tapphim;

class tapphimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listtapphim = tapphim::with('phim')->orderBy('phim_id', 'DESC')->get();
        // return response()->json($listtapphim);

        return view('admin.tapphim.index', compact('listtapphim'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $listphim = phim::orderBy('id', 'DESC')->pluck('title', 'id');
        return view('admin.tapphim.form', compact('listphim'));
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
        $tapphim = new tapphim();
        $tapphim->phim_id = $data['phim_id'];
        $tapphim->linkphim = $data['link'];
        $tapphim->tap = $data['tapphim'];
        $tapphim->save();
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
        $listphim = phim::orderBy('id', 'DESC')->pluck('title', 'id');
        $tapphim = tapphim::find($id);
        return view('admin.tapphim.formedit', compact('tapphim', 'listphim'));
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
        $tapphim = tapphim::find($id);
        $tapphim->phim_id = $data['phim_id'];
        $tapphim->linkphim = $data['link'];
        $tapphim->tap = $data['tapphim'];
        $tapphim->save();
        return redirect()->to('tapphim');
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
        $tapphim = tapphim::find($id)->delete();
        
        return redirect()->to('tapphim');
    }
    public function selecttapphim(){
        $id = $_GET['id'];
        $phim = phim::find($id);
        $output = '<option>--chọn tập phim--</option>';
        echo $output;
        for($i=1;$i<=$phim->sotap;$i++){
            $output = '<option value="'.$i.'">'.$i.'</option>';
            echo $output;
        }
    }
}
