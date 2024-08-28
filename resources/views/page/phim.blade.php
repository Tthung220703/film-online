@extends('welcome')
@section('content')
<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
       <div class="panel-heading">
          <div class="row">
             <div class="col-xs-6">
                <div class="yoast_breadcrumb hidden-xs">
                  <span>
                     <span>
                        <a href="{{route('danhmuc',$phim->danhmuc->slug)}}">{{$phim -> danhmuc -> title}}</a> »
                        <span>
                           <a href="{{route('quocgia',$phim->quocgia->slug)}}">{{$phim -> quocgia -> title}}</a> »
                           <a href="{{route('namphim',$phim->year)}}">{{$phim -> year}}</a> »
                           <span class="breadcrumb_last" aria-current="page">
                              {{$phim -> title}}
                           </span>
                        </span>
                     </span>
                  </span>
                  </div>
             </div>
          </div>
       </div>
       <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
          <div class="ajax"></div>
       </div>
    </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
       <section id="content" class="test">
          <div class="clearfix wrap-content">
             <div class="halim-movie-wrapper">
                <div class="title-block">
                   {{-- <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                      <div class="halim-pulse-ring"></div>
                   </div> --}}
                   <div class="title-wrapper" style="font-weight: bold;">
                     <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$phim -> title}}</h1>
                     <h2 class="movie-title title-2" style="font-size: 12px;">{{$phim -> title_es}}</h2>
                   </div>
                </div>
                <div class="movie_info col-xs-12">
                   <div class="movie-poster col-md-3">
                      <img class="movie-thumb" src="{{asset('uploads/phim/'.$phim->image)}}">
                      <div class="bwa-content">
                         <div class="loader"></div>
                         <a href="{{url('xem-phim/'.$phim->slug.'/tap-'.$tapphim_tapdau->tap)}}" class="bwac-btn">
                         <i class="fa fa-play"></i>
                         </a>
                      </div>
                   </div>
                   <div class="film-poster col-md-9">
                      {{-- <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$phim -> title}}</h1>
                      <h2 class="movie-title title-2" style="font-size: 12px;">{{$phim -> title_es}}</h2> --}}
                      <ul class="list-info-group">
                         <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">
                            @if ($phim -> dophangiai==0)
                                HD
                            @elseif($phim-> dophangiai ==1)
                                SD
                            @endif
                        </span><span class="episode">
                            @if ($phim -> phude==0)
                                Vietsub
                            @else
                                Thuyết minh
                            @endif
                        </span></li>
                         <li class="list-info-group-item"><span>Thời lượng</span> : {{$phim -> thoiluong}}</li>
                         <li class="list-info-group-item"><span>Số tập</span> : {{$phim -> sotap}} tập</li>
                         <li class="list-info-group-item"><span>Năm phim</span> : {{$phim -> year}}</li>
                         <li class="list-info-group-item"><span>Danh muc</span> :
                             <a href="{{route('danhmuc',$phim->danhmuc->slug)}}" rel="category tag">{{$phim -> danhmuc -> title}}</a>
                         </li>
                         <li class="list-info-group-item"><span>Thể loại</span> :
                            <a href="{{route('theloai',$phim->theloai->slug)}}" rel="category tag">{{$phim -> theloai -> title}}</a>
                        </li>
                         <li class="list-info-group-item"><span>Quốc gia</span> :
                            <a href="{{route('quocgia',$phim->quocgia->slug)}}" rel="tag">{{$phim -> quocgia -> title}}</a>
                        </li>
                        <li class="list-info-group-item"><span>Tập phim mới nhất</span> :
                           @foreach ($tapphim as $key=>$value)
                              <style>
                                 .btn-chontap{
                                    background-color: #053151;
                                    padding: 4px 7px;
                                    text-decoration: none;
                                    color: #fff;
                                    border-radius: 5px;

                                 }
                              </style>
                           <a class="btn-chontap" href="{{url('xem-phim/'.$value->phim->slug.'/tap-'.$value->tap)}}" rel="tag">
                                  {{$value -> tap}}
                           </a>
                           @endforeach
                       </li>
                       <li class="list-info-group-item">
                           @php
                              $urlphim = Request::url();
                           @endphp
                           <div class="fb-like" data-href="{{$urlphim}}"
                              data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true">
                           </div>
                       </li>
                      </ul>
                      <div class="movie-trailer hidden"></div>
                   </div>
                </div>
             </div>
             <div class="clearfix"></div>
             <div id="halim_trailer"></div>
             <div class="clearfix"></div>
             <div class="section-bar clearfix">
                <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
             </div>
             <div class="entry-content htmlwrap clearfix">
                <div class="video-item halim-entry-box">
                   <article id="post-38424" class="item-content">
                      {{$phim -> description}}
                   </article>

                </div>
             </div>
          </div>
       </section>
        <section class="related-movies">
          <div id="halim_related_movies-2xx" class="wrap-slider">
             <div class="section-bar clearfix">
                <h3 class="section-title"><span>Trailer Phim</span></h3>
             </div>
             {{-- <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">



             </div> --}}
             <div id="halim_related_movies-2xx" class="wrap-slider">
                    <div class="section-bar clearfix">

                    </div>
                    <iframe width="100%" height="450px" src="https://www.youtube.com/embed/{{$phim -> trailer}}" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
       </section>
       <section class="related-movies" >
        <div id="halim_related_movies-2xx" class="wrap-slider">
           <div class="section-bar clearfix">
              <h3 class="section-title"><span>Bình luận Facebook</span></h3>
           </div>
           {{-- <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">



           </div> --}}
           @php
               $urlphim = Request::url();
           @endphp
           <div id="halim_related_movies-2xx" class="wrap-slider" style="background-color: rgb(204, 217, 237)">
                <div class="fb-comments" data-href="{{$urlphim}}" data-width="100%" data-numposts="10" >
                </div>
            </div>
        </section>
       <section class="related-movies">
          <div id="halim_related_movies-2xx" class="wrap-slider">
             <div class="section-bar clearfix">
                <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
             </div>
             {{-- <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">



             </div> --}}
             <div id="halim_related_movies-2xx" class="wrap-slider">
                    <div class="section-bar clearfix">

                    </div>
                <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                    @foreach ($phimhot as $key => $hot)
                     <article class="thumb grid-item post-38498">
                      <div class="halim-item">
                         <a class="halim-thumb" href="{{route('phim', $hot->slug)}}" title="{{$hot->title}}">
                            <figure><img class="lazy img-responsive" src="{{asset('uploads/phim/'.$hot->image)}}"></figure>
                            <span class="status">
                                @if ($hot -> dophangiai==0)
                                    HD
                                @else
                                    SD
                                @endif
                            </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                @if ($hot -> phude==0)
                                    Vietsub
                                @else
                                    Thuyết minh
                                @endif
                            </span>
                            <div class="icon_overlay"></div>
                            <div class="halim-post-title-box">
                               <div class="halim-post-title ">
                                  <p class="entry-title">{{$hot->title}}</p>
                                  <p class="original_title">{{$hot->title_es}}</p>
                               </div>
                            </div>
                         </a>
                      </div>
                   </article>
                   @endforeach
                </div>
                <script>
                   $(document).ready(function($) {
                   var owl = $('#halim_related_movies-2');
                   owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 5}}})});
                </script>
             </div>
             <script>
                jQuery(document).ready(function($) {
                var owl = $('#halim_related_movies-2');
                owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
             </script>
          </div>
       </section>
    </main>
    {{-- sidebar --}}
    @include('page.include.sidebar')
 </div>
@endsection
