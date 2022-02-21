@extends('principal_section.index')
    @section('content_sexy')
    <form method="post" action="{{ route('login.perform') }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        <h1>Login</h1>


@if(isset ($errors) && count($errors) > 0)
    @foreach($errors->all() as $error)
        <br>{{ $error }}</br>
    @endforeach
@endif

@if(Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
                <br>{{ $msg }}</br>
        @endforeach
    @else
        <br>{{ $data }}</br>
    @endif
@endif






            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Email or Username</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif

            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
   
            <label for="remember">Remember me</label>
            <input type="checkbox" name="remember" value="1">
 

        <button type="submit">Login</button>
        
    </form>
@endsection