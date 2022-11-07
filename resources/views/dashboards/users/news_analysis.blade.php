@extends('dashboards.users.layouts.user-dash-layout')
@section('title','News Analysis')

@section('content')
<head>
    <style>
        .showcase{
    /* margin: auto; */
    height: 380px;
    /* background-color: var(--primary-color); */
    background-color:#f1f1f1;
    color:  var(--primary-color);
    position: relative;
    /* overflow: visible; */
    }
    .container{
    /* max-width: 1100px; */
    max-width: auto;
    display: flex;
    margin: 0 auto;
    height: auto;
    overflow: auto;
    padding: 0 40px;
    overflow: visible;
    }
    .collapsible {
    background-color: white;
    color: white;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
  }
.collapsible_type {
    /* background-color: white; */
    /* color: white; */
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
  }
  .c_content:active{
    background-color: #f1f1f1;
    display: none;
    /* transition: max-height 0.2s ease-out; */
  }
  .active, .collapsible:hover , .collapsible_type:hover {
    background-color: #555;
  }
  
  .c_content {
    padding: 0 18px;
    display: none;
    overflow: hidden;
    background-color: #f1f1f1;
    transition: max-height 0.2s ease-out;
  }
    .card{
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0, 0.5);
    padding: 20px;
    margin: 10px;
    color: #333;
    width: 300px;
    
    
    /* height: 200px; */
    /* overflow: visible;     */
    }
    .news_link{
        display: inline-block;
        padding: 10px 30px;
        cursor: pointer;
        background-color: var(--primary-color);
        color: #333;
        border:none;
        border-radius: 5px;
    }
    .news_link:hover{
    transform: scale(.90);
    font-size: 22px;
    background-color: #333;
    color: #f1f1f1;
    /* transform: rotateX(-10deg); */
    }
    </style>
</head>

<body>
    

    <section class="Companies showcase">
        {{-- <h1 class="md text-center my-2">
            New Channels
        </h1> --}}
        {{-- <h6 style="text-align: end;"><a href="#">>>See more</a></h6> --}}
        <div class="container news-flex">
            
            <div class="card">
                <button type="button" class="collapsible">
                    <img src="Logos/News_Companies/Ary.jfif" alt="ARY_News">
                    {{-- <img src="url('{{url('logos/News_Companies/Ary.jfif')}}')" alt="ARY_News"> --}}
                </button>                
                    {{-- <h4>ARY News</h4> --}}                    
                <div class="c_content">                
                <button class="card_news collapsible_type" >World News</button>
                <div class="c_content">
                    <a href="http://127.0.0.10:8000/get-results-urdu/aryu_world" class="news_link">Urdu</a>
                    <a href="http://127.0.0.10:8000/get-results-english/ary_world" class="news_link">English</a>
                </div>
                <button class="card_news collapsible_type ">Buisness</button>
                <div class="c_content">
                    <a href="http://127.0.0.10:8000/get-results-urdu/aryu_business" class="news_link">Urdu</a>
                    <a href="http://127.0.0.10:8000/get-results-english/ary_business" class="news_link">English</a>
                </div >
                <button class="card_news collapsible_type ">Latest news</button>
                <div class="c_content">
                    <a href="http://127.0.0.10:8000/get-results-urdu/aryu_latest" class="news_link">Urdu</a>
                    <a href="http://127.0.0.10:8000/get-results-english/ary_latest" class="news_link">English</a>
                </div>
                </div>
                
            </div>
            <div class="card">
                <button type="button" class="collapsible">
                    <img src="Logos/News_Companies/Dawn.jfif" alt="Dawn News">
                </button>
                <div class="c_content">
                <button class="card_news collapsible_type ">World News</button>
                <div class="c_content">
                    <a href="http://127.0.0.10:8000/get-results-urdu/dawnu_world"  class="news_link">Urdu</a>
                    <a href="http://127.0.0.10:8000/get-results-english/dawn_world" class="news_link">English</a>
                </div>
                <button class="card_news collapsible_type">Buisness</button>
                <div class="c_content">
                    <a href="http://127.0.0.10:8000/get-results-urdu/dawnu_business" class="news_link">Urdu</a>
                    <a href="http://127.0.0.10:8000/get-results-english/dawn_business" class="news_link">English</a>
                </div>
                <button class="card_news collapsible_type ">Latest news</button>
                <div class="c_content">
                    <a href="http://127.0.0.10:8000/get-results-urdu/dawnu_latest" class="news_link">Urdu</a>
                    <a href="http://127.0.0.10:8000/get-results-english/dawn_latest" class="news_link">English</a>
                </div>
                </div>
            </div>
            <div class="card">
            <button type="button" class="collapsible">
                <img src="Logos/News_Companies/tribune2.png" alt="Tribune">
            </button>
            <div class="c_content">
            <button class="card_news collapsible_type">World News</button>
            <div class="c_content">
                <a href="http://127.0.0.10:8000/get-results-urdu/tribuneUrdu_world" class="news_link">Urdu</a>
                <a href="http://127.0.0.10:8000/get-results-english/tribune_world" class="news_link">English</a>
            </div>
            <button class="card_news collapsible_type">Buisness</button>
            <div class="c_content">
                <a href="http://127.0.0.10:8000/get-results-urdu/tribuneUrdu_business" class="news_link">Urdu</a>
                <a href="http://127.0.0.10:8000/get-results-english/tribune_buisness" class="news_link">English</a>
            </div>
            <button class="card_news collapsible_type">Latest news</button>
            <div class="c_content">
                <a href="http://127.0.0.10:8000/get-results-urdu/tribuneU_latest" class="news_link">Urdu</a>
                <a href="http://127.0.0.10:8000/get-results-english/tribune_latest" class="news_link">English</a>
                
            </div>
            </div>
            </div>
                                
        </div>
        
            
    </section>

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

</body>

@endsection