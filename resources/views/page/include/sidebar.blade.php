<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
       <div class="section-bar clearfix">
          <div class="section-title">
             <span>Phim hot</span>

          </div>
       </div>
       <section class="tab-content">
          <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
             <div class="halim-ajax-popular-post-loading hidden"></div>
             <div id="halim-ajax-popular-post" class="popular-post">
                @foreach ($sidebar_phimhot as $key => $sidebar_hot)

                <div class="item post-37176">
                    <a href="{{route('phim',$sidebar_hot->slug)}}" title="{{$sidebar_hot->title}}">
                        <div class="item-link">
                            <img src="{{asset('uploads/phim/'.$sidebar_hot->image)}}" class="lazy post-thumb"/>
                            <span class="is_trailer">
                                @if ($sidebar_hot -> dophangiai)
                                        SD
                                @else
                                        HD
                                @endif
                            </span>
                        </div>
                        <p class="title">{{$sidebar_hot->title}}</p>
                    </a>
                    <div class="viewsCount" style="color: #9d9d9d;">{{$sidebar_hot->danhmuc->title}}</div>
                    <div class="viewsCount" style="color: #9d9d9d;">{{$sidebar_hot->quocgia->title}} </div>
                    <div class="viewsCount" style="color: #9d9d9d;">{{$sidebar_hot->year}}</div>
                    <div style="float: left;">
                        <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                        </span>
                    </div>
                </div>
                @endforeach


             </div>
          </div>
       </section>
       <div class="clearfix"></div>
    </div>
 </aside>

 <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
       <div class="section-bar clearfix">
          <div class="section-title">
              <span>Top Views</span>

          </div>
       </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
            <a class="nav-link filter-sidebar" id="home-tab" data-toggle="tab" href="#ngay" role="tab" aria-controls="home"
            aria-selected="true">Ngày</a>
            </li>
            <li class="nav-item">
            <a class="nav-link filter-sidebar" id="profile-tab" data-toggle="tab" href="#tuan" role="tab" aria-controls="profile"
            aria-selected="false">Tháng</a>
            </li>
            <li class="nav-item">
            <a class="nav-link filter-sidebar" id="contact-tab" data-toggle="tab" href="#thang" role="tab" aria-controls="contact"
            aria-selected="false">Năm</a>
            </li>
        </ul>
       <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade" id="ngay" role="tabpanel" aria-labelledby="home-tab">
            <div id="halim-ajax-popular-post" class="popular-post">
                {{-- <div class="item post-37176">
                   <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                      <div class="item-link">
                         <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                         <span class="is_trailer">Trailer</span>
                      </div>
                      <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                   </a>
                   <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                   <div style="float: left;">
                      <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                      <span style="width: 0%"></span>
                      </span>
                   </div>
                </div> --}}

                <span id="show1"></span>
             </div>
        </div>
        <div class="tab-pane fade" id="tuan" role="tabpanel" aria-labelledby="profile-tab">
            <div id="halim-ajax-popular-post" class="popular-post">
                <span id="show0"></span>
             </div>
        </div>
        <div class="tab-pane fade" id="thang" role="tabpanel" aria-labelledby="contact-tab">
            <div id="halim-ajax-popular-post" class="popular-post">
                <span id="show2"></span>

             </div>
        </div>
      </div>
       <div class="clearfix"></div>
    </div>
 </aside>








