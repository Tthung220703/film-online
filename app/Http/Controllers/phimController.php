<?php

namespace App\Http\Controllers;

use App\Models\phim;
use App\Models\danhmuc;
use App\Models\theloai;
use App\Models\quocgia;
use App\Models\tapphim;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\Storage;
use File;

class phimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = phim::with('danhmuc', 'theloai', 'quocgia')->orderBy('id', 'DESC')->get();

        // chuyen du lieu phim sang file json
        $path = public_path()."/json/";
        if(!is_dir($path)){
            mkdir($path,0777,true);
        }

        File::put($path.'phim.json', json_encode($list));

        return view('admin.phim.index', compact('list'));
    }
    public function update_year(Request $request){
        $data = $request->all();
        $phim = phim::find($data['id_phim']);
        $phim->year = $data['year'];
        $phim -> save();
    }
    public function update_topview(Request $request){
        $data = $request->all();
        $phim = phim::find($data['id_phim']);
        $phim->topview = $data['topview'];
        $phim -> save();
    }
    public function filter_topview(Request $request){
        $data = $request->all();
        $phim = phim::where('topview', $data['value'])->take(20)->get();
        $output = '';
        foreach($phim as $key => $mv) {

            if($mv -> dophangiai == 0){
                $text = 'HD';
            }else{
                $text = 'SD';
            }
            $output = '
            <div class="item post-37176">
                <a href="'.url('phim/'.$mv->slug).'" title="'.$mv -> title.'">
                <div class="item-link">
                    <img src="'.url('uploads/phim/'.$mv->image).'" class="lazy post-thumb"/>
                    <span class="is_trailer">'.$text.'</span>
                </div>
                <p class="title">'.$mv -> title.'</p>
                </a>
                <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                <span style="width: 0%"></span>
                </span>
                </div>
            </div>

            ';
            echo $output;
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $danhmuc = danhmuc::pluck('title', 'id');
        $theloai = theloai::pluck('title', 'id');
        $quocgia = quocgia::pluck('title', 'id');

        return view('admin.phim.form', compact( 'danhmuc', 'theloai', 'quocgia'));
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
        $phim = new phim();
        $phim->title = $data['title'];
        $phim->thoiluong = $data['thoiluong'];
        $phim->sotap = $data['sotap'];
        $phim->dophangiai = $data['dophangiai'];
        $phim->trailer = $data['trailer'];
        $phim->phude = $data['phude'];
        $phim->title_es = $data['title_es'];
        $phim->description = $data['description'];
        $phim->slug = $data['slug'];
        $phim->status = $data['status'];
        $phim->danhmuc_id = $data['danhmuc_id'];
        $phim->theloai_id = $data['theloai_id'];
        $phim->quocgia_id = $data['quocgia_id'];
        $phim->phim_hot = $data['phim_hot'];

        //them hinh anh
        $get_image = $request->file('image');
        if($get_image){
            $get_name_img = $get_image->getClientOriginalName();
            $name_img = current(explode('.',$get_name_img));
            $new_img = $name_img.rand(0, 9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/phim/',$new_img);
            $phim->image = $new_img;
        }
        $phim->save();
        return redirect()->back();


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    }
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

        $danhmuc = danhmuc::pluck('title', 'id');
        $theloai = theloai::pluck('title', 'id');
        $quocgia = quocgia::pluck('title', 'id');
        $phim = phim::find($id);
        return view('admin.phim.form', compact('danhmuc', 'theloai', 'quocgia', 'phim'));

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
        $phim = phim::find($id);
        $phim->title = $data['title'];
        $phim->thoiluong = $data['thoiluong'];
        $phim->sotap = $data['sotap'];
        $phim->dophangiai = $data['dophangiai'];
        $phim->phude = $data['phude'];
        $phim->trailer = $data['trailer'];
        $phim->title_es = $data['title_es'];
        $phim->description = $data['description'];
        $phim->slug = $data['slug'];
        $phim->status = $data['status'];
        $phim->danhmuc_id = $data['danhmuc_id'];
        $phim->theloai_id = $data['theloai_id'];
        $phim->quocgia_id = $data['quocgia_id'];
        $phim->phim_hot = $data['phim_hot'];
        //them hinh anh
        $get_image = $request->file('image');
        if($get_image){
            if(file_exists('uploads/phim/'.$phim->image)){
                unlink('uploads/phim/'.$phim->image);
            }
            else{
                $get_name_img = $get_image->getClientOriginalName();
                $name_img = current(explode('.',$get_name_img));
                $new_img = $name_img.rand(0, 9999).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('uploads/phim/',$new_img);
                $phim->image = $new_img;
            }
        }
        $phim->save();
        return redirect()->route('phims.create');
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
        $phim = phim::find($id);
        if(file_exists('uploads/phim/'.$phim->image)){
            unlink('uploads/phim/'.$phim->image);
        }
        tapphim::whereIn('phim_id',[$phim->id])->delete();
        $phim->delete();
        return redirect()->back();
    }
}
