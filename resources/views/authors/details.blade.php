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
            .box-center {
                width:800px;
                margin: 0 auto;
                text-align: center;
                border:1px solid #ccc;
            }
        </style>
    </head>

    <body>
        <br/>
        @if(isset(Auth::user()->email))
        <div class="container box">
            <h3 align="center">Pusat Informasi Daftar Buku dan Penulis</h3><br />
            
                <div class="alert alert-danger success-block">
                    <strong>Welcome {{ Auth::user()->name }}</strong>
                    <br />
                    <a href="{{ url('/main/logout') }}">Logout</a>
                </div>
        </div>

        <br/>
        
        <div class="container box-center">
        @if(!$details->isEmpty())
            <h4>{{ $details[0]->title }}</h4>
                <br/>
                <img src="{{ $details[0]->img_url }}" height="300">
                <br/>
                <br/>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>First Name</td>
                            <td>{{ $details[0]->first_name }}</td>
                        </tr>

                        <tr>
                            <td>Last Name</td>
                            <td>{{ $details[0]->last_name }}</td>
                        </tr>

                        <tr>
                            <td>Books</td>
                            <td> 
                            @foreach ($details as $detail)
                                <p>{{ $detail->title }}</p>
                            @endforeach
                            </td>
                        </tr>

                    </tbody>
                </table>
        @else
            No details available!
        @endif
        </div>
        <br/><br/>
        @else
            <script>window.location = "/main";</script>
        @endif
    </body>
</html>