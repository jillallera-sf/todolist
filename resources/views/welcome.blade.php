<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="../css/welcome.css">

        <title>Laravel</title>
    </head>
    <body class="antialiased">
   
        <div class="home">

            <div class="hello">
                <p>HELLO,</p> 
            </div>
            <div class="next">
                <h1>this is your TO-Do list App</h1>
            </div>

            <div class="home1">
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/home') }}" >Home</a>
                        @else
                        <div class="link">
                            <a href="{{ route('login') }}" >Log in</a>
                        </div>

                            @if (Route::has('register'))
                            <div>
                                <p class="unreg">
                                    Dont have an account yet?
                                </p>
                            </div>
                            <div class="link">
                                <a href="{{ route('register') }}">Register</a>
                            </div>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
  
    </body>
</html>
