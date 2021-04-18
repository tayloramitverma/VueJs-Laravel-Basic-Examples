@extends('master')
@section('title', 'View a ticket')
@section('content')

    <div class="container col-md-8 col-md-offset-2 mt-5">
        <div class="card">
            <div class="card-header ">
                <h5 class="float-left">{{ $ticket->title }}</h5>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <p> <strong>Status</strong>: {{ $ticket->status ? 'Pending' : 'Answered' }}</p>
                <p> {{ $ticket->content }} </p>
                <a href="{{ action('TicketsController@edit', $ticket->slug) }}" class="btn btn-info float-left mr-2">Edit</a>
                <form method="post" action="{{ action('TicketsController@destroy', $ticket->slug) }}" class="float-left">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div>
                        <button type="submit" class="btn btn-warning">Delete</button>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

@endsection