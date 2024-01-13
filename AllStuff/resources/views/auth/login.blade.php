<!DOCTYPE html>
<html>
   <head>
    
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/AllStuff.png" type="">
      <title>AllStuff</title>
     
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
     
      <link href="home/css/style.css" rel="stylesheet"/>
  
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area" >
        
        @include('home.header')
       
      
      <x-guest-layout>
    <x-authentication-card>
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <div style="margin-top: 20px;" class="flex justify-end">
            <p class="text-sm text-gray-600 hover:text-gray-900" style="margin-right:5px;">Not registered yet! </p><a class="text-sm text-gray-600 hover:text-gray-300" style="font-size:16px;text-decoration:underline;" href="{{ route('register') }}">Register here!</a>
        </div>
       
    
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 md overflow-hidden sm:rounded-lg flex flex-col items-center"  style="padding-bottom:20px;">
        <a class="navbar-brand mb-4" href="/"><img class="mx-auto" width="100" height="100" style="margin-top:-40px;" src="{{ asset('images/logo.png') }}" alt="logo" /></a>
        <h1 class="text-2xl font-semibold text-center mb-6 text-burgundy-700" style="color: #4a5568; margin-top:-40px;">Login</h1>
        <form style="margin-top:-40px;" method="POST" action="{{ route('login') }}" class="mt-8">
            @csrf


            <div class="mb-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" style="text-transform: lowercase;" />
            </div>

            <div class="mb-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="mb-4 flex items-center">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" class="mr-2" />
                    <span class="text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    
                    
                @endif
                
                <x-button class="px-6 py-2 text-white rounded" style="background-color:#06516e;">
                    {{ __('Log in') }}
                </x-button>
                
            </div>
            
            <!-- <div style="margin-top: 20px;" class="flex justify-end">
            <p class="text-sm text-gray-600 hover:text-gray-900" style="margin-right:5px;">Super User! </p><a class="text-sm text-gray-600 hover:text-gray-300" style="font-size:16px;text-decoration:underline;" href="">Register here!</a>
        </div> -->
        </form>
    </x-authentication-card>
</x-guest-layout>
</div>
<div>
@include('home.footer')
</div>
</body>
</html>
