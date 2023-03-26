{{-- @extends('layout') --}}

{{-- @section('content') --}}
<x-layout>
    <h1> {!! $post->title !!} </h1>
    <p>
            <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>
    <div>
        <!-- <?= $post->body ?> -->
        {!! $post->body !!}
    </div>
    <a href="/">Back</a>
{{-- @endsection --}}
</x-layout>