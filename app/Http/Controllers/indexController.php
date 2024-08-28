<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuc;
use App\Models\quocgia;
use App\Models\theloai;
use App\Models\phim;
use App\Models\tapphim;
use Illuminate\Support\Facades\DB;


class indexController extends Controller
{
    public function home()
    {
        $phimhot = phim::where('phim_hot', 1)->where('status', 1)->get();
        $danhmuc = danhmuc::orderBy('id', 'ASC')->where('status', 1)->get();
        $theloai = theloai::orderBy('id', 'ASC')->get();
        $quocgia = quocgia::orderBy('id', 'ASC')->get();
        $danhmuc_home = danhmuc::with('phim')->orderBy('id', 'ASC')->where('status', 1)->get();
        $sidebar_phimhot = phim::where('phim_hot', 1)->where('status', 1)->take(10)->get();
        return view('page.home', compact('danhmuc', 'theloai', 'quocgia', 'danhmuc_home', 'phimhot', 'sidebar_phimhot'));
    }
    public function danhmuc($slug)
    {
       $danhmuc = danhmuc::orderBy('id', 'ASC')->where('status', 1)->get();
        $theloai = theloai::orderBy('id', 'ASC')->get();
        $quocgia = quocgia::orderBy('id', 'ASC')->get();
        $danhmuc_slug = danhmuc::where('slug', $slug)->first();
        $phim = phim::where('danhmuc_id', $danhmuc_slug->id)->paginate(30);
        $sidebar_phimhot = phim::where('phim_hot', 1)->where('status', 1)->take(10)->get();
        return view('page.danhmuc', compact('danhmuc', 'theloai', 'quocgia', 'danhmuc_slug', 'phim', 'sidebar_phimhot'));
    }
    public function theloai($slug)
    {
       $danhmuc = danhmuc::orderBy('id', 'ASC')->where('status', 1)->get();
        $theloai = theloai::orderBy('id', 'ASC')->get();
        $quocgia = quocgia::orderBy('id', 'ASC')->get();
        $theloai_slug = theloai::where('slug', $slug)->first();
        $phim = phim::where('theloai_id', $theloai_slug->id)->paginate(30);
        $sidebar_phimhot = phim::where('phim_hot', 1)->where('status', 1)->take(10)->get();
        return view('page.theloai', compact('danhmuc', 'theloai', 'quocgia', 'theloai_slug', 'phim', 'sidebar_phimhot'));
    }
    public function quocgia($slug)
    {
       $danhmuc = danhmuc::orderBy('id', 'ASC')->where('status', 1)->get();
        $theloai = theloai::orderBy('id', 'ASC')->get();
        $quocgia = quocgia::orderBy('id', 'ASC')->get();
        $quocgia_slug = quocgia::where('slug', $slug)->first();
        $phim = phim::where('quocgia_id', $quocgia_slug->id)->paginate(30);
        $sidebar_phimhot = phim::where('phim_hot', 1)->where('status', 1)->take(10)->get();
        return view('page.quocgia', compact('danhmuc', 'theloai', 'quocgia', 'quocgia_slug', 'phim', 'sidebar_phimhot'));
    }
    public function year($year)
    {
       $danhmuc = danhmuc::orderBy('id', 'ASC')->where('status', 1)->get();
        $theloai = theloai::orderBy('id', 'ASC')->get();
        $quocgia = quocgia::orderBy('id', 'ASC')->get();
        $year = $year;
        $phim = phim::where('year', $year)->paginate(30);
        $sidebar_phimhot = phim::where('phim_hot', 1)->where('status', 1)->take(10)->get();
        return view('page.year', compact('danhmuc', 'theloai', 'quocgia', 'year', 'phim', 'sidebar_phimhot'));
    }
    public function phim($slug)
    {
        $danhmuc = danhmuc::orderBy('id', 'ASC')->where('status', 1)->get();
        $theloai = theloai::orderBy('id', 'ASC')->get();
        $quocgia = quocgia::orderBy('id', 'ASC')->get();
        $phim = phim::with('danhmuc', 'quocgia', 'theloai')->where('slug', $slug)->where('status', 1)->first();
        $phimhot = phim::where('phim_hot', 1)->where('status', 1)->get();
        $sidebar_phimhot = phim::where('phim_hot', 1)->where('status', 1)->take(10)->get();
        $tapphim = tapphim::with('phim')->where('phim_id',$phim->id)->orderBy('tap', 'DESC')->take(3)->get();
        $tapphim_tapdau = tapphim::with('phim')->where('phim_id', $phim->id)->orderBy('tap', 'ASC')->first();
        return view('page.phim', compact('danhmuc', 'theloai', 'quocgia', 'phim', 'phimhot', 'sidebar_phimhot', 'tapphim', 'tapphim_tapdau'));
    }
    public function xemphim($slug, $tap)
    {
        if(isset($tap)){
            $tp = $tap;
        }else{
            $tp = 1;
        }
        $tp = substr($tap, 4, 2);


        $danhmuc = danhmuc::orderBy('id', 'ASC')->where('status', 1)->get();
        $theloai = theloai::orderBy('id', 'ASC')->get();
        $quocgia = quocgia::orderBy('id', 'ASC')->get();
        $phim = phim::with('danhmuc', 'quocgia', 'theloai', 'tapphim')->where('slug', $slug)->where('status', 1)->first();
        $phimhot = phim::where('phim_hot', 1)->where('status', 1)->get();
        $sidebar_phimhot = phim::where('phim_hot', 1)->where('status', 1)->take(10)->get();

        $tapphim = tapphim::where('phim_id', $phim->id)->where('tap',$tp)->first();
        // return response()->json($phim);
        return view('page.xemphim', compact('danhmuc', 'theloai', 'quocgia', 'phim', 'phimhot', 'sidebar_phimhot', 'tapphim', 'tp'));

    }
    public function tapphim()
    {
        return view('page.tapphim');
    }
    public function timkiem()
    {
        if(isset($_GET['timkiemtenphim'])){
            $search = $_GET['timkiemtenphim'];
            $danhmuc = danhmuc::orderBy('id', 'ASC')->where('status', 1)->get();
            $theloai = theloai::orderBy('id', 'ASC')->get();
            $quocgia = quocgia::orderBy('id', 'ASC')->get();

            $phim = phim::where('title','LIKE', '%'.$search.'%')->paginate(30);
            $sidebar_phimhot = phim::where('phim_hot', 1)->where('status', 1)->take(10)->get();
            return view('page.timkiem', compact('danhmuc', 'theloai', 'quocgia', 'search', 'phim', 'sidebar_phimhot'));
        }else{
            return redirect()->to('/');
        }

    }

}
