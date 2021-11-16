<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Ice Cream Finder</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<div class="hero_area">
    <div class="hero_bg_box">
        <img src="{{asset('hero-bg.jpg')}}" alt="bg-image">
    </div>
    <header class="header_section">
        <div class="container-fluid">
            @include('layout.navbar')
        </div>
    </header>
    <div class="container">
        <div class="row justify-content-end">
                    <div class="col-xl-8 detail-box">
                        <h1 class="col-10 text-end">Welcome to our Ice Cream Shop</h1>
                        <p class="text-end">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio omnis fugit, sed
                            tempora praesentium commodi error, hic recusandae repudiandae neque ad
                            molestias, atque veritatis labore quae eveniet autem in
                        </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        color: #0c0c0c;
        background-color: #ffffff;
        overflow-x: hidden;
    }

    .detail-box {
        color: #fff;
        padding: 10vh;
    }


    .hero_area .hero_bg_box {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
    }

    .hero_area .hero_bg_box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: left bottom;
    }

    .hero_area .hero_bg_box::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }


    .header_section .container-fluid {
        padding-right: 25px;
        padding-left: 25px;
    }

    .navbar-brand span {
        color: #f26483;
    }

    .custom_nav-container .navbar-nav {
        margin-left: auto;
    }

    .custom_nav-container .navbar-nav .nav-item .nav-link {
        padding: 5px 30px;
        color: #ffffff;
        text-align: center;
        text-transform: uppercase;
        border-radius: 5px;
        font-size: 15px;
        -webkit-transition: all .3s;
        transition: all .3s;
    }

    .custom_nav-container .navbar-nav .nav-item .nav-link i {
        margin-right: 5px;
    }

    .custom_nav-container .navbar-nav .nav-item:hover .nav-link {
        color: #f26483;
    }

    .custom_nav-container .nav_search-btn {
        width: 35px;
        height: 35px;
        padding: 0;
        border: none;
        color: #ffffff;
    }

    .custom_nav-container .nav_search-btn:hover {
        color: #f26483;
    }

    .custom_nav-container .navbar-toggler {
        outline: none;
    }

    .custom_nav-container .navbar-toggler {
        padding: 0;
        width: 37px;
        height: 42px;
        -webkit-transition: all .3s;
        transition: all .3s;
    }

    .slider_section .detail-box {
        color: #ffffff;
    }

    .slider_section .detail-box h1 {
        font-weight: 600;
        margin-bottom: 15px;
        color: #ffffff;
    }

    .slider_section .detail-box a {
        display: inline-block;
        padding: 10px 45px;
        background-color: #f26483;
        color: #ffffff;
        border-radius: 0;
        -webkit-transition: all .3s;
        transition: all .3s;
        border: 1px solid #f26483;
    }

    .slider_section .detail-box a:hover {
        background-color: transparent;
        color: #f26483;
    }

    .slider_section .img-box img {
        width: 100%;
    }

    .slider_section .carousel_btn-box {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin: 45px auto 0 auto;
    }

    .slider_section .carousel_btn-box a {
        position: unset;
        top: 50%;
        width: 50px;
        height: 50px;
        background-color: #ffffff;
        opacity: 1;
        color: #000000;
        font-size: 16px;
        -webkit-transition: all .2s;
        transition: all .2s;
        margin: 0 5px;
    }

    .slider_section .carousel_btn-box a:hover {
        background-color: #f26483;
        color: #ffffff;
    }

</style>
