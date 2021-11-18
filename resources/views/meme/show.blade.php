@extends('layouts.app')
@section('content')
    <div class="container card py-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{$meme->caption}}</h1>
                <h5>Thief: {{$meme->user->name}}</h5>
                <img title="You didn't expect stolen memes to be high resolution, did you?" src="/storage/{{$meme->image}}" class="w-100"/>
            </div>
        </div>
    </div>
@endsection