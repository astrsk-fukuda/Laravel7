@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('投稿内容') }}</div>

                <div class="card-body">
                    @foreach($blog_posts as $blog_post)
                        <dt>タイトル</dt>
                        <dd>{{ $blog_post->title }}</dd>
                        <dt>本文</dt>
                        <dd>{{ $blog_post->contents }}</dd>
                    @endforeach
                    <a href="{{route('home')}}">マイページに戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
