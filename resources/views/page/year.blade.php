@extends('welcome')
@section('content')
<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
       <div class="panel-heading">
          <div class="row">
             <div class="col-xs-6">
                <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">Phim thuoc nam</a> » <span class="breadcrumb_last" aria-current="page">{{$year}}</span></span></span></div>
             </div>
          </div>
       </div>
       <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
          <div class="ajax"></div>
       </div>
    </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
       <section>
          <div class="section-bar clearfix">
             <h1 class="section-title"><span>Nam : {{$year}}</span></h1>
          </div>
          <div class="halim_box">

            @foreach ($phim as $key => $mv)
            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
               <div class="halim-item">
                  <a class="halim-thumb" href="{{route('phim', $mv -> slug)}}" title="VŨNG LẦY PHẦN 1">
                     <figure><img class="lazy img-responsive" src="{{asset('uploads/phim/'.$mv->image)}}"></figure>
                     <span class="status">
                        @if ($mv -> dophangiai==0)
                                HD
                        @else
                                SD
                        @endif
                    </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                        @if ($mv -> phude==0)
                            Vietsub
                        @else
                            Thuyết minh
                        @endif
                    </span>
                     <div class="icon_overlay"></div>
                     <div class="halim-post-title-box">
                        <div class="halim-post-title ">
                           <p class="entry-title">{{$mv->title}}</p>
                           <p class="original_title">{{$mv->title_es}}</p>
                        </div>
                     </div>
                  </a>
               </div>
            </article>
            @endforeach

          </div>
          <div class="clearfix"></div>
          <div class="text-center">
             <ul class='page-numbers'>
                {{-- <li><span aria-current="page" class="page-numbers current">1</span></li>
                <li><a class="page-numbers" href="">2</a></li>
                <li><a class="page-numbers" href="">3</a></li>
                <li><span class="page-numbers dots">&hellip;</span></li>
                <li><a class="page-numbers" href="">55</a></li>
                <li><a class="next page-numbers" href=""><i class="hl-down-open rotate-right"></i></a></li> --}}
                {!! $phim -> links('pagination::bootstrap-4')  !!}
             </ul>
          </div>
       </section>
    </main>
    {{-- sidebar --}}
    @include('page.include.sidebar')
 </div>
@endsection
