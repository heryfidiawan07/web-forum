@extends('layouts.app')

@section('content')
<div class="row">
        
        @if($threads->count())
            @foreach($threads as $thread)
            <div class="col-md-4">
                <div class="media">
                    <a href="/{{$thread->user->getName()}}" class="pull-left">
                        <img src="{{$thread->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
                        <img src="{{asset('/img/users/'.$thread->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
                    </a>
                    <div class="media-body">
                        <div class="media-heading">
                            <a href="/threads/{{$thread->slug}}">{{str_limit($thread->title, 40)}}</a>
                            <br>
                            <a href="/tags/{{$thread->tag->name}}" class="btn btn-danger btn-xs" style="color: white !important;">
                                <img id="icon" src="/background/tag.svg">{{$thread->tag->name}}
                            </a>
                        </div>
                        <p> <small>{{$thread->created_at->diffForHumans()}}</small> by <a href="/{{$thread->user->getName()}}"> {{$thread->user->getName()}} </a> </p>
                    </div>
                    <div class="panel-footer">
                        <p class="pull-right">{{$thread->countComments()}} commentar</p>
                    </div>
                </div>
                <hr>
                </div>
            @endforeach
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
<div class="row">
    <div class="text-center">{{$threads->links()}}</div>
</div>
@endsection

