<!doctype html>
<head>
    @yield('style')
</head>

<body>
<header>
        <nav>
            <div id="links">
                <a href="{{route('home')}}">Home</a>
                <a href="{{route('animali')}}">Animali</a>
                <a href="{{route('zoo')}}">Elenco Zoo</a>
                <a href="{{route('logout')}}">Log out</a>
            </div>
        </nav>
        @yield('title')
        <div class="overlay"></div>
    </header>
    @yield('content')
    <footer>
        <img src="img/logo.png">
        <p>Powered by Roberto Mirabella O46002068</p>
        <address>Università di Catania 2020/21</address>
    </footer> 
</body>
</html>