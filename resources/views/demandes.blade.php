@extends('layouts.app')
@section('demandes')

<div class="add_demande top-16 w-full bg-gray-100 drop-shadow-md  p-3 mb-8 fixed flex justify-center z-50">
    
    <button type="button" data-modal-toggle="popup-modal" class=" bg-primary text-white p-3 w-60 rounded-lg  hover:bg-secondary">
        Add demande</button>
</div>

<div class=" w-full flex justify-center items-center flex-col">
    <div class="section_container w-4/5 flex mt-32">

        <section class="demandes w-full flex  flex-col items-center">


            @if ($demandes->count())
            
            @foreach ($demandes as $demande)
            <div class="demande flex  items-center bg-slate-300   rounded-lg ">
                {{-- demande photo --}}
                <div class="photo ">
                    @if ($demande->photo)  
                    <img src=" {{ asset('images/'.$demande->photo)}}" alt=" demande ">
                    @endif
                </div>
                <div class="demande_info p-2 w-full h-full relative">
                    {{-- demande head --}}
                    <div>
                        <div class="demande_maker">
                     
                        <label class="font-medium text-xl"> {{$demande->title}} </label>
                           @if ( auth()->user()->id === $demande->user->id )
                            
                            <div class="update_delete flex">
                                <form action="/updatedemandes/{{$demande->id}}">
                                    <button class="edit_icon" type="submit">
                                        <img src=" {{asset('images/icons/edit.png')}} " alt="update cmnd">
                                     </button>
                                </form>
    
                                <form action="/demandes/{{$demande->id}}" method="POST" onsubmit="confirm('are you sure about that')">
                                   @csrf
                                   @method('DELETE')
                                    <button class="edit_icon" type="submit">
                                       <img src=" {{asset('images/icons/delete.png')}} " alt="delet commend">
                                    </button>
                                </form>
                            </div>
                           @endif
                       </div>
                       <div class="author"> {{$demande->user->nom}} {{$demande->user->prenom}} </div>    
                    </div>
                
                 {{-- demande body --}}

                    <div class="description m-2"> {{$demande->description}} </div>
                    <div class="more_info border-t border-slate-500 flex justify-between">
                        <div class="time">
                            <img src="{{asset('images/icons/clock.png')}}" alt="">   
                            {{$demande->created_at->diffForHumans()}}
                        </div> 
                    </div>
                </div>
             </div>
            @endforeach
            @endif

        </section>

        <section class="add_pop hover:shadow-lg duration-300">
            <div class="top-16 w-4/5  drop-shadow-md  p-3 flex">
                <button type="button" data-modal-toggle="popup-modal" class="bg-primary text-white p-3 w-60 rounded-lg  hover:bg-secondary">Add demande</button>
            </div>      
        </section>

        {{-- popup add demande --}}
        
    </div> 
            <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex justify-end p-2">
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-red-400 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 pt-0 text-center">
                            
                            <form class="popup_content" enctype="multipart/form-data" method="POST" action=" {{route('demandes')}} ">
                                @csrf
                                <div class="popup_info">
                                    <label for="">Tiltle</label>
                                    <input type="text" name="title" placeholder="demande title"
                                    class="@error('title') border-red-500 @enderror" >
                                    @error('title')
                                         <div class="text-red-500 mt-2 text-sm"> {{$message}} </div>
                                    @enderror
                                </div>
                                <div class="popup_info">
                                    <label for="">Description</label>
                                    <textarea name="description" id="" placeholder="demande description"
                                    class="@error('description') border-red-500 @enderror" ></textarea>
                                    @error('description')
                                         <div class="text-red-500 mt-2 text-sm"> {{$message}} </div>
                                    @enderror
                                </div>
                                <div class="popup_info mb-10">
                                    <label for="">pic</label>
                                    <input type="file" name="pic">
                                </div>
                                <button data-modal-toggle="popup-modal" type="submit" class="text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Add
                                </button>
                                <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">cancel</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection
<script >
</script>