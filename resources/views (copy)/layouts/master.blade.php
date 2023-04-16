<html>
    <head>
        @if ($title)
                <title>{{ $title }}</title>
        @else
                <title>Example Laravel App</title>
        @endif
    </head>
    <body>
        <div><a href="/home">Home</a> | <a href="/about">About</a>
        <h1 id="HoraActual"> </h1>
        
        <hr/>
        <div class="container">
            @yield('banner')
        </div>
        <div class="container">
            @yield('content')
        </div>
        <script>
            $(document).ready(function(){
                myDate = new Date();
                hours = myDate.getHours();
                minutes = myDate.getMinutes();
                seconds = myDate.getSeconds();
                if (hours < 10) hours = 0 + hours;
                if (minutes < 10) minutes = "0" + minutes;
                if (seconds < 10) seconds = "0" + seconds;
                $("#HoraActual").text(hours+ ":" +minutes+ ":" +seconds);
                setTimeout("showTime()", 1000);
            });                        
        </script>
    </body>
</html>