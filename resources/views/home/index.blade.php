@extends('layouts.app')
@section('content')
    <a href="/new" class="floating-button">
        +
    </a>
    <div class="container d-flex flex-wrap justify-content-sm-center justify-content-md-start">
        @if (count($memes) == 0)
            <p>
                No stolen meme yet. <a href="/new">Be the first criminal.</a>
            </p>
        @endif
        @foreach ($memes as $meme)
            <div class="card m-2" style="width: 302px; height:400px">
                <a href="/{{$meme->id}}">
                    <div style="height:300px;" class="d-flex justify-content-center align-items-center">
                        <img src="/storage/{{$meme->image}}" alt="...">
                    </div>
                    <div class="card-body align-text-bottom d-flex flex-wrap">
                        <h4 class="card-text w-100">{{$meme->caption}}</h4>
                        <p>Thief: {{$meme->user->name}}</p>
                        @if ($meme->user == auth()->user())
                            <button type="button" onclick="event.preventDefault();" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#modalDeleteMeme">
                                ❌ Delete
                            </button>
                        @endif
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $memes->links() }}
        </div>
    </div>
    <div class="modal fade" id="modalDeleteMeme" tabindex="-1" role="dialog" aria-labelledby="modalDeleteMemeTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDeleteMemeLongTitle">👮‍♀️ You're not getting rid of the evidences of your crime</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Acknowledged</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection