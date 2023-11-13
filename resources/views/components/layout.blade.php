<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mark's Portfolio</title>
    @vite(['resources/css/app.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap" rel="stylesheet">
    @if (Request::path() == 'admin')
        @vite(['resources/css/admin.css'])
    @endif
    @if (Request::path() == 'create-post')
        @vite(['resources/css/create-post.css'])
    @endif
    @if (Request::path() == '/')
        @vite(['resources/css/home.css'])

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        @vite(['resources/js/swiper.js'])
        @vite(['resources/js/weatherHandler.js'])
    @endif
    @if (Request::path() == 'contact')
        @vite(['resources/css/contact.css'])
    @endif

    @if (strpos(Request::path(), 'post/') !== false)
        @vite(['resources/css/post.css'])

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        @vite(['resources/js/swiper.js'])
    @endif

    @if (Request::path() == 'cv')
        @vite(['resources/css/cv.css'])
    @endif


</head>

<body>
    <header id="header">
        <div id="headerContainer">
            <h1><a class="headerTitle" href="{{ route('homePage') }}">Mark's Portfolio</a> </h1>
            <h1>
                <a href="{{ route('cv') }}" class="headerLink">CV</a>
            </h1>
            <h1>
                <a href="{{ route('contactMe') }}" class="headerLink">Contact Me</a>
            </h1>
        </div>
    </header>

    <div id="content">{{ $slot }}</div>

    <footer id="footer">
        <div id="footerContainer">
            <p class="text">Made using Javascript, PHP, Laravel, Blade and MySQL</p>
            <div id="profileContainer">
                <p class="text">Mark Paul William Mason&copy;</p>
                <a id="linkedInLink" href="https://www.linkedin.com/in/mark-mason-701ba01b0/" target="_blank"><img
                        id="linkedInIMG" src="/images/linkedin.webp" alt=""></a>
            </div>

        </div>
    </footer>
</body>


</html>
