<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>     
<body>

<h1>Really Metro</h1>

@guest
  <p>Hello Fochkers</p>
  <p><a href=" {{ route('login.show') }}">Log On</a></p>
  <p><a href=" {{ route('register.show') }}">Create account</a></p>
@else
  <p>Bye Fockers</p>
  <a href=" {{ route('logout.perform') }}">Log Out</a>
@endguest



{{-- If we load this page, content_sexy and testC will be empty but if we 
load includeme.blade this page gonna load with the content_sexy and testC (they gonna be replace by the content of
content_sexy and testC sections in the includeme.blade)  --}}

<main class="container">
  @yield('content_sexy')
</main>

<p class="container_2">
  @section('testC')
  <p>Replace me motherfucker</p>
  @show
</p>
  

</body>
</head>
</html>