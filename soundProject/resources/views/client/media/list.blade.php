@extends('layout.client')

@section('content')
    <div class="under_header">
        <img src="{{ url('/client/images/assets/breadcrumbs10.png') }}" alt="#">
    </div><!-- under header -->

    <div class="page-content back_to_up">

        <div class="row row-fluid clearfix mbf">
            <div class="span12 posts">
                <div class="def-block">
                    <ul class="tabs">
                        <li>
                            <h2 href="#" class="active">MP3's</h2>
                        </li>
                    </ul><!-- tabs -->

                    <ul class="tabs-content">
                        <li id="Latest" class="active">
                            
                                <div class="post no-border no-mp clearfix">
                                    <ul class="tab-content-items">
                                        @foreach ($medias as $item)
                                        <li class="grid_6">
                                            <a class="m-thumbnail" href="{{route('clientMedia.single',['id'=>$item->id,'mediaId'=>$mediaId])}}"><img width="50"
                                                    height="50" src="{{url($item->mediaPhoto)}}" alt="#"></a>
                                            <h3><a href="">{{$item->mediaName}}</a></h3>
                                            <span> Articit : {{$item->artist->name}} </span>
                                            <span> lyricist : {{$item->lyricist->name}} </span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div><!-- latest -->
                        </li><!-- tab content -->

                    </ul><!-- end tabs -->

                </div><!-- def block -->
            </div><!-- span8 posts -->

            {{-- <div class="span4 sidebar">
            <div class="def-block widget">
                <h4> Ads </h4><span class="liner"></span>
                <div class="widget-content tac">
                    <a href="#" title="Advertise"><img src="images/ads1.gif" alt="#"></a>
                </div><!-- widget content -->
            </div><!-- def block widget ads -->

            <div class="def-block widget">
                <h4> Featured Videos </h4><span class="liner"></span>
                <div class="widget-content row-fluid">
                    <div class="videos clearfix flexslider">
                        <ul class="slides">
                            <li class="featured-video">
                                <a href="video_single_wide.html">
                                    <img src="images/assets/video1.jpg" alt="#">
                                    <i class="icon-play-sign"></i>
                                    <h3>I Know You Want Me</h3>
                                    <span>Fitbull</span>
                                </a>
                            </li><!-- slide -->
                            <li class="featured-video">
                                <a href="video_single_wide.html">
                                    <img src="images/assets/video2.jpg" alt="#">
                                    <i class="icon-play-sign"></i>
                                    <h3>I Like It</h3>
                                    <span>Enrique</span>
                                </a>
                            </li><!-- slide -->
                            <li class="featured-video">
                                <a href="video_single_wide.html">
                                    <img src="images/assets/video3.jpg" alt="#">
                                    <i class="icon-play-sign"></i>
                                    <h3>Tommorow</h3>
                                    <span>Dj Michele</span>
                                </a>
                            </li><!-- slide -->
                        </ul>
                    </div>
                </div><!-- widget content -->
            </div><!-- def block widget videos -->

        </div><!-- span4 sidebar --> --}}
        </div><!-- row clearfix -->
    </div><!-- end page content -->
@endsection
