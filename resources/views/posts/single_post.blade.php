@extends('layouts.content')

@section('main-content')

    <h3 align="center" style="color: red">
        <?php
        $exception = Session::get('exception');
        if (isset($exception)) {
            echo $exception;
            Session::put('exception', '');
        }
        ?>
    </h3>
    <h3 align="center" style="color: green">
        <?php
        $message = Session::get('message');
        if (isset($message)) {
            echo $message;
            Session::put('message', '');
        }
        ?>
    </h3>

    <div class="templatemo_post_wrapper">
        <div class="templatemo_post">
            <div class="post_title">{{$value->posts_title}}</div>
            <div class="post_info">
                Posted by <a href="#">{{$value->posts_author}}</a>, {{$value->created_at}}, in <a href="#">{{$value->categories_name}}</a>
            </div>
            <div class="post_body">
                <img src="{{asset($value->posts_image)}}" alt="free css template" border="1" />
                <p>{{$value->posts_long_description}}</p>
                <p>{{$value->posts_short_description}}</p>
            </div>
            <div class="post_comment">
                {{--<a href="#">No Comment</a>--}}
            </div>
        </div>
    </div> <!-- End of a post-->

    <!--comments-->
    <div class="templatemo_post_wrapper">
        <div class="templatemo_post">
            <div class="post_title">Comments For This Post</div>
            @foreach($comments as $value)
                <div class="post_info">
                    <span class="radio-com"></span><p class="post-comment-title"><a href="">{{$value->posts_commentor_name}}</a></p>
                    <p class="comment-body">{{$value->posts_comment_body}}</p>
                </div>
            @endforeach
        </div>
    </div>
    <!--end comments-->

    <!--Write comment section-->
    <div class="templatemo_post_wrapper">
        <div class="templatemo_post">
            <div class="post_title">Drop Your Opinion For This Post</div>
            {!! Form::open(['url' => '/add-comment', 'method' => 'post']) !!}
            <div class="control-group">
                <div class="">
                    <input type="hidden" name="posts_id" value="{{$value->posts_id}}"/>
                    <input type="text" name="posts_commentor_name" placeholder="Your Name" class="input-xxlarge" />
                    <input type="email" name="posts_commentor_email" placeholder="Your Email" class="input-xxlarge" />
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <textarea class="input-xxlarge" rows="3"  name="posts_comment_body" placeholder="Write Your Comment"></textarea>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn">comment</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>


@endsection
