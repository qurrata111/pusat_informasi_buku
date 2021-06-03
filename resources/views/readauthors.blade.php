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
        @if(isset(Auth::user()->email))
        <br/>
        <div class="container box">
            <h3 align="center">Perpustakaan Sederhana</h3><br />
            
                <div class="alert alert-danger success-block">
                    <strong>Welcome {{ Auth::user()->name }}</strong>
                    <br />
                    <a href="{{ url('/main/logout') }}">Logout</a>
                </div>

                <div class="form-group text-center">
                    <button type="button" onclick="window.location='{{ url('/main/books') }}'" class="btn btn-primary">CRUD Buku</button>
                </div>
        </div>

        <br/>
        
        <div class="container box">
            
            <br/>
            <div class="form-group text-center">
                <button type="button" onclick="window.location='{{ url('/main/createauthors') }}'" class="btn btn-primary">Tambah Penulis</button>
            </div>
            
            <br/>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <th scope="row">{{ $author->id }}</th>
                        <td>{{ $author->first_name }}</td>
                        <td>{{ $author->last_name }}</td>

                        <td>
                            <button type="button" onclick="window.location='{{ url('/main/editauthors', $author->id) }}'" class="btn btn-secondary">Edit</button>
                        </td>

                        <td>
                            <form method="post" action="{{ url('/main/deleteauthors', $author->id) }}">
                                {{ method_field('DELETE') }}
                                {{  csrf_field() }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        
        @else
            <script>window.location = "/main";</script>
        @endif
    </body>
</html>