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
        
        <div class="container box">
            <h4 align="center">Edit Buku</h3>
            <br/>
            <form method="post" action="{{ url('/main/books/update', $book->id) }}" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" value="{{$book->title}}" name="title" class="form-control" />
                </div>

                <div class="form-group">
                    <label>Total Pages</label>
                    <input type="number" value="{{$book->total_pages}}" name="total_pages" class="form-control" />
                </div>

                <div class="form-group">
                    <label>Tanggal dibuat</label>
                    <input type="date" value="{{$book->created_date}}" name="created_date" class="form-control" />
                </div>

                <div class="form-group">
                    <label>URL Gambar</label>
                    <input type="text" value="{{$book->img_url}}" name="img_url" class="form-control" />
                </div>

                <div class="form-group">
                    <label>Isi</label>
                    <input type="text" value="{{$book->content}}" name="content" class="form-control" />
                </div>

                <div class="form-group text-right">
                    <button type="button" onclick="window.location='{{ url('/main/books') }}'" class="btn btn-danger">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Save"/>
                </div>
            </form>

        </div>
        @else
            <script>window.location = "/main";</script>
        @endif
    </body>
</html>