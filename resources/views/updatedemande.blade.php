@extends('layouts.app')
@section('update_demandes')
    
    <section class="update_form">
        <div class="update_container">
            <form class="popup_update" enctype="multipart/form-data" method="POST" action="/updatedemandes/{{$get_demande->id}} ">
                @csrf
                @method('PUT')
                <div class="popup_info">
                    <label for="">Tiltle</label>
                    <input type="text" name="title" placeholder="offre title" value=" {{$get_demande->title}}"
                    class="@error('title') border-red-500 @enderror" >
                    @error('title')
                         <div class="text-red-500 mt-2 text-sm"> {{$message}} </div>
                    @enderror
                </div>
                <div class="popup_info">
                    <label for="">Description</label>
                    <textarea name="description" placeholder="offre description"
                    class="@error('description') border-red-500 @enderror" >{{$get_demande->description}}</textarea>
                    @error('description')
                         <div class="text-red-500 mt-2 text-sm"> {{$message}} </div>
                    @enderror
                </div>
                <div class="popup_info ">
                    <label for="">pic</label>
                    <input type="file" name="pic"  >
                </div>
                {{-- <div class="popup_info">
                    <label for="">Tiltle</label>
                        <select name="type">
                            <option value={{$get_offre->type}} selected disabled>{{$get_offre->type}}</option>
                            <option value="computer">computer</option>
                            <option value="phone">phone</option>
                            <option value="others">others</option>
                        </select>
                </div> --}}
                {{-- <div class="popup_info mb-10">
                    <label for="">price</label>
                    <input type="number" name="price" placeholder="offre price" value={{$get_offre->price}}>
                </div> --}}
            
                <button  type="submit" class="text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Save
                </button>
                <a href="/offres"><button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">cancel</button></a>
            </form>
        </div>
       
    </section>


@endsection