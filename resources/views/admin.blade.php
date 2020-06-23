<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{assert('css/font-awesome.min.css')}}">

<body>
{{--@if(Auth::check() && Auth::user()->is_admin)--}}
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
            <div class="filter py-5 bg-white mx-4">
                <div class="row ">

                    <div class="col-lg-6">
                        <div class=" w-75 mx-auto">
                            <form>
                                <div class="form-group">
                                    <label for="inputDate">Введіть дату з:</label>
                                    <input type="date" class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="w-75 mx-auto">
                            <form>
                                <div class="form-group">
                                    <label for="inputDate">Введіть дату по:</label>
                                    <input type="date" class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @foreach($news as $new)
            <div class="block px-4  pt-5" style="background-color: #dbddde;">
                <div class=" bg-white  mb-3">
                    <div class="row">
                        <div class="col-md-2 ">
                            <p class=" text-center bg-light  rounded p-2 mx-2 mt-3 text-dark">{{$new->id}}</p>
                        </div>
                        <div class="col-md-4 ">
                            <p class="text-center mt-3 text-dark bg-light  rounded p-2 mx-2 ">{{$new->title}}</p>
                        </div>
                        <div class="col-md-2 ">
                            <a href="{{ route('news.show', ['id' => $new->id])}}"><button type="button" class="btn btn-dark  my-3  text-center">Переглянути</button></a>
                        </div>
                        <div class="col-md-2  text-center">
                          <a href="{{ route('news.edit', $new->id)}}"> <button type="button" class="btn btn-dark  text-center my-3 ">Редагувати</button></a>
                        </div>
                        <div class="col-md-2  ">
                            <form action="{{  route('news.destroy',$new->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark my-3  text-center ">Видалити</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                @endforeach
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
{{--    @endif--}}
</body>
</html>
