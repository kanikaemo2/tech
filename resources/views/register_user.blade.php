@extends('principal_section.index')
    @section('content_sexy')
   <form method="post" action="{{ route('register.perform') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        <h1>Register</h1>

        
            <input type="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required">
            <label for="floatingEmail">Email address</label>
            @if ($errors->has('email'))
                <span>{{ $errors->first('email') }}</span>
            @endif
        

        
            <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" required="required">
            <label for="floatingName">Username</label>
            @if ($errors->has('username'))
                <span>{{ $errors->first('username') }}</span>
            @endif
        
        
        
            <input type="password" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span>{{ $errors->first('password') }}</span>
            @endif
        

        
            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
            <label for="floatingConfirmPassword">Confirm Password</label>
            @if ($errors->has('password_confirmation'))
                <span>{{ $errors->first('password_confirmation') }}</span>
            @endif
        

        <button type="submit">Register</button>
        
    
    </form>
    @endsection
