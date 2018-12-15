@extends('shared.anav')

@section('register')
<div class="container">
    <form class="form-signin" action="{{url('/register')}}" method="POST">
      
        
        @csrf
        {{-- <input type="hidden" value="{{csrf_token()}}" name="_token" /> --}}

        <h2 class="form-signin-heading">Register an Employee</h2>
        <label for="inputUname" class="sr-only">User Name</label>
        <input type="text" name="uname" id="inputUname" class="form-control" placeholder="User Name" required="" autofocus="">
        <br>

        
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="">
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="pswd" id="inputPassword" class="form-control" placeholder="Password" required="">
        
        <br>
        <label for="inputDescription" class="sr-only">Password</label>
        <textarea type="text" name="desc" id="inputDesc" class="form-control" placeholder="Description" required=""></textarea>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      </form>
</div>
@endsection