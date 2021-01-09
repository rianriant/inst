@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img class="w-100" src="{{ $user->profile->profileImage() }}" alt="" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-2">
                    <h4> {{ $user->name }} </h4>
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can('update', $user->profile)
                    <a href="/p/create">Add new photo</a>
                @endcan

                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
                @endcan

            </div>
                
            <div class=" d-flex">
                <div class="pl-4"><strong>{{ $user->profile->followers->count() }}</strong></div>
                <div class="pl-4"><strong>{{ $user->age }}</strong></div>
                <div class="pl-4"><strong>{{ $user->email }}</strong></div>
                <div class="pl-4"><strong><a href="{{ $user->profile->url ?? '#'}}">{{ $user->profile->url ?? 'N/A'}}</a></strong></div>
            </div>
        </div>
        
    </div>
</div>
<div class="container">
<hr>
<div class="row">
    @foreach($user->posts as $post)
        <div class="col-md-4 pb-4">
            <a href="/p/{{ $post->id }}"><img style="max-width: 300px" src="/storage/{{ $post->image }}" alt=""></a>
        </div>
    @endforeach
</div>

</div>
@endsection
