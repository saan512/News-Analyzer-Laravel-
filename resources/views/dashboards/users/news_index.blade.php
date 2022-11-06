<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{url('css/Landing_page.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/side-container.css')}}">
    {{-- <link rel="stylesheet" href="styles/Landing_page.css">
    <link rel="stylesheet" href="styles/side-container.css"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            body {
                background-image: url('{{url('assets/img/login.jpg')}}');
            }
        </style>
    <title>News Analysis Page</title>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="container_nav flex">
            <a href="{{URL::to('/home')}}"><h1 class="logo" style="text-size: 25px;font-weight: 300;">News Analyzer</h1></a>
            
            <nav>
                <ul>
                    <li><a href="index.htm">About Us</a></li>
                    <li><a href="Support.htm">Support Us</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>


    {{-- News Content --}}
    <section class="Companies showcase">
        <h1 class="md text-center my-2">
            New Channels
        </h1>
        {{-- <h6 style="text-align: end;"><a href="#">>>See more</a></h6> --}}
        <div class="container news-flex">
            
            <div class="card">
                <button type="button" class="collapsible">
                    {{-- <img src="Logos/News_Companies/Ary.jfif" alt="ARY_News"> --}}
                    <img src="url('{{url('logos/News_Companies/Ary.jfif')}}')" alt="ARY_News">
                </button>                
                    {{-- <h4>ARY News</h4> --}}                    
                <div class="c_content">                
                <button class="card_news collapsible_type">Politices</button>
                <div class="c_content">
                    <button class="card_news_type">Urdu</button>
                    <button class="card_news_type">English</button>
                </div>
                <button class="card_news collapsible_type ">Buisness</button>
                <div class="c_content">
                    <button class="card_news_type">Urdu</button>
                    <button class="card_news_type">English</button>
                </div >
                <button class="card_news collapsible_type ">Trending news</button>
                <div class="c_content">
                    <button class="card_news_type">Urdu</button>
                    <button class="card_news_type">English</button>
                </div>
                </div>
                
            </div>
            <div class="card">
                <button type="button" class="collapsible">
                    <img src="Logos/News_Companies/Dawn.jfif" alt="Dawn News">
                </button>
                <div class="c_content">
                <button class="card_news collapsible_type ">Politices</button>
                <div class="c_content">
                    <button class="card_news_type">Urdu</button>
                    <button class="card_news_type">English</button>
                </div>
                <button class="card_news collapsible_type">Buisness</button>
                <div class="c_content">
                    <button class="card_news_type">Urdu</button>
                    <button class="card_news_type">English</button>
                </div>
                <button class="card_news collapsible_type ">Trending news</button>
                <div class="c_content">
                    <button class="card_news_type">Urdu</button>
                    <button class="card_news_type">English</button>
                </div>
                 </div>
            </div>
            <div class="card">
            <button type="button" class="collapsible">
                <img src="Logos/News_Companies/tribune.png" alt="Tribune">
            </button>
            <div class="c_content">
            <button class="card_news collapsible_type">Politices</button>
            <div class="c_content">
                <button class="card_news_type">Urdu</button>
                <button class="card_news_type">English</button>
            </div>
            <button class="card_news collapsible_type">Buisness</button>
            <div class="c_content">
                <button class="card_news_type">Urdu</button>
                <button class="card_news_type">English</button>
            </div>
            <button class="card_news collapsible_type">Trending news</button>
            <div class="c_content">
                <button class="card_news_type" id="test">Urdu</button>
                <button class="card_news_type">English</button>
                
            </div>
             </div>
            </div>
                                  
        </div>
        
              
    </section>
    

    {{-- ## on click call tribuneUrdu_world() function --}}
    





    

    {{-- Java Script --}}
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;        
        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
              content.style.display = "none";
            } else {
              content.style.display = "block";
            }
          });
        }
        </script>

        {{-- for collapsible_type --}}

    <script>
        var coll = document.getElementsByClassName("collapsible_type");
        var i;        
        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
              content.style.display = "none";
            } else {
              content.style.display = "block";
            }
          });
        }
        </script>

        {{-- on start of the page, the first collapsible section is off --}}


    <!-- Footer -->
    <section class="footer" style="color: white;">
        <footer id="footer" class="card-footer">
            <div class="container-footer">
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