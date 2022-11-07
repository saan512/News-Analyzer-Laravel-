<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Support Us</title>

    <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="container_nav flex">
            <h1 class="logo">News Analyzer</h1>
            <nav>
                <ul>
                    <li><a href="{{url('/home')}}">Home</a></li>
                    <li><a href="{{url('supportus')}}">Support Us</a></li>
                    <li><a href="Docs.htm">Docs</a></li>
                </ul>
            </nav>
        </div>
    </div>


    <!-- Information -->
    <section class="showcase">
        <div class="container grid">
            <div class="showcase-text card">
                <h2>Developers Information</h2>
                <pre>
                   Name:   Syed Aqeel Abbas Naqvi
                   Ph:     +923109279605
                   Email:  aqeeshah273@gmail.com

                   Name:   Muhammad Tauseef Anjum
                   Ph:     Private
                   Email:  Private
               </pre>
            </div>

            

            <div class="showcase-form card container">
                <h2>Ask Us Any Question</h2>
                <form>
                    <div class="form-control">
                        <input type="text" name="name" placeholder="Name" required>
                    </div class="form-control">
                    <div>
                        <input type="Email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-control">
                        <input type="text" name="Question" placeholder="Type Your question here">
                    </div>
                    <input type="submit" value="Send" class="btn">
                </form>
            </div>
        </div>

        {{-- <div class="container grid">
            <div class="showcase-text card">
                <h2>Developers Information</h2>
                <pre>
                    Name:   Muhammad Tauseef Anjum
                    Ph:     Private
                    Email:  Private
                </pre>
            </div>
        </div> --}}

    </section>


        <!-- Adding Table for Adding questions for users -->

        <Section class="showcase-faq" style="background-color: #333;">
            <div class="container-faq">
                <h2>Already Asked Questions</h2>
                <table class="tbl">
                    <tr>
                        <td>
                        <pre>
                        <b>What is the price accuracy rate according to current market?</b>
                        Price Prediction Accuracy varries according to the region(Country/area ) yor are in.
                        </pre>
                    </td>
                    </tr>

                    <tr>
                        <td>
                        <pre>
                        <b>When Other Companies like Apple, Samsung etc. will be added?</b>
                        Web Optimization is on the way, an update will occur in 2 weeks.
                    </pre>
                    </td>
                    </tr>

                    
                </table>
            </div>
        </Section>
</body>

</html>