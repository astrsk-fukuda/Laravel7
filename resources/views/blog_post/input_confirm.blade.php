@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('確認') }}</div>

                <div class="card-body">
                    <p>以下の内容で作成しますか？</p>
                    <dt>タイトル</dt>
                    <dd>{{ $blog_post->title }}</dd>
                    <dt>本文</dt>
                    <dd>{{ $blog_post->contents }}</dd>

                    {{ Form::open(['url'=>route('blog_post_input_complete')]) }}
                        {{ Form::button('戻る', ['type' => 'submit', 'name' => 'action', 'value' => 'back']) }}
                        {{ Form::button('作成する', ['type' => 'submit', 'name' => 'action', 'value' => 'send']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
