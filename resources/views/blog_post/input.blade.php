@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('新規作成') }}</div>

                <div class="card-body">
                    {{ Form::open() }}
                    <dt>タイトル</dt> 
                    <dd>{{ Form::text('title', null, ['class' => 'title']) }}</dd>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <dt>本文</dt>
                    <dd>{{ Form::textarea('contents', null, ['class' => 'contents']) }}</dd>
                    @error('contents')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    {{ Form::button('戻る', ['type' => 'submit', 'name' => 'action', 'value' => 'back']) }}
                    {{ Form::button('作成する', ['type' => 'submit', 'name' => 'action', 'value' => 'send']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
