<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title >Sell Now</title>
    <link rel="stylesheet" href=" {{asset('css/app.css') }} ">
    <link rel="stylesheet" href=" {{asset('css/announces.css')}} ">
    <link rel="stylesheet" href=" {{asset('css/nav.css')}} ">
    <link rel="stylesheet" href=" {{asset('css/footer.css')}} ">
    <link rel="stylesheet" href=" {{asset('css/update.css')}} ">
</head>
<body class="bg-gray-100 dark:bg-black">
    <nav class="p-3 bg-white flex justify-between  w-full fixed z-50">
        <ul>
            <li class="logo">Sell Now</li>
        </ul>
        @if (auth()->user())
        <div class="search_feild focus:w-3/5 ">
            <form action="">
                <input class="search_input " id="search" type="search" name="search" onkeyup="yo()" >
                <button type="submit" class="search_btn"><a href=""><img src=" {{asset('images/icons/icons8-search-50.png')}} " alt=""></a></button>
            </form>
        </div> 
        @endif 
        <ul class="nav_content  flex items-center">
            
            <li>
                <a href="/offres" class="p-3 nav_links" >Offres</a>
            </li>
            <li>
                <a href="{{route('demandes')}} " class="p-3 nav_links" >Commands</a>
            </li> 
            @if (auth()->user())
            <li>
                <a href="" class="p-3 nav_links" > {{auth()->user()->nom}} {{auth()->user()->prenom}}</a>
            </li>
            <li>
                <a href=" {{route('logout')}} " class="pt-2 pl-3 pr-3 pb-2 bg-primary text-white p-3 w-60 rounded-full  hover:bg-secondary ease-in-out duration-300 ">Logout</a>
            </li>
            @else
                <li>
                    <a href=" {{route('sign_in')}} " class="pt-2 pl-3 pr-3 pb-2 bg-primary text-white p-3 w-60 rounded-full  hover:bg-secondary ease-in-out duration-300">Login</a>
                </li>
            @endif
        </ul>
        <div class="menu">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
            
        </div>
      
    </nav>
    @yield('registre')
    @yield('home')
    @yield('sign_in')
    @yield('offres')
    @yield('demandes')
    @yield('update_offre')
    @yield('update_demandes')

    <footer>
        <div class="footer_logo">
            SELL NOW
        </div>
        <div class="footer_icons">
            <div class="icons_holder"><a href=""><img src="{{asset('images/social/instaa.png')}}" alt="insta_sell_buy"></a></div>
            <div class="icons_holder"><a href=""><img src="{{asset('images/social/face.png')}}" alt="facebook_sell_buy"></a></div>
            <div class="icons_holder"><a href=""><img src="{{asset('images/social/twitt.png')}}" alt="twitter_sell_buy"></a></div>
        </div>
        <div class="footer_info">
            <p>Info - Support - Marketing</p> 
            <p>Termes of Use - Privacy policy</p>
        </div>
        <div class="footer_copyright">
            <img src="{{asset('images/social/copy.png')}}" alt="">
            <p> 2022 sell now on the best website </p>
        </div>
    </footer>
    <script src=" {{asset('js/nav.js')}} "></script>
    <script src="../path/to/flowbite/dist/flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.2/dist/flowbite.js"></script>

</body>
</html>