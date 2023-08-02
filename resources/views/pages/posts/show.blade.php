@extends('layout')
@section('main')
    <div class="show">
        <h2>{{ $post->title }}</h2>
        @if (isset($post->postfile[0]))
          <img class="img" src="{{ asset('storage' . $post->postfile[0]['path']) }}" alt="photo">
        @endif
        <h5 class="desc">{{ $post->description }}</h5>
        <p class="p">{!! $post->text !!}</p>
    </div>
@endsection

@section('style')
    <style>
        .img {
            width: 150px;
            border-radius: 10px;
            margin: 20px;
        }
        .desc {
            display: flex;
            border: 1px salmon solid;
            border-radius: 5px;
            padding: 10px;
        }
        .show {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center
        }
        .p {
            border-width: 1px;
            border-style: solid;
            border-image: linear-gradient(to right, #ffcc00, #ff0000);
            border-image-slice: 3;
            order-radius: 5px;
        }
    </style>
@endsection
