@extends('layout.client')

@section('content')
    {{-- ___________ Audio __________ --}}
    @if ($mediaId == 1)
        <div class="under_header">
            <img src="images/assets/breadcrumbs12.png" alt="#">
        </div><!-- under header -->

        <div class="page-content back_to_up">
            <div class="row clearfix mb">
                <div class="breadcrumbIn">
                    <ul>
                        <li><a href="index-2.html" class="toptip" title="Homepage"> <i class="icon-home"></i> </a></li>
                        <li><a href="mp3s.html"> MP3s </a></li>
                        <li><a href="mp3s.html"> Alexander Doe </a></li>
                        <li> Album Missing You </li>
                    </ul>
                </div><!-- breadcrumb -->
            </div><!-- row -->

            <div class="row row-fluid clearfix mbf">
                <div class="posts">
                    <div class="def-block">
                        <div class="post row-fluid clearfix">
                            <div class="music-player-list wide-mp3 mbf clearfix"></div><!-- Player -->

                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                                cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id
                                est laborum et dolorum fuga. Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to make a type
                                specimen book. It has survived not only five centuries, but also the leap into electronic
                                typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                                release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                                publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                            <p>
                                <span> Tags: </span>
                                <a href="#" class="#"> Alexander doe </a>,
                                <a href="#" class="#"> Remix </a>
                            </p><!-- tags -->

                            <div class="meta">
                                <span> <i class="icon-user mi"></i> Admin </span>
                                <span> <i class="icon-time mi"></i>August 20, 2022 2:00 AM </span>
                            </div><!-- meta -->


                            <div class="like-post">
                                <div id="fb-root"></div>
                                <script>
                                    (function(d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id)) return;
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = "../../../connect.facebook.net/en_US/all.js#xfbml=1";
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));
                                </script>
                                <div class="fb-like" data-href="http://developers.facebook.com/docs/reference/plugins/like"
                                    data-width="80" data-layout="button_count" data-show-faces="false" data-send="false">
                                </div>
                            </div><!-- like -->
                        </div><!-- post -->

                        <!-- Disqus Comment Form -->
                        <div id="disqus_thread"></div>
                        <script type="text/javascript">
                            /* <![CDATA[ */
                            var disqus_shortname = 'remixtemplate';
                            (function() {
                                var dsq = document.createElement('script');
                                dsq.type = 'text/javascript';
                                dsq.async = true;
                                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                            })();
                            /* ]]> */
                        </script><noscript>Please enable JavaScript to view the <a
                                href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        <!-- Disqus Comment Form -->

                    </div><!-- def block -->
                </div><!-- span8 posts -->

            </div><!-- row clearfix -->
        </div><!-- end page content -->

        
    @endif

    {{-- ___________ Video __________ --}}
    @if ($mediaId == 2)
        <div class="under_header">
            <img src="images/assets/breadcrumbs2.png" alt="#">
        </div><!-- under header -->

        <div class="page-content back_to_up">
            <div class="row clearfix mb">
                <div class="breadcrumbIn">
                    <ul>
                        <li><a href="index-2.html" class="toptip" title="Homepage"> <i class="icon-home"></i> </a></li>
                        <li><a href="videos.html"> Videos </a></li>
                        <li> Video Single Wide </li>
                    </ul>
                </div><!-- breadcrumb -->
            </div><!-- row -->

            <div class="row row-fluid clearfix mbf">
                <div class="posts">
                    <div class="def-block">
                        <div class="post row-fluid clearfix">
                            {{-- <iframe src="https://player.vimeo.com/video/72456426?title=1&amp;byline=1&amp;portrait=1"
                                height="500"></iframe> --}}
                                
                            <iframe data-href="{{url($media->mediaURL)}}"
                            height="500"></iframe>

                            <h3 class="post-title"> <a href="blog-single_half.html">Neque porro quisquam est qui dolorem
                                    ipsum quia dolor sit amet</a> </h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                                cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id
                                est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam
                                libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod
                                maxime placeat facere possimus. At vero eos et accusamus et iusto odio dignissimos ducimus
                                qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia
                                deserunt mollitia animi.</p>

                            <p>
                                <span> Tags: </span>
                                <a href="#" class="#"> video </a>,
                                <a href="#" class="#"> player </a>,
                                <a href="#" class="#"> youtube </a>,
                                <a href="#" class="#"> vimeo </a>
                            </p><!-- tags -->

                            <div class="meta">
                                <span> <i class="icon-user mi"></i> Admin </span>
                                <span> <i class="icon-time mi"></i>August 20, 2022 2:00 AM </span>
                            </div><!-- meta -->


                            <div class="like-post">
                                <div id="fb-root"></div>
                                <script>
                                    (function(d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id)) return;
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = "../../../connect.facebook.net/en_US/all.js#xfbml=1";
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));
                                </script>
                                <div class="fb-like" data-href="https://developers.facebook.com/docs/reference/plugins/like"
                                    data-width="80" data-layout="button_count" data-show-faces="false" data-send="false">
                                </div>
                            </div><!-- like -->
                        </div><!-- post -->

                        <div class="post-links clearfix">
                            <a class="fll" href="blog-single-video.html" title="#"><i
                                    class="icon-long-arrow-left"></i> Nemo enim ipsam voluptatem quia voluptas sit</a>
                            <a class="flr" href="blog-single-slider.html" title="#">Neque porro quisquam est, qui <i
                                    class="icon-long-arrow-right"></i></a>
                        </div><!-- post links -->

                        <!-- Disqus Comment Form -->
                        <div id="disqus_thread"></div>
                        <script type="text/javascript">
                            /* <![CDATA[ */
                            var disqus_shortname = 'remixtemplate';
                            (function() {
                                var dsq = document.createElement('script');
                                dsq.type = 'text/javascript';
                                dsq.async = true;
                                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                            })();
                            /* ]]> */
                        </script><noscript>Please enable JavaScript to view the <a
                                href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        <!-- Disqus Comment Form -->

                    </div><!-- def block -->
                </div><!-- span8 posts -->

            </div><!-- row clearfix -->
        </div><!-- end page content -->
    @endif


    {{-- ___________ if else __________ --}}
    @if ($mediaId != 1 and $mediaId != 2)
        <script>
            window.location.href = '/'
        </script>
    @endif
@endsection
