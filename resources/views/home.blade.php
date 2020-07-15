@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="{{route('blog_post_input')}}">新規作成</a>
                    @if($blog_posts)
                        <table border='0'>
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>user</th>
                                <th>タイトル</th>
                                <th>本文</th>
                                <th>作成日</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blog_posts as $blog_post)
                                <tr>
                                
                                    <td><a href="{{ route('blog_post_show', ['id'=>$blog_post->id]) }}">{{ $blog_post->id }}</a></td>
                                    <td>{{ $blog_post->user_id }}</td> <!-- TODO リレーションでユーザ名を表示 -->
                                    <td>{{ $blog_post->title }}</td>
                                    <td>{{ $blog_post->contents }}</td>
                                    <td>{{ $blog_post->created_at }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
