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
        @if(isset(Auth::user()->email))
        <div class="container box">
            <h3 align="center">Pusat Informasi Daftar Buku dan Penulis</h3><br />

                <div class="alert alert-danger success-block">
                    <strong>Welcome {{ Auth::user()->name }}</strong>
                    <br />
                    <a href="{{ url('/main/logout') }}">Logout</a>
                </div>

                <div class="form-group text-center">
                    <button type="button" onclick="window.location='{{ url('/main/authors') }}'" class="btn btn-primary">CRUD Penulis</button>
                </div>
        </div>

        <br/>
        
        <div class="container box">
            <h4 align="center">Daftar Buku</h3>
            <br/>
            <div class="form-group text-center">
                <button type="button" onclick="window.location='{{ url('/main/books/create') }}'" class="btn btn-primary">Tambah Buku</button>
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
                        <th scope="col">Image</th>
                        <th scope="col">Id</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Tanggal dibuat</th>
                        <th scope="col">Banyak Halaman</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($books as $book)
                    <tr>
                        <th scope="row">
                            <img src="{{$book->img_url}}" width="100" height="110">
                        </th>
                        <th scope="row">{{ $book->id }}</th>
                        <td>{{ $book->title }} </td>
                        <td>{{ $book->created_date }}</td>
                        <td>{{ $book->total_pages }}</td>

                        <td>
                            <button type="button" onclick="window.location='{{ url('/main/books/details', $book->id) }}'" class="btn btn-secondary">Details</button>
                        </td>

                        <td>
                            <button type="button" onclick="window.location='{{ url('/main/books/edit', $book->id) }}'" class="btn btn-secondary">Edit</button>
                        </td>

                        <td>
                            <form method="post" action="{{ url('/main/books/delete', $book->id) }}">
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
        <br/><br/>
        @else
            <script>window.location = "/main";</script>
        @endif
    </body>
</html>