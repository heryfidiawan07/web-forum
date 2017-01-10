@extends('layouts.app')

@section('url') http://fidawa.com/threads @stop
@section('title') Fidawa - Forum Diskusi dan Forum Jual Beli. @stop
@section('description') Diskusikan apa yang ingin anda tanyakan di forum. Cari barang atau pasang iklan anda di forum jual beli. @stop
@section('image') http://fidawa.com/icon2.jpg @stop

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('news.tags')
    </div>
    <div class="col-md-5">
        
        @if($threads->count())
            @foreach($threads as $thread)
                <div class="media">
                    <a href="/{{$thread->user->getName()}}" class="pull-left">
                        <img src="{{$thread->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
                        <img src="{{asset('/img/users/'.$thread->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
                    </a>
                    <div class="media-body">
                        <div class="media-heading">
                            <a href="/threads/{{$thread->slug}}">{{str_limit($thread->title, 70)}}</a>
                            <br>
                            <a href="/tags/{{$thread->tag->name}}" class="btn btn-danger btn-xs" style="color: white !important;">
                                <img id="icon" src="/background/tag.svg">{{$thread->tag->name}}
                            </a>
                        </div>
                        <p> <small>{{$thread->created_at->diffForHumans()}}</small> by <a href="/{{$thread->user->getName()}}"> {{$thread->user->getName()}} </a> </p>
                        <div class="fb-like" data-href="http://fidawa.com/threads/{{$thread->slug}}" data-width="250" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                    </div>
                    <div class="panel-footer">
                        <p class="pull-right">{{$thread->countComments()}} commentar</p>
                    </div>
                </div>
                <hr>
            @endforeach
        @else
            <i style="font-size: 14px;" class="lead">Belum ada yang menulis di kategori ini.</i>
            <a href="/threads/create" class="btn btn-primary btn-xs" style="color: white !important;">
                <img id="icon" src="/background/ide.svg">Tulis sesuatu di forum sekarang.
            </a>
            <hr>
        @endif

    @if(Auth::check())
        {{$threads->links()}}
    @endif
    
    </div>
</div>
@endsection

