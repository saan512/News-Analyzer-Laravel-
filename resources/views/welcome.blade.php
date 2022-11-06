<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome</title>
        <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
        {{-- <link rel="stylesheet" type="text/css" href="{{url('css/Landing_page.css')}}"> --}}
        {{-- <link rel="stylesheet" type="text/css" href="{{url('css/side-container.css')}}"> --}}
        {{-- <link rel="stylesheet" type="text/css" href="{{url('css/material-dashboard.css')}}"> --}}


        

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                background-image: url('{{url('img/login.jpg')}}');
            }
        </style>
        
    </head>
    <body>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
           
        </div>
        <!-- Navbar -->
    <div class="navbar">
        <div class="container_nav flex">
            <h1 class="logo">News Analyzer</h1>
            <nav>
                <ul>
                    {{-- <li><a href="{{URL::to('/Market')}}">Home</a></li> --}}
                    <li><a href="Support.htm">Support Us</a></li>
                    <li><a href="Docs.htm">Docs</a></li>
                    @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                    </div>
                    @endif
                </ul>
            </nav>
        </div>
    </div>

    <br style="background-color: white">
    {{-- <br style="background-color:#4397eb"> --}}
    {{-- <br style="background-color: white"> --}}
    {{-- <br style="background-color: #4397eb"> --}}


    <!-- Creating a section for  -->
    <section class="showcase">
        <div class="container grid">
            <div class="showcase-text">
                <h1>Why News Analyzer?</h1>
                <p>Determining Positivity or Negativity spreading in Society.<br>
                    Which News Channel is spreading which type of sentiment?<br>
                    Providing Better Visualization of type of sentiments for clear understanding.
                    .<br>                    
                    This system is efficient enough to provide real time analysis of news channels and provide better understanding of the sentiments.
                    on news, and store and display results.

                    so no worries, and don't forget to support us.
                    you can do it by going to the "support us" page. <br> Thanks </p>
                <a href="Support.htm" class="btn btn-outline">Support Us</a>
            </div>

            <div class="showcase-form card">
                <h2>Request latest Market News</h2>
                <form>
                    <div class="form-control">
                        <input type="text" name="name" placeholder="Name" required>
                    </div >
                    <div class="form-control">
                        <input type="Email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-control">
                        <Label>Content &nbsp;:</Label>
                        <select name="type" id="type">
                            <option value="All">All</option>
                            <option value="Laptop">Laptop</option>
                            <option value="Computer">Computer</option>
                            <option value="Mobile">Mobile</option>
                        </select>
                    </div>
                    <input type="submit" value="Send" class="btn btn-primary">
                </form>
            </div>
        </div>
    </section>

    <!-- creating content for supported companies -->
    <section class="Companies showcase">
        <h2 class="md text-center my-2">
            Supported companies
            <br>
            
            <br>
        </h2>
        <div class="container flex">
            <div class="card">
                <h4></h4>
                <img src="logos/News_Companies/Ary.jfif" alt="">
            </div>
            <div class="card">
                <h4></h4>
                <img src="logos/News_Companies/Dawn.jfif" alt="">
            </div>
            <div class="card">
                <h4></h4>
                <img src="logos/News_Companies/tribune.png" alt="">
            </div>
            {{-- <div class="card">
                <h4>Toshiba</h4>
                <img src="logos/toshiba.png" alt="">
            </div>
            <div class="card">
                <h4>Lenovo</h4>
                <img src="logos/Lenovo.png" alt="">
            </div>
            <div class="card">
                <h4>Haier</h4>
                <img src="logos/haier.png" alt="">
            </div>
            <div class="card">
                <h4>Asus</h4>
                <img src="logos/Asus.png" alt="">
            </div> --}}
        </div>
    </section>

    {{-- <section class="Companies showcase" style="background-color: #4397eb; color: white;"> --}}
        <section class="footer" style="color: white;">
            <footer id="footer" class="card">
                <div class="container">
                    <div class="footer__top">                    
                        <div class="footer-top__box ">
                            <h3>INFORMATION</h3>
                            <a href="#">About Us</a>
                            <a href="#">Privacy Policy</a>
                            <a href="#">Terms & Conditions</a>
                            <a href="#">Contact Us</a>
                            <a href="#">Site Map</a>
                        </div>
                        <div class="footer-top__box ">
                            <h3>MY ACCOUNT</h3>
                            <a href="#">My Account</a>
                            <a href="#">Order History</a>
                            <a href="#">Wish List</a>
                            <a href="#">Newsletter</a>
                            <a href="#">Returns</a>
                        </div>
                        <div class="footer-top__box ">
                            <h3>CONTACT US</h3>
                            <div>
                                COMSATS UNIVERSITY ISLAMABAD,WAH CAMPUS
                            </div>
                            <div>
                                BABA_G_KI_BOOTI@gmail.com
                            </div>
                            <div>                    
                                0310-9279605
                            </div>
                            <div>                    
                                Punjab,Pakistan
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </footer>
        </section>

    </body>
</html>
