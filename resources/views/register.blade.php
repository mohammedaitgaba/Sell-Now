@extends('layouts.app')
@section('registre')

    <div class=" flex flex-col items-center ">
        <h1 class="text-4xl mt-20 mb-8">Join us now </h1>
        <div class="registration_form w-5/12 bg-white p-7 rounded-lg" >
            <form action="{{route('register')}}" method="POST" class="flex flex-col items-center">
                @csrf
               <div class="grid grid-cols-2 gap-4 w-full">

                    <div class="mb-4 flex flex-col " >
                        <label for="" >Nom</label>
                        <input type="text" name="nom" placeholder="Votre Nom" 
                        class="bg-gray-100 border-2 w-50 p-2 rounded-lg 
                        @error('nom') border-red-500 @enderror" value="{{old('nom')}}">  
                        @error('nom')
                            <div class="text-red-500 mt-2 text-sm"> {{$message}} </div>
                        @enderror
                    </div>

                    <div class="mb-4 flex flex-col " >
                        <label for="" >Prenom</label>
                        <input type="text" name="prenom" placeholder="Votre prenom"
                        class="bg-gray-100 border-2 w-50 p-2 rounded-lg 
                        @error('prenom') border-red-500 @enderror" value=" {{old('prenom')}} ">  
                        @error('prenom')
                            <div class="text-red-500 mt-2 text-sm"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-4 flex flex-col col-span-2 " >
                        <label for="" >Email</label>
                        <input type="email" name="email" placeholder="Votre Email" 
                        class="bg-gray-100 border-2 w-50 p-2 rounded-lg 
                        @error('email') border-red-500 @enderror" value="{{old('email')}}">  
                        @error('email')
                            <div class="text-red-500 mt-2 text-sm"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-4 flex flex-col col-span-2 " >
                        <label for="" >Password</label>
                        <input type="password" name="password" placeholder="cree password" 
                        class="bg-gray-100 border-2 w-50 p-2 rounded-lg 
                        @error('password') border-red-500 @enderror" value="">  
                        @error('password')
                            <div class="text-red-500 mt-2 text-sm"> {{$message}} </div>
                        @enderror  
                    </div>
                    <div class="mb-4 flex flex-col col-span-2 " >
                        <label for="" >Confrime password</label>
                        <input type="password" name="password_confirmation" placeholder="Rentre password" 
                        class="bg-gray-100 border-2 w-50 p-2 rounded-lg " value="">  
                    </div>
               </div>
               <button type="submit" class="bg-primary text-white p-3 w-60 rounded-lg  hover:bg-secondary">login</button>
               <div class="login_link"><a href=" /sign_in "> Already have account! </a></div>

            </form>
        </div>
    </div>


    

@endsection