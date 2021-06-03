<!DOCTYPE html>
<html>
    <head>
        <title>Pusat Informasi Daftar Buku dan Penulis</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">
            .box {
                width:800px;
                margin:0 auto;
                border:1px solid #ccc;
            }
        </style>
    </head>

    <body>
        <br />
        <div class="container box">
            <h3 align="center">Pusat Informasi Daftar Buku dan Penulis</h3><br />

            @if(isset(Auth::user()->email))
                <div class="alert alert-danger success-block">
                    <strong>Welcome {{ Auth::user()->name }}</strong>
                    <br />
                    <a href="{{ url('/main/logout') }}">Logout</a>
                </div>

                <div class="form-group text-center">
                    <button type="button" onclick="window.location='{{ url('/main/books') }}'" class="btn btn-primary">CRUD Buku</button>
                </div>

                <div class="form-group text-center">
                    <button type="button" onclick="window.location='{{ url('/main/authors') }}'" class="btn btn-primary">CRUD Penulis</button>
                </div>
            @else
                <script>window.location = "/main";</script>
            @endif
            
            <br />
        </div>


    </body>
</html>