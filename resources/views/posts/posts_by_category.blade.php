@extends('layouts.content')

@section('main-content')

    @foreach($posts as $value)
        <div class="templatemo_post_wrapper">
            <div class="templatemo_post">
                <div class="post_title"><a href="{{URL::to('/blog-details')}}">{{$value->posts_title}}</a></div>
                <div class="post_info">
                    Posted by <a href="" target="_blank">{{$value->posts_author}}</a>, December 7, 2048 at 10:12 am, in <a href="#">{{$value->categories_name}}</a>
                </div>
                <div class="post_body">
                    <img src="{{asset($value->posts_image)}}" alt="free css template" border="1" />
                    <p>{{$value->posts_long_description}}</p>
                    <p>{{$value->posts_short_description}}</p>
                </div>
                <div class="post_comment">
                    <a href="#">No Comment</a>
                </div>
            </div>
        </div> <!-- End of a post-->
    @endforeach


@endsection
