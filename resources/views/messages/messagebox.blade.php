@extends('layouts.default')
@section('title', Auth::user()->name.'的消息中心')

@section('content')
<div class="container-fluid">
   <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="panel panel-default">
         <div class="panel-body">
            <div class="text-center">
               <h4>您好&nbsp;<strong>{{Auth::user()->name}}</strong>！</h4>
               @include('messages._receive_stranger_messages_button')
            </div>

            <br>
            <ul class="nav nav-tabs">
                  <li role="presentation" class = ""><a href="{{ route('messages.unread') }}">未读</a></li>
                  <li role="presentation"><a href="{{ route('messages.index') }}">全部</a></li>
                  <li role="presentation" class = "active"><a href="{{ route('messages.messagebox') }}">信箱</a></li>
                  <li role="presentation" class="pull-right"><a class="btn btn-success sosad-button" href="{{ route('messages.clear') }}">清理未读</a></a></li>
            </ul>
         </div>
      </div>
      <div class="panel panel-default">
         <div class="panel-body">
            <h4><a href="{{ route('messages.messages_combineduser') }}">收件箱：</a></h4>
            @include('messages._messages')
            @if($messages->hasMorePages())
            <div class="text-center">
               <a href="{{ route('messages.messages_combineduser') }}">查看全部</a>
            </div>
            @endif
         </div>
      </div>
      <div class="panel panel-default">
         <div class="panel-body">
            <h4><a href="{{ route('messages.messages_sent') }}">发件箱：</a></h4>
            @include('messages._messages_sent')
            @if($messages_sent->hasMorePages())
            <div class="text-center">
               <a href="{{ route('messages.messages_sent') }}">查看全部</a>
            </div>
            @endif
         </div>
      </div>
   </div>
</div>
@stop
