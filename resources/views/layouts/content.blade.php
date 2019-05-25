<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Old Blog Template - Free CSS Layout</title>
<meta name="keywords" content="free css layout, old blog template, CSS, HTML" />
<meta name="description" content="Old Blog Template - free website template provided by TemplateMo.com" />
<link href="{{asset('old-blog/templatemo_style.css')}}" rel="stylesheet" type="text/css" />
<!--  Designed by w w w . t e m p l a t e m o . c o m  -->
<link rel="stylesheet" type="text/css" href="{{asset('old-blog/tabcontent.css')}}" />
<script type="text/javascript" src="{{asset('old-blog/tabcontent.js')}}">
/***********************************************
* Tab Content script v2.2- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/
</script>
    <!-- Bootstrap CSS
   ================================================== -->
    <link rel="stylesheet" href="{{asset('/old-blog/css/bootstrap.min.css')}}">

    <!-- Animate CSS
   ================================================== -->
    <link rel="stylesheet" href="{{asset('old-blog/css/animate.min.css')}}">

    {{--<link rel="stylesheet" href="{{URL::to('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css')}}" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">--}}


    <!-- Font Icons
   ================================================== -->
    <link rel="stylesheet" href="{{asset('old-blog/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('old-blog/css/et-line-font.css')}}">

    <!-- Nivo Lightbox CSS
   ================================================== -->
    <link rel="stylesheet" href="{{asset('old-blog/css/nivo-lightbox.css')}}">
    <link rel="stylesheet" href="{{asset('old-blog/css/nivo_themes/default/default.css')}}">

    <!-- Owl Carousel CSS
   ================================================== -->
    <link rel="stylesheet" href="{{asset('old-blog/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('old-blog/css/owl.carousel.css')}}">

    <!-- BxSlider CSS
   ================================================== -->
    <link rel="stylesheet" href="{{asset('old-blog/css/bxslider.css')}}">

    <!-- Main CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('old-blog/css/style.css')}}">

    <!-- Google web font
   ================================================== -->
    <link href='{{URL::to("https://fonts.googleapis.com/css?family=Raleway:700")}}' rel='stylesheet' type='text/css'>

    <script src="{{asset('old-blog/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="{{asset('https://fonts.gstatic.com')}}">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Nunito')}}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{asset('old-blog/css/app.css') }}" rel="stylesheet">

    <!--contact form css-->
    <link rel="stylesheet" type="text/css" href="{{asset('contact-form/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('contact-form/css/main.css')}}">
</head>
<body>

    <div id="templatemo_header_panel">
        <div id="templatemo_title_section">
                <h1>OLD BLOG</h1>
      Your tagline goes here</div>
    </div> <!-- end of templatemo header panel -->
    
    <div id="templatemo_menu_panel">
    	<div id="templatemo_menu_section">
            <ul>
                <li><a href="{{URL::to('/index')}}"  class="current">Home</a></li>
                <li><a href="{{URL::to('/gallery')}}"  class="current">Gallery</a></li>
                <li><a href="{{URL::to('/categories')}}"  class="current">Categories</a></li>
                <li><a href="{{URL::to('/about')}}"  class="current">About</a></li> 
                <li><a href="{{URL::to('/contact')}}"  class="current">Contact</a></li>                     
            </ul> 
		</div>
    </div> <!-- end of menu -->
    
	<div id="templatemo_content_container">
        <div id="templatemo_content">
            <div id="templatemo_content_left">
				
                @yield('main-content')
                
            </div> <!-- end of content left -->
        
            <div id="templatemo_content_right">
            
            	<div class="templatemo_right_section">
					<div class="tag_section">
                        <ul id="countrytabs" class="shadetabs">
                            <li><a href="#" rel="search" class="selected">Search</a></li>                
                            <li><a href="#" rel="category">Category</a></li>
                            {{--<li><a href="#" rel="archive">Archive</a></li>--}}
                        </ul>
					</div>
				
                    <div class="tabcontent_section">
                        <div id="search" class="tabcontent">
                            <form method="get" action="#">
                                <input class="inputfield" name="searchkeyword" type="text" id="searchkeyword"/>
                                {{--<input type="submit" name="submit" class="button" value="Search" />--}}
                            </form>                    
                        </div>
					
                        <div id="category" class="tabcontent">
                            <ul>
                                @foreach($data as $content)
                                    <li><a href="{{URL::to('/blog-posts/'.$content->categories_name)}}">{{$content->categories_name}}</a></li>
                                @endforeach
                            </ul>                        
                        </div>
					</div>

					<script type="text/javascript">
                    
                    var countries=new ddtabcontent("countrytabs")
                    countries.setpersist(true)
                    countries.setselectedClassTarget("link") //"link" or "linkparent"
                    countries.init()
                    
                    </script> <!--- end of tag -->
                </div>
            	
                
                <div class="templatemo_right_section">
                	<h2>Popular Posts</h2>
					<ul>
                        @foreach($p_post as $value)
                            <li><a href="#">{{$value->posts_title}}</a>({{$value->posts_hit_count}})</li>
                        @endforeach
                    </ul>    
                </div>
                
                <div class="templatemo_right_section">
	                <h2>Recent Posts</h2>
                	<ul>
                        @foreach($recent as $value)
                            <li><a href="{{URL::to('blog-details/'.$value->posts_id)}}">{{$value->posts_title}}</a></li>
                        @endforeach
                  </ul>
                </div>
                
            </div> <!-- end of right content -->
	    </div> <!-- end of content -->
    </div> <!-- end of content container -->

	<div id="templatemo_bottom_panel">
    	<div id="templatemo_bottom_section">
            <div class="templatemo_bottom_section_content">
                <h3>Partner Links</h3>
                <ul>
                    <li><a href="#">Mauris congue felis at nisi</a></li>
                    <li><a href="#">Donec mattis rhoncus mi</a></li>
                    <li><a href="#">Maecenas adipiscing</a></li>
                    <li><a href="#">Nunc blandit orci</a></li>
                    <li><a href="#">Cum sociis natoque</a></li>
                </ul>
            </div>
            
            <div class="templatemo_bottom_section_content">
                <h3>Other Links</h3>
                 <ul>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">About</a></li>                 
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            
            <div class="templatemo_bottom_section_content">
                <h3>About this blog</h3>
                <p>Vivamus laoreet pharetra eros. In quam nibh, placerat ac, porta ac, molestie non, purus. Curabitur sem ante, condimentum non, cursus quis, eleifend non, libero. Nunc a nulla.</p>
                <a href="http://validator.w3.org/check?uri=referer"><img style="border:0;width:88px;height:31px" src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" width="88" height="31" vspace="8" border="0" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px"  src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" vspace="8" border="0" /></a> 
          </div>
            
        </div>
    </div> <!-- end of templatemo bottom panel -->
    
    <div id="templatemo_footer_panel">
    	<div id="templatemo_footer_section">
			Copyright © 2048 <a href="#">Your Company Name</a> | 
            <a href="http://www.iwebsitetemplate.com" target="_parent">Website Templates</a> by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
        </div>
    </div>
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>
