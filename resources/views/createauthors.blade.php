<!DOCTYPE html>
<html>
    <head>
        <title>Perpustakaan Sederhana</title>
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
        <br/>>
        @if(isset(Auth::user()->email))
        <div class="container box">
            <h3 align="center">Perpustakaan Sederhana</h3><br />
                <div class="alert alert-danger success-block">
                    <strong>Welcome {{ Auth::user()->name }}</strong>
                    <br />
                    <a href="{{ url('/main/logout') }}">Logout</a>
                </div>
        </div>
        <br/>
        <div class="container box">
        <br/>
            <form method="post" action="/main/authors" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" />
                </div>

                <div class="form-group">
                    <label>Last Name </label>
                    <input type="text" name="last_name" class="form-control" />
                </div>

                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary"/>
                </div>
            </form>
        </div>
        @else
            <script>window.location = "/main";</script>
        @endif
    </body>
</html>