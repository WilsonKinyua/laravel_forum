@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.css">
@endsection

@section('content')
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('discussions.store') }}" method="POST">
                            @csrf
                          <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="">
                          </div>
                          <div class="form-group">
                              <label for="content">Content:</label>
                              <input id="content" type="hidden" name="content">
                              <trix-editor input="content"></trix-editor>
                          </div>
                          <div class="form-group">
                              <label for="channel">Channel</label>
                              <select class="form-control" name="channel" id="channel">
                                   @foreach ($channels as $channel)
                                         <option value="{{$channel->id}}">{{$channel->name}}</option>
                                   @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-success">Create Discussion</button>
                          </div>
                    </form>
                </div>
            </div>

@endsection


@section('js')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.js"></script>
@endsection