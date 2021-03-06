@extends('layouts.master')

@section('style')
	<link rel="stylesheet" type="text/css" href="/css/hot.css">
	<link rel="stylesheet" type="text/css" href="/css/article.css">

@endsection

@section('meta')
    <meta property="og:url"           content="{{ env('APP_URL') .'/'. $article->category_name . '/' . $article->title}}" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="{{$article->title}}|《除了》雜誌" />
	<meta property="og:description"   content="{{$article->preview_content}}" />
	<meta property="og:image"         content="{{$article->preview_image}}" />
@endsection

@section('content')
    <div class="content-container" style="width:900px;padding-top:50px;">
        <div class="article">
            <span class="article-title">
    			{{$article->title}}
    		</span>
            <br>
    		<div class="article-fb">
    			<div style="" class="fb-like" data-href="{{ env('APP_URL') .'/'. $article->category_name . '/' . $article->title}}" data-width="300px" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
    		</div>
    		<div class="article-info">
    			作者： <a href="{{route('author.show',[ 'author' => $article->author_name])}}" style="color: #666666;">{{$article->author_name }}</a>_ {{$article->created_at}}
    		</div>
    		<hr class="separator">
            <div class="article-content">
                {!! $article->content !!}

            </div>
            <hr class="separator">
            <dir class="fb-comments">
                <div class="fb-comments" data-href="{{ env('APP_URL') .'/'. $article->category_name . '/' . $article->title}}" data-width="900" data-numposts="5"></div>
            </dir>



        </div>

    </div>
@endsection
