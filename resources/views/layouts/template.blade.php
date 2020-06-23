<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">


    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">


    <link rel="stylesheet" href="{{asset('main.css')}}">

</head>
<body>
<div class="container">
    <div class="row  mt-2 border border-bottom-0">
        <div class="col-md-3   ">
            <h1 class="text-uppercase font-weight-bold mt-3">today</h1>
            <small>Just another WPExplorer Demons site</small>
        </div>
        <div class="col-md-9 p-4  ">
            <img src="{{asset('image/Sites%20(2).png')}}" class="img-fluid w-100 ">
        </div>
        <div class="col-md-12 p-0 " style="border-bottom: 6px solid #000">
            <nav class="navbar navbar-expand-md navbar-light border-top">
                <div class="container">
                    <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse"
                            data-target="#navbar6">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar6">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="mr-3"><i class="fa fa-twitter "></i></li>
                            <li class="mr-3"><i class="fa fa-facebook"></i></li>
                            <li class="mr-3"><i class="fa fa-google-plus"></i></li>
                            <li class="mr-3"><i class="fa fa-pinterest-square"></i></li>
                            <li class="mr-3"><i class="fa fa-cog"></i></li>
                            <li class="mr-3"><i class="fa fa-wifi"></i></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="card uper">
        <div class="card-header">
            Add News
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
                <div class="form-group">
                    @csrf
                    <label for="name">Заголовок</label>
                    <input type="text" class="form-control" name="title"/>
                </div>

                <div class="modal-body">
                    <div class="form-group">

                        <label for="text">Текст</label>
                        <textarea class="form-control summernote" name="detail"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="author">Изображение:</label>
                    <input type="file" class="form-control" name="image"/>
                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
</script>

<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>
</html>