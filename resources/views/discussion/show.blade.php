@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.css">
@endsection
@section('content')
<div class="card mb-3">

    @include('partials.discussion-header')

    <div class="card-body">
       <div class="text-center">
        <strong> {!! $discussion->title !!}</strong>
    </div>
       <hr>
       {!! $discussion->content !!}
       @if ($discussion->bestReply() == "")
           
          @else
          <div class="card bg-success my-5 m-5" style="color:white">
            <div class="card-header text-center">
                Best Reply
            </div>
            <div class="card-body">
                {!! $discussion->bestReply->content !!}
            </div>
        </div>
       @endif
    </div>
    <h3 class="text-center text-success">Replies</h3>
    @foreach ($discussion->replies()->paginate(3) as $reply)
       <div class="card my-2">
           <div class="card-header">
                <div class="d-flex justify-content-between">
                     <div>
                         <img width="40px" height="40px" style="border-radius:50%" src="{{Gravatar::src($reply->user->email)}}" alt="">
                         <strong class="ml-3 text-uppercase">{{$reply->user->name}}</strong>
                    </div>
                    <div>
                        @if (auth()->user()->id === $discussion->user->id)
                            <form action="{{ route('discussions.best-reply', ['discussions'=>$discussion->slug , 'reply'=>$reply->id])}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-info btn-sm">Mark as Best Reply</button>
                            </form>
                        @endif
                    </div>
                </div>
           </div>
           <div class="card-body">
               {!! $reply->content !!}
           </div>
       </div>
    @endforeach
    {{ $discussion->replies()->paginate(3)->links() }}
    <div class="card my-5">
        <div class="card-header">
            Add a reply

            @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
        </div>
        <div class="card-body">
            @auth
            <form action="{{ route('replies.store' , $discussion->slug) }}" method="POST">
                @csrf
              <div class="form-group">
                 <input type="hidden" name="discussion_id" value="{{$discussion->id}}">
                  <input id="content" type="hidden" name="content">
                  <trix-editor input="content"></trix-editor>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-success">Submit Reply</button>
              </div>
        </form>
                @else
             <a href="{{ route('login')}}" class="btn btn-info">Please sign in to add a reply</a>
            @endauth
        </div>
    </div>
</div>
@endsection
@section('js')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.js"></script>
@endsection