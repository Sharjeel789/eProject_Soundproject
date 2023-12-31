@extends('layout.client')

@section('content')

		<!-- Start Revolution Slider -->
        <div class="sliderr">
            <div class="tp-banner-container">
                <div class="tp-banner" >
                    <ul>
                        <!-- SLIDE  -->
                        <li data-transition="random" data-slotamount="7" data-masterspeed="5000" >
                            <!-- MAIN IMAGE -->
                            <img src="{{url('/client/images/slides/slider3.jpg')}}"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            <!-- LAYERS -->
                            <div class="tp-caption fade"
                                data-x="566"
                                data-y="306"
                                data-hoffset="0"
                                data-speed="700"
                                data-start="800"
                                data-easing="Back.easeInOut"
                                data-endspeed="300"
                                style="z-index: 11"><img src="{{url('/client/images/slides/slide1-cap2.png')}}" alt=""></div>

                            <div class="tp-caption lfb"
                                data-x="566"
                                data-y="305"
                                data-hoffset="0"
                                data-speed="700"
                                data-start="1200"
                                data-easing="Back.easeInOut"
                                data-endspeed="300"
                                style="z-index: 11"><img src="{{url('/client/images/slides/slide1-cap2.png')}}" alt=""></div>

                            <div class="tp-caption lft"
                                data-x="741"
                                data-y="305"
                                data-hoffset="0"
                                data-speed="700"
                                data-start="1200"
                                data-easing="Back.easeInOut"
                                data-endspeed="300"
                                style="z-index: 11"><img src="{{url('/client/images/slides/slide1-cap3.png')}}" alt=""></div>

                            <div class="tp-caption lfb"
                                data-x="711"
                                data-y="374"
                                data-hoffset="0"
                                data-speed="700"
                                data-start="2000"
                                data-easing="Back.easeInOut"
                                data-endspeed="300"
                                style="z-index: 11"><img src="{{url('/client/images/slides/slide1-cap4.png')}}" alt=""></div>

                            <div class="tp-caption lft"
                                data-x="714"
                                data-y="374"
                                data-hoffset="0"
                                data-speed="700"
                                data-start="2000"
                                data-easing="Back.easeInOut"
                                data-endspeed="300"
                                style="z-index: 11"><img src="{{url('/client/images/slides/slide1-cap5.png')}}" alt=""></div>
                        </li>

                        <!-- SLIDE  -->
                        <li data-transition="random" data-slotamount="7" data-masterspeed="5000" >
                            <!-- MAIN IMAGE -->
                            <img src="{{url('/client/images/slides/slider9.jpg')}}"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            <!-- LAYERS -->
                            <div class="tp-caption modern_big_bluebg randomrotate"
                                data-x="603"
                                data-y="384"
                                data-hoffset="0"
                                data-speed="700"
                                data-start="1200"
                                data-easing="Back.easeInOut"
                                data-endspeed="300"
                                style="z-index: 11">Responsive Design</div>

                            <div class="tp-caption modern_big_redbg randomrotate"
                                data-x="701"
                                data-y="328"
                                data-hoffset="0"
                                data-speed="700"
                                data-start="1700"
                                data-easing="Back.easeInOut"
                                data-endspeed="300"
                                style="z-index: 11">Retina Ready</div>
                        </li>

                        <!-- SLIDE  -->
                        <li data-transition="random" data-slotamount="7" data-masterspeed="5000" >
                            <!-- MAIN IMAGE -->
                            <img src="{{url('/client/images/slides/slider3.jpg')}}"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            <!-- LAYERS -->
                            <div class="tp-caption modern_big_redbg randomrotate"
                                data-x="560"
                                data-y="253"
                                data-hoffset="0"
                                data-speed="700"
                                data-start="1000"
                                data-easing="Back.easeInOut"
                                data-endspeed="300"
                                style="z-index: 11">Revolution Slider</div>

                            <div class="tp-caption modern_m_bluebg randomrotate"
                                data-x="560"
                                data-y="310"
                                data-hoffset="0"
                                data-speed="700"
                                data-start="1500"
                                data-easing="Back.easeInOut"
                                data-endspeed="300"
                                style="z-index: 11">Awesome MusicPlayer</div>

                            <div class="tp-caption modern_m_bluebg randomrotate"
                                data-x="560"
                                data-y="355"
                                data-hoffset="0"
                                data-speed="700"
                                data-start="2000"
                                data-easing="Back.easeInOut"
                                data-endspeed="300"
                                style="z-index: 11">Wonderful Gallery</div>

                            <div class="tp-caption modern_m_bluebg randomrotate"
                                data-x="560"
                                data-y="400"
                                data-hoffset="0"
                                data-speed="700"
                                data-start="2500"
                                data-easing="Back.easeInOut"
                                data-endspeed="300"
                                style="z-index: 11">Seo Optimized</div>

                            <div class="tp-caption modern_m_bluebg randomrotate"
                                data-x="560"
                                data-y="445"
                                data-hoffset="0"
                                data-speed="700"
                                data-start="3000"
                                data-easing="Back.easeInOut"
                                data-endspeed="300"
                                style="z-index: 11">and Much More ...</div>
                        </li>

                    </ul><!-- End Slides -->
                    <div class="tp-bannertimer"></div>										
                </div>					
            </div>
        </div>
    <!-- End Revolution Slider -->

    <div class="page-content">

        {{-- _______________ Music _______________ --}}
        <div class="row clearfix mbf">
            <div class="music-player-list"></div>
        </div><!-- row music player -->

        {{-- _______________ Music _______________ --}}
        <div class="row row-fluid clearfix mbf">
            <div class="posts">
                <div class="def-block">
                    <ul class="tabs">
                        <li><a href="#Latest" class="active"> Our Videos </a></li>
                    </ul><!-- tabs -->

                    <ul class="tabs-content">
                        <li id="Latest" class="active">
                            <div class="video-grid">
                                @foreach ($videos as $item)
                                    {{-- <a href="{{route('single.media',['id' => $iem->id , 'typeId' => 2])}}" class="grid_3"> --}}
                                    <a href="#" class="grid_3">
                                        <img src="{{url($item->mediaPhoto)}}" alt="#">
                                        <span><strong>Avril Lopez</strong>Daredevil (video version)</span>
                                    </a>
                                @endforeach
                            </div><!-- video grid -->
                        </li><!-- tab content -->
                    </ul>
                    <ul>
                        <li><button class="btn btn-primary">Click Here for More</button></li>
                    </ul>
                </div>
            </div>
        </div>


    </div><!-- end page content -->


@endsection