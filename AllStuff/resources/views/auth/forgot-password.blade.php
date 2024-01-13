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
      <div class="hero_area">
        
        @include('home.header')
       
      </div>

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo.png">
            <x-authentication-card-logo />
        </x-slot>
        <div class="text-center">
        <a class="navbar-brand mb-4" href="/"><img class="mx-auto" width="100" height="100" style="margin-top:-40px;" src="{{ asset('images/logo.png') }}" alt="logo" /></a>
        </div>
        <div class="mb-4 text-sm text-gray-600">
    {{ __("Forgot your password? Enter your email, and we'll send you a link to reset your password.") }}
</div>


        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" style="text-transform: lowercase;" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button style="background-color:#AD9551;">
                    {{ __('Send Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<div class="footer_area">
    @include('home.footer')
</div>

</body>
</html>
