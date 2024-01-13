<!DOCTYPE html>
<html>
   <head>
   <base href ="/public">
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
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />
        <div class="text-center">
    <a class="navbar-brand mb-4" href="/">
        <img class="mx-auto" width="100" height="100" style="margin-top:-40px;" src="{{ asset('images/logo.png') }}" alt="logo" />
    </a>
</div>
<form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="block">
               <x-label for="email" value="{{ __('Email') }}" />
               <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" style="text-transform: lowercase;" />
            </div>
            <div class="mt-4">
               <x-label for="password" value="{{ __('Password') }}" />
               <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>
            <div class="mt-4">
               <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
               <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="flex items-center justify-end mt-4">
               <x-button>
               {{ __('Reset Password') }}
               </x-button>
            </div>
         </form>
    </x-authentication-card>
</x-guest-layout>
</div>
<div>
@include('home.footer')
</div>
</body>
</html>
