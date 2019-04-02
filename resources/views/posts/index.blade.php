
@php
    $title = __('Posts');
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
    <!-- 検索-->
    <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
        <form class="form-inline" action="{{url('/posts')}}">
            <div class="form-group">
                <input type="text" name="keyword" value="" class="form-control" placeholder="記事を入力してください">
            </div>
            <input type="submit" value="検索" class="btn btn-info">
        </form>
    </div>
    <h1>{{ $title }}</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('Author') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Body') }}</th>
                    <th>{{ __('Created') }}</th>
                    <th>{{ __('Updated') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    {{-- user名 --}}
                    <td>
                        <a href="{{ url('users/' . $post->user->id) }}">
                            {{ $post->user->name }}
                        </a>
                    </td>
                    {{-- タイトル名 --}}
                    <td>
                        <a href="{{ url('posts/'.$post->id) }}">
                            {{ $post->title }}
                        </a>
                    </td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                 </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $posts->links() }}
</div>
@endsection