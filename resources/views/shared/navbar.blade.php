<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
   
    </head>

    <body class="container">
        <div>
            <nav>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                      <a class="nav-link active" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/einfo/{{$id}}">Edit Info</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Logout</a>
                    </li>
                  </ul>
            </nav>
        </div>

        @yield('body')
    </body>
</html>