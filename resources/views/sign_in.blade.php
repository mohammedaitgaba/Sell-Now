@extends('layouts.app')
@section('sign_in')
<div class=" flex flex-col items-center ">

    <h1 class="text-4xl mt-28 mb-10">Welcome back </h1>
    <div class="registration_form w-5/12 bg-white p-7 rounded-lg" >
        <div>
            @if (session('status'))
            <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
            {{ session ('status') }}
             @endif
        </div>    
        <form action="{{route('sign_in')}}" method="POST" class="flex flex-col items-center">
            
            @csrf
            <div class="mb-4 flex flex-col col-span-2 w-full" >
                
                <label for="" >Email</label>
                <input type="email" name="email" placeholder="Votre Email" 
                class="bg-gray-100 border-2 w-50 p-2 rounded-lg 
                @error('email') border-red-500 @enderror" value="{{old('email')}}">  
                @error('email')
                    <div class="text-red-500 mt-2 text-sm"> {{$message}} </div>
                @enderror
            </div>
            <div class="mb-4 flex flex-col col-span-2 w-full"  >
                <label for="" >Password</label>
                <input type="password" name="password" placeholder="password" 
                class="bg-gray-100 border-2 w-50 p-2 rounded-lg 
                @error('password') border-red-500 @enderror" value="">  
                @error('password')
                    <div class="text-red-500 mt-2 text-sm"> {{$message}} </div>
                @enderror  
            </div>
            <button type="submit" class="login_btn bg-primary text-white p-3 w-60 rounded-lg  hover:bg-secondary">login</button>
            <div class="login_link"><a href="/register"> New member! create account </a></div>
        </form>
    </div>
</div>
@endsection