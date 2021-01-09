
@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img class="w-100" src="/storage/{{ $post->image }}" alt="" style="max-width: 500px">
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">
                    <div class="pr-5">
                        <img class="w-100 rounded-circle" style="max-width: 80px" src="{{ $post->user->profile->profileImage() }}" alt="">
                    </div>
                        <div class="font-weight-bold d-flex justify-content-around">
                            <div><a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->name }}</span>
                            </a>
                            </div>
                            <div class="pl-4">|</div>
                            <div>
                            <follow-button user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-button>
                            </div>
                        </div>
                        
                </div>

                <hr>

                <div>
                    <p>
                        <span class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->name }}</span>
                            </a>
                        </span>
                        {{ $post->user->profile->description }}
                    </p>

                </div>
            </div>
        </div>
    </div>
@endsection