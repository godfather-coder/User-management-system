@extends('layout')
@section('main')
    <div>

        <h1>Posts</h1>
        @if (auth()->user()->role->name == 'manager')
            <a href="{{ route('posts.create') }}">Create Post</a>
        @endif
        @foreach ($posts as $post)
            <div class="card">
                <div class="post-card-head">
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
                    <p>{!! $post->description !!}</p>
                </div>
                @if (auth()->id() == $post->user_id)
                    <div class="delete">
                        <a href="{{ route('posts.edit',['post' => $post->id]) }}" class="btn btn-outline-success">Edit</a>
                        <form action="{{ route('posts.destroy', ['post' => $post->id]) }}"method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">DELETE</button>
                        </form>
                @endif
            </div>
    </div>
    @endforeach
    </div>
@endsection

@section('style')
    <style>
        .card {
            padding: 5px;
            border: 2px rgb(68, 195, 161) solid;
            display: flex;
            flex-direction: row;
            justify-content: space-between;

        }

        .post-card-head {
            width: 70%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .delete {
            gap: 10px;
            width: 30%;
            padding-right: 15px;
            display: flex;
            justify-content: end;
        }
    </style>
@endsection
