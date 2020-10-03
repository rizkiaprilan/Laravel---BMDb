<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>@yield('title')</title>
    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        #container {
            min-height: 100%;
            position: relative;
        }


        #body {
            padding: 10px;
            padding-bottom: 60px; /* Height of the footer */
        }

        #footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px; /* Height of the footer */
        }

    </style>
</head>
<body>
<div id="container">
    <div id="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/"><b style="color: gold">BMDb</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="text-decoration: none" class="nav-link dropdown-toggle"
                                   href="#"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                   v-pre>
                                    Manage <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="/manage/user" class="dropdown-item">User</a>
                                    <a href="/manage/movie" class="dropdown-item">Movie</a>
                                    <a href="/manage/genre" class="dropdown-item">Genre</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </ul>
                <form class="form-inline my-2 my-lg-0 ">
                    <label id="timer" style="color: white" class="mr-auto mr-sm-4"></label>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="text-decoration: none" class="nav-link dropdown-toggle"
                                   href="#"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                   v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="/profile/view/{{Auth::user()->id}}" class="dropdown-item">Profile</a>
                                    <a href="/logout" class="dropdown-item">Log Out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </nav>
    </div>
    <div id="body">
        <br>
        @yield('content')
        <br>
    </div>
    <div id="footer">
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>&copy; 2019 Copyright <b style="color: gold">BMDb.com</b>.</small>
        </div>
    </footer>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script>
    setInterval(function () {
        var currentTime = new Date();
        var currentHours = currentTime.getHours();
        var currentMinutes = currentTime.getMinutes();
        var currentSeconds = currentTime.getSeconds();
        var currentday = currentTime.getDate();
        var currentmonth = currentTime.getMonth();
        var currentyear = currentTime.getFullYear();
        currentHours = (currentHours < 10 ? "0" : "") + currentHours;
        currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
        currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;
        currentday = (currentday < 10 ? "0" : "") + currentday;
        currentmonth = (currentmonth < 10 ? "0" : "") + currentmonth;
        currentyear = (currentyear < 10 ? "0" : "") + currentyear;
        var currentTimeString = currentyear + "-" + currentday + "-" + currentmonth + " " + currentHours + ":" + currentMinutes + ":" + currentSeconds;
        document.getElementById("timer").innerHTML = currentTimeString;
    });  //delay java script satuannya milisecond -> second = second x 1000
</script>
</body>
</html>
