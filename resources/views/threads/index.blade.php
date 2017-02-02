@extends('layouts.app')

@section('content')
<div class="row">
    @include('news.newthreadsphoto')
</div>
<div class="row"><div class="text-center"> {{$threadsphoto->links()}} </div></div>
<div class="row">
        
    @if($threads->count())
        @include('news.newthreads')
    @else
        <div class="text-center">
            <i style="font-size: 14px;" class="lead">Belum ada yang menulis di forum ini.</i>
            <br>
            <a href="/threads/create" class="btn btn-primary btn-xs" style="color: white !important;">
                <img id="icon" src="/background/ide.svg">Tulis di forum sekarang.
            </a>
            <hr>
        </div>
    @endif
</div>
<div class="row"><div class="text-center">{{$threads->links()}}</div></div>
@endsection

