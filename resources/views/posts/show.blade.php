@php
    $title = $post->title;
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
    <h1 id="post-title">{{ $title }}</h1>

    {{-- 編集・削除ボタン --}}
    <div class="edit">
        <a href="{{ url('posts/'.$post->id.'/edit') }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>
        @component('components.btn-del')
            @slot('controller', 'posts')
            @slot('id', $post->id)
            @slot('name', $post->title)
        @endcomponent
    </div>

    {{-- 記事内容 --}}
    <dl class="row">
        {{-- user名 --}}
        <dt class="col-md-2">{{ __('Author') }}:</dt>
        <dd class="col-md-10">
            <a href="{{ url('users/' . $post->user->id) }}">
                {{ $post->user->name }}
            </a>
        </dd>
        {{-- 作成日 --}}
        <dt class="col-md-2">{{ __('Created') }}:</dt>
        <dd class="col-md-10">
            <time itemprop="dateCreated" datetime="{{ $post->created_at }}">
                {{ $post->created_at }}
            </time>
        </dd>
        {{-- 更新日 --}}
        <dt class="col-md-2">{{ __('Updated') }}:</dt>
        <dd class="col-md-10">
            <time itemprop="dateModified" datetime="{{ $post->updated_at }}">
                {{ $post->updated_at }}
            </time>
        </dd>
    </dl>
    <hr>
    {{-- 記事 --}}
    <div id="post-body">
        {{ $post->body }}
    </div>
</div>
@endsection