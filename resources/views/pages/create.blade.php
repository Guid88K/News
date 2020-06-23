<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{assert('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('main.css')}}">
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-2 mh-100 bg-dark ">
            <div class="btn-group-vertical w-100">
                <img class="img-fluid my-3" src="{{asset('image/logo.jpg')}}">
                <a href="{{url('/unews')}}"><button type="button" class="btn btn-dark w-100 mb-2">Головна</button></a>
                <a href="{{url('/admin/news/create')}}"><button type="button" class="btn btn-dark w-100 mb-2 ">Добавити новину</button></a>
                <a ><button type="button" class="btn btn-dark mb-2 w-100 ">Управління</button></a>
                <a ><button type="button" class="btn btn-dark mb-2 w-100 ">Налаштування</button></a>
            </div>
        </div>
        <div class="col-lg-9 pt-5 pb-4" style="background-color: #dbddde;">

            <div class="card uper">
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    @csrf

                                    <label for="exampleFormControlSelect1">Категорія</label>
                                    <select class="form-control" name="categories">
                                        <option value="business" >Бізнес</option>
                                        <option value="marketing">Маркетинг</option>
                                        <option value="management">Управління</option>
                                        <option value="finances">Фінанси</option>
                                        <option value="other">Різне</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="name">Заголовок</label>
                                    <input type="text" class="form-control" name="title"/>
                                </div>
                            </div>



                        </div>
                        <div class="row">

                            <div class="col">
                                <div class="modal-body">
                                    <div class="form-group">

                                        <label for="text">Текст</label>
                                        <textarea class="form-control summernote" name="detail"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">

                            <button type="submit" class="btn btn-dark">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
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
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 500,
        });
    });
</script>

</body>
</html>
