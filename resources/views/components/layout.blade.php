<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mark's Portfolio</title>
    @vite(['resources/css/app.css'])
    @if (Request::path() == 'admin')
        @vite(['resources/css/admin.css'])
    @endif
    @if (Request::path() == 'create-post')
        @vite(['resources/css/create-post.css'])
    @endif
</head>

<body>
    <header id="header">
        <div id="headerContainer">
            <h1>Mark's Portfolio</h1>
            <nav id="navbar">
                <a href="">Projects</a>
                <a href="">Contact Me</a>
            </nav>
        </div>
    </header>

    <div id="content">{{ $slot }}</div>

    <footer id="footer">
        <div id="footerContainer">
            <h1>Footer</h1>
        </div>
    </footer>
</body>

</html>
