@extends('layouts.app')

@section('content')
  
            @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
           @foreach ($discussions as $discussion)
           <div class="card mb-3">
           
            @include('partials.discussion-header')

            <div class="card-body">
              <div  class="text-center text-decoration">
                  <strong > {!! $discussion->title !!}</strong>
              </div>
            </div>
        </div>
           @endforeach
       <div class="text-center justify-content-center">
        {{$discussions->links() }}
       </div>
@endsection


