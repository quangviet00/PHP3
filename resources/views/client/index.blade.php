<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Trang Chủ</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        margin: auto;
        padding: auto;
    }

    .logo {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .menu {
        padding: 10px;
    }

    .menu ul {
        list-style-type: none;
        text-align: center;
    }

    .menu ul li {
        display: inline-table;
        width: 140px;
        height: 30px;
        line-height: 30px;
    }

    .menu ul li a {
        height: 30px;
        color: rgb(0, 0, 0);
        text-decoration: none;
    }

    .menu a:hover {
        color: rgb(71, 71, 71);
        background: burlywood;
        border-bottom: rgb(255, 0, 0);
    }

    main {
        padding: 10px;
    }



    footer {
        background: rgb(5, 5, 70);
        height: 50px;
        color: rgb(255, 255, 255);
    }

    footer p {
        padding: 20px;
    }

    footer .slec {
        position: absolute;
        padding-left: 1100px;
        padding-top: 10px;
    }

    .inp {
        width: 200px;
        height: 30px;
        border-radius: 3px;
    }

    .send {
        height: 35px;
        background: darkgoldenrod;
        color: white;
        width: 50px;
        border-radius: 3px;
    }
</style>

<body>
    <header>
        <div class="menu">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li><a href="#">Destinations</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Landing</a></li>
                <li><a href="#">Shop</a></li>
            </ul>
        </div><img src="./img/logo.png" alt="" class="logo">
        <img src="./img/banner.jpg" alt="" width="100%">


    </header>
    <table>

        <section class="trending-news section-box m-5">
            <div class="container">
                <div class="row">
                    @foreach ($new as $item)
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12 border border-dark m-1 rounded">
                            <div class="card-grid-5">
                                <div class="card-grid-5 hover-up"
                                    style="background-image: url('{{ $item->anh }}'); ">
                                    <img src="{{ $item->anh }}" alt="" width="250px">
                                    <a href="">
                                        <div class="box-cover-img">
                                            <div class="content-bottom">
                                                <h5 class="color-white mb-20 text-center">{{ $item->tieude }}</h5>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>



    </table>
    <footer>
        <div class="slec">
            <input type="text" class="inp" placeholder="Email Address">
            <input type="button" value="Send" class="send">
        </div>
        <p>© 2021 Qode Interactive, All Rights Reserved</p>


    </footer>


</body>

</html>
