<!DOCTYPE html>
<html lang="vi">
   <head>
      <meta charset="utf-8" />
      <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
      <meta name="theme-color" content="#234556">
      <meta http-equiv="Content-Language" content="vi" />
      <link rel="shortcut icon" href="{{asset('imgs/logoFilm.png')}}" type="image/x-icon" />
      <meta name="revisit-after" content="1 days" />
      <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
      <title>Fo</title>
      <meta property="og:locale" content="vi_VN" />
      <meta property="og:image:width" content="300" />
      <meta property="og:image:height" content="55" />

      {{-- links bootstrap --}}
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
      <link rel='stylesheet' id='bootstrap-css' href='{{asset("css/bootstrap.min.css?ver=5.7.2")}}' media='all' />
      <link rel='stylesheet' id='style-css' href='{{asset("css/style.css?ver=5.7.2")}}' media='all' />
      <link rel='stylesheet' id='wp-block-library-css' href='{{asset("css/style.min.css?ver=5.7.2")}}' media='all' />
      <script type='text/javascript' src='{{asset("js/jquery.min.js?ver=5.7.2")}}' id='halim-jquery-js'></script>
      <style type="text/css" id="wp-custom-css">
         .textwidget p a img {
         width: 100%;
         }
      </style>
      <style>
      #header .site-title {background:  no-repeat top left;background-size: contain;text-indent: -9999px;}
      </style>
   </head>

   {{-- body --}}
   <body class="home blog halimthemes halimmovies" data-masonry="">
        {{-- header --}}
      <header id="header">
         <div class="container">
            <div class="row" id="headwrap">
               <div class="col-md-3 col-sm-6 slogan">
                  <p class="site-title" style="background: url({{asset('imgs/logofilm1.png')}})  no-repeat top left;background-size: contain;text-indent: -9999px;">
                    <a class="logo" href="{{route('homeweb')}}" title="Fo ">Fo
                    </a>
                  </p>
               </div>
               <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
                  <div class="header-nav">
                     <div class="col-xs15">
                        <style>
                            ul#result{
                                position: absolute;
                                z-index: 9999;
                                background: #1b2d3c;
                                width: 94%;
                                padding: 10px;
                                margin-top: 2px;
                            }
                            .btn.btn-primary{
                                position: absolute;
                                right: -1%;
                                top: 2%;
                                bottom: 2%;
                                z-index: 10;
                            }
                        </style>
                            <form action="{{route('tim-kiem')}}" method="GET">
                              <div class="input-group col-xs-12">
                                 <input id="timkiemphim" type="text" name="timkiemtenphim" aria-describedby="basic-addon2" class="form-control" placeholder="Tìm kiếm..." autocomplete="off" required>


                                <button class="btn btn-primary">Tìm kiếm</button>
                              </div>
                            </form>


                        <ul class="list-group" id="result" style="display: none">

                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 hidden-xs">
                  <div id="get-bookmark" class="box-shadow"><i class="fa-solid fa-bookmark"></i><span> Bookmarks</span><span class="count">0</span></div>
                  <div id="bookmark-list" class="hidden bookmark-list-on-pc">
                     <ul style="margin: 0;"></ul>
                  </div>
               </div>
            </div>
         </div>
      </header>
      {{-- nav --}}
      <div class="navbar-container">
         <div class="container">
            <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#halim" aria-expanded="false">
                  <span class="sr-only">Menu</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <button type="button" class="navbar-toggle collapsed pull-right expand-search-form" data-toggle="collapse" data-target="#search-form" aria-expanded="false">
                  <span class="hl-search" aria-hidden="true"></span>
                  </button>
                  <button type="button" class="navbar-toggle collapsed pull-right get-bookmark-on-mobile">
                  Bookmarks<i class="fa-solid fa-bookmark"></i>
                  <span class="count">0</span>
                  </button>
                  <button type="button" class="navbar-toggle collapsed pull-right get-locphim-on-mobile">
                  <a href="javascript:;" id="expand-ajax-filter" style="color: #b6b5b1;">Lọc <i class="fas fa-filter"></i></a>
                  </button>
               </div>
               <div class="collapse navbar-collapse" id="halim">
                  <div class="menu-menu_1-container">
                     <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                        <li class="current-menu-item active"><a title="Trang Chủ" href="{{route('homeweb')}}">Trang Chủ</a></li>
                        {{-- danh muc --}}
                        @foreach ($danhmuc as $key => $dm )
                        <li class="mega"><a title="{{$dm -> title}}" href="{{ route('danhmuc', $dm -> slug) }}">{{$dm -> title}}</a></li>
                        @endforeach
                        {{-- the loai  --}}
                        <li class="mega dropdown">
                           <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Thể Loại <span class="caret"></span></a>
                           <ul role="menu" class=" dropdown-menu">
                                @foreach ($theloai as $key => $tl)
                                <li><a title="{{$tl -> title}}" href="{{ route('theloai', $tl -> slug) }}">{{$tl -> title}}</a></li>
                                @endforeach
                           </ul>
                        </li>
                        {{-- quoc gia --}}
                        <li class="mega dropdown">
                           <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Quốc Gia <span class="caret"></span></a>
                           <ul role="menu" class=" dropdown-menu">
                                @foreach ($quocgia as $key => $qg)
                                <li><a title="{{$qg -> title}}" href="{{route('quocgia', $qg -> slug)}}">{{$qg -> title}}</a></li>
                                @endforeach

                           </ul>
                        </li>
                        {{-- year --}}
                        <li class="mega dropdown">
                            <a title="Year" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Năm<span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                @for ($year=2000;$year<=2022;$year++)
                                <li><a title="{{$year}}" href="{{url('namphim/'.$year)}}">{{$year}}</a></li>
                                @endfor
                            </ul>
                         </li>
                     </ul>
                  </div>
                  {{-- <ul class="nav navbar-nav navbar-left" style="background:#000;">
                     <li><a href="#" onclick="locphim()" style="color: #ffed4d;">Lọc Phim</a></li>
                  </ul> --}}
               </div>
            </nav>
            <div class="collapse navbar-collapse" id="search-form">
               <div id="mobile-search-form" class="halim-search-form"></div>
            </div>
            <div class="collapse navbar-collapse" id="user-info">
               <div id="mobile-user-login"></div>
            </div>
         </div>
      </div>

      <div class="container">
         <div class="row fullwith-slider"></div>
      </div>
      <div class="container">
         @yield('content')
      </div>
      <div class="clearfix"></div>
      <footer id="footer" class="clearfix">
         <div class="container footer-columns">
            <div class="row container">
               <div class="widget about col-xs-12 col-sm-4 col-md-4">
                  <div class="footer-logo">
                     <img class="img-responsive" src="{{asset('imgs/logoFilm.png')}}" alt="Phim hay 2021- Xem phim hay nhất" />
                  </div>
                  Liên hệ QC: <a href="#" class="__cf_email__" data-cfemail="e5958d8c888d849ccb868aa58288848c89cb868a88">hungtt.21it@vku.udn.vn</a>
               </div>
            </div>
         </div>
      </footer>
      <div id='easy-top'></div>

      <script type='text/javascript' src='{{asset("js/bootstrap.min.js?ver=5.7.2")}}' id='bootstrap-js'></script>
      <script type='text/javascript' src='{{asset("js/owl.carousel.min.js?ver=5.7.2")}}' id='carousel-js'></script>
      <script type='text/javascript' src='{{asset("js/halimtheme-core.min.js?ver=1626273138")}}' id='halim-init-js'></script>

      <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0" nonce="I63GO9Jn">
        </script>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0" nonce="bh1sCewx"></script>







        {{-- tim kiem --}}
        <script type="text/javascript">
            $(document).ready(function(){
                $("#timkiemphim").keyup(function(){
                    $('#result').html('');
                    var timkiemten = $("#timkiemphim").val();
                    if(timkiemten != ''){

                        var expression = new RegExp(timkiemten, "i");
                        $.getJSON('/json/phim.json', function(data){
                            $.each(data, function(key, value){

                                if(value.title.search(expression) != -1){
                                    $('#result').css('display', 'inherit');
                                    $('#result').append('<li style="cursor:pointer; display: flex; max-height: 200px;" class="list-group-item link-class"><img alt="loi hinh anh" src="/uploads/phim/'+value.image+'" width="100" class=""/><div style="flex-direction: column; margin-left: 2px;"><h4 width="100%">'+value.title+'</h4><span style="display: -webkit-box; max-height: 8.2rem; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; white-space: normal; -webkit-line-clamp: 5; line-height: 1.6rem;" class="text-muted">| '+value.description+'</span></div></li>')
                                }
                            })
                        })
                    }else{
                        $('#result').css('display', 'none');
                    }
                })


                $('#result').on('click', 'li', function(){
                    var click_text = $(this).text().split('|');
                    $('#timkiemphim').val($.trim(click_text[0]));
                    $('#result').html('');
                    $('#result').css('display', 'none');
                })
            })

        </script>




      <script>

        $('.filter-sidebar').click(function(){
            var href = $(this).attr('href');
            if(href == '#ngay'){
                var value = 0
            }else if(href == '#tuan'){
                var value = 1
            }else{
                var value = 2
            }
            $.ajax({
                url: "{{url('/filter-topview-phim')}}",
                method: 'GET',
                data:{value:value},
                success:function(data){
                    $('#show'+value).html(data);
                }
            });
        })
      </script>


      {{-- <script>
         $(document).ready(function(){
             var value = 0;

             $.ajax({
                    url: "{{url('/filter-topview-phim')}}",
                    method: 'GET',
                    data:{value:value},
                    success:function(data){
                        $('#show'+value).html(data);
                    }
             });
         });
      </script> --}}

      <style>#overlay_mb{position:fixed;display:none;width:100%;height:100%;top:0;left:0;right:0;bottom:0;background-color:rgba(0, 0, 0, 0.7);z-index:99999;cursor:pointer}#overlay_mb .overlay_mb_content{position:relative;height:100%}.overlay_mb_block{display:inline-block;position:relative}#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:600px;height:auto;position:relative;left:50%;top:50%;transform:translate(-50%, -50%);text-align:center}#overlay_mb .overlay_mb_content .cls_ov{color:#fff;text-align:center;cursor:pointer;position:absolute;top:5px;right:5px;z-index:999999;font-size:14px;padding:4px 10px;border:1px solid #aeaeae;background-color:rgba(0, 0, 0, 0.7)}#overlay_mb img{position:relative;z-index:999}@media only screen and (max-width: 768px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:400px;top:3%;transform:translate(-50%, 3%)}}@media only screen and (max-width: 400px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:310px;top:3%;transform:translate(-50%, 3%)}}</style>

      <style>
         #overlay_pc {
         position: fixed;
         display: none;
         width: 100%;
         height: 100%;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         background-color: rgba(0, 0, 0, 0.7);
         z-index: 99999;
         cursor: pointer;
         }
         #overlay_pc .overlay_pc_content {
         position: relative;
         height: 100%;
         }
         .overlay_pc_block {
         display: inline-block;
         position: relative;
         }
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 600px;
         height: auto;
         position: relative;
         left: 50%;
         top: 50%;
         transform: translate(-50%, -50%);
         text-align: center;
         }
         #overlay_pc .overlay_pc_content .cls_ov {
         color: #fff;
         text-align: center;
         cursor: pointer;
         position: absolute;
         top: 5px;
         right: 5px;
         z-index: 999999;
         font-size: 14px;
         padding: 4px 10px;
         border: 1px solid #aeaeae;
         background-color: rgba(0, 0, 0, 0.7);
         }
         #overlay_pc img {
         position: relative;
         z-index: 999;
         }
         @media only screen and (max-width: 768px) {
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 400px;
         top: 3%;
         transform: translate(-50%, 3%);
         }
         }
         @media only screen and (max-width: 400px) {
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 310px;
         top: 3%;
         transform: translate(-50%, 3%);
         }
         }
      </style>

      <style>
         .float-ck { position: fixed; bottom: 0px; z-index: 9}
         * html .float-ck /* IE6 position fixed Bottom */{position:absolute;bottom:auto;top:expression(eval (document.documentElement.scrollTop+document.docum entElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0))) ;}
         #hide_float_left a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;float: left;}
         #hide_float_left_m a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;}
         span.bannermobi2 img {height: 70px;width: 300px;}
         #hide_float_right a { background: #01AEF0; padding: 5px 5px 1px 5px; color: #FFF;float: left;}
      </style>
   </body>
</html>
