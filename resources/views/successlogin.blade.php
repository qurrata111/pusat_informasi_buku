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
        <br />
        <div class="container box">
            <h3 align="center">Perpustakaan Sederhana</h3><br />

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

        <!-- Show list CRUD App of Books and Authors -->

        <!-- <div class="container box">
            
            <h3 align="center">Perpustakaan Sederhana</h3><br />

            <div class="form-group text-center">
                <button type="button" class="btn btn-primary">Tambah Buku</button>
            </div>

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
                    <tr>
                        <th scope="row">
                            <img src="https://www.pixsy.com/wp-content/uploads/2021/04/ben-sweet-2LowviVHZ-E-unsplash-1.jpeg" width="100" height="110">
                        </th>
                        <th scope="row"> id </th>
                        <td> title </td>
                        <td> created_date </td>
                        <td> $book->total_pages </td>
                        <td>
                            <button type="button" class="btn btn-secondary">Edit</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <img src="https://www.pixsy.com/wp-content/uploads/2021/04/ben-sweet-2LowviVHZ-E-unsplash-1.jpeg" width="100" height="110">
                        </th>
                        <th scope="row">1</th>
                        <td>ya judul</td>
                        <td>ya tanggal</td>
                        <td>ya banyak halaman</td>
                        <td>
                            <button type="button" class="btn btn-secondary">Edit</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>   

                </tbody>
            </table>
        </div>

        <br />

        <div class="container box">
            
            <h3 align="center">Perpustakaan Sederhana</h3><br />

            <div class="form-group text-center">
                <button type="button" class="btn btn-primary">Tambah Penulis</button>
            </div>

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
                    <tr>
                        <th scope="row">1</th>
                        <td>Ya first name</td>
                        <td>Ya last name</td>
                        <td>
                            <button type="button" class="btn btn-secondary">Edit</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">2</th>
                        <td>Ya first namee</td>
                        <td>Ya last namee</td>
                        <td>
                            <button type="button" class="btn btn-secondary">Edit</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div> -->


    </body>
</html>