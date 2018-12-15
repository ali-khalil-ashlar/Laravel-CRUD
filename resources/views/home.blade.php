@extends('shared.navbar', ['id' => $name->id])

@section('body')
    <div>
        <h2>Home Page..</h2>

        {{ $name->uname }}

        {{ $name->id }}

        {{-- @if (session()->get('uid1'))
            {{ session()->get('uid1') }}  
            <br> {{ session()->get('uid2') }}
            @foreach ($name as $cal)
                <p>{{$cal->uname}}</p>
                <p>{{$cal->u_id}}</p>
            @endforeach

        @else
            <p>Not working..</p>

        @endif --}}
        
        
    </div>
@endsection