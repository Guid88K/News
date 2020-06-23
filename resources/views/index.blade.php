<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
</head>
<body>
<style>
    .pagination > li > a,
    .pagination > li > span {
        color: black;
    }

    .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #050405;
        border-color: #050405;
    }
</style>
<div class="container">
    <div class="row  mt-2 border border-bottom-0">
        <div class="col-md-3   ">
            <h1 class="text-uppercase font-weight-bold mt-3">today</h1>
            <small>Just another WPExplorer Demons site</small>
        </div>
        <div class="col-md-9 p-4  ">
            <a href="{{asset('/unews')}}">
                <img src="{{asset('image/Sites%20(2).png')}}" class="img-fluid w-100 ">
            </a>
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
                            <li class="nav-item"><a class="nav-link"
                                                    href="{{asset('/unews')}}"> @lang('message.Всі')</a></li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="{{asset('/busy_filter')}}">  @lang('message.Бізнес')</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('/marketing_filter')}}"> @lang('message.Маркетинг')</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="{{asset('/management_filter')}}">@lang('message.Управління')</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('/finances_filter')}}">@lang('message.Фінанси')</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('/other_filter')}}">@lang('message.Різне')</a></li>
                            @if(Auth::check() && Auth::user()->is_admin)
                                <li class="nav-item"><a class="nav-link" href="{{url('/admin/news')}}">Admin</a></li>
                            @endif
                        </ul>

                    </div>
                    <ul class="navbar-nav">
                        <a href="{{url('setlocale/ru')}}">
                            <li class="mx-3 text-dark">Ru</li>
                        </a>
                        <a href="{{url('setlocale/ua')}}">
                            <li class="text-dark">Uk</li>
                        </a>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="row bg-light">

        <div class="col-lg-8  p-3 ">

            <div class="bg-white border p-3 mb-3">

                @foreach($news as $new)
                    @if($loop->first)
                        <div class="bg-white border p-3 mb-3">
                            <a href="{{ route('unews.show', ['id' => $new->id])}}">
                                <img src="{{ asset('upload/'.$new->image)}}" class="img-fluid">
                            </a>

                            @if($new->categories == 'business')
                                <button type="button" class="text-white my-4 text-uppercase px-2 py-1"
                                        style=" border: none; background-color: black;">@lang('message.Бізнес')
                                </button>
                            @elseif($new->categories == 'marketing')
                                <button type="button" class="text-white my-4 text-uppercase px-2 py-1"
                                        style=" border: none; background-color: black;">@lang('message.Маркетинг')
                                </button>
                            @elseif($new->categories == 'finances')
                                <button type="button" class="text-white my-4 text-uppercase px-2 py-1"
                                        style=" border: none; background-color: black;">@lang('message.Фінанси')
                                </button>
                            @elseif($new->categories == 'other')
                                <button type="button" class="text-white my-4 text-uppercase px-2 py-1"
                                        style=" border: none; background-color: black;">@lang('message.Різне')
                                </button>
                            @elseif($new->categories == 'management')
                                <button type="button" class="text-white my-4 text-uppercase px-2 py-1"
                                        style=" border: none; background-color: black;">@lang('message.Управління')
                                </button>
                            @endif

                            <h2 class="text-uppercase font-weight-bold" style="color: black;">{{ $new->title}}</h2>
                            <small> {{$new->updated_at}}</small>
                            <p class="mt-2"
                               style="font-size: 13px;"> {{mb_strcut(strip_tags($new->content),1,100)."..."}} </p>
                            <a href="{{route('unews.show',['id'=>$new->id])}}">
                                <button type="button" class="btn btn-outline-dark" style="border-radius: 0px;">@lang('message.дізнатисябільше')
                                </button>
                            </a>

                        </div>
                    @endif
                @endforeach
            </div>
            <div class="row ">
                <div class="col-md-12 mx-auto p-3  ">

                    <div class="row">

                        @foreach($news as $new)
                            @if(!($loop->first))

                                <div class="col-md-6 ">
                                    <div class="bg-white p-3 mb-3 border">
                                        <a href="{{ route('unews.show', ['id' => $new->id])}}"><img
                                                    src="{{ asset('upload/'.$new->image)}}" class="img-fluid"
                                                    style="min-width: 253px; min-height: 190px;"></a>
                                        <div class="col-md-11 p-0 mx-auto">
                                            @if($new->categories == 'business')
                                                <a href="{{asset('/busy_filter')}}">
                                                    <button type="button"
                                                            class="text-white my-4 text-uppercase px-2 py-1"
                                                            style=" border: none; background-color: black;">@lang('message.Бізнес')
                                                    </button>
                                                </a>
                                            @elseif($new->categories == 'marketing')
                                                <a href="{{asset('/marketing_filter')}}">
                                                    <button type="button"
                                                            class="text-white my-4 text-uppercase px-2 py-1"
                                                            style=" border: none; background-color: black;">@lang('message.Маркетинг')
                                                    </button>
                                                </a>
                                            @elseif($new->categories == 'finances')
                                                <a href="{{asset('/finances_filter')}}">
                                                    <button type="button"
                                                            class="text-white my-4 text-uppercase px-2 py-1"
                                                            style=" border: none; background-color: black;">@lang('message.Фінанси')
                                                    </button>
                                                </a>
                                            @elseif($new->categories == 'other')
                                                <a href="{{asset('/other_filter')}}">
                                                    <button type="button"
                                                            class="text-white my-4 text-uppercase px-2 py-1"
                                                            style=" border: none; background-color: black;">@lang('message.Різне')
                                                    </button>
                                                </a>
                                            @elseif($new->categories == 'management')
                                                <a href="{{asset('/management_filter')}}">
                                                    <button type="button"
                                                            class="text-white my-4 text-uppercase px-2 py-1"
                                                            style=" border: none; background-color: black;">@lang('message.Управління')
                                                    </button>
                                                </a>
                                            @endif
                                            <h4 class="text-uppercase font-weight-bold"
                                                style="color: black;"> {{ $new->title}}</h4>
                                            <small> {{$new->updated_at}}</small>
                                            <p class="mt-2"
                                               style="font-size: 13px;"> {{mb_strcut(strip_tags($new->content),1,100)."..."}} </p>
                                            <a href="{{route('unews.show',['id'=>$new->id])}}">
                                                <button type="button" class="btn btn-outline-dark"
                                                        style="border-radius: 0px;">
                                                    @lang('message.дізнатисябільше')
                                                </button>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>


                    <div class="btn-toolbar mt-4" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                            {{--                            <button type="button" class="btn btn-outline-dark mx-1" style="border-radius: 0px;"> --}}
                            {{--                            </button>--}}
                            {{--                            <button type="button" class="btn btn-outline-dark mx-1"></button>--}}
                            {{--                            <button type="button" class="btn btn-outline-dark mx-1">3</button>--}}
                            {{--                            <button type="button" class="btn btn-outline-dark mx-1" style="border-radius: 0px;">4--}}
                            {{--                            </button>--}}
                            {{ $news->links('paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg py-3  m-3 ">

            <form class="form-inline  my-2 my-lg-0 justify-content-start" action="{{asset('/search')}}" method="get">
                <input class="form-control border btn-outline-light mr-sm-2 w-75 pl-5" name="search" type="search"
                       placeholder="  Search..."
                       aria-label="Search">
                <button class="btn btn-outline-dark bg-dark  my-sm-0" name="Search" type="submit"><i
                            class="fa fa-search text-white"></i></button>
            </form>

            <div class=" mt-4 border-right bg-white border-left border-bottom p-3 mb-4 "
                 style="border-top: 6px solid #000">

                <h1 class="  border-bottom text-uppercase font-weight-bold pb-3" style="font-size: 25px;">@lang('message.останніновини')</h1>
                <ul style="font-size: 13px;">
                    @foreach($news as $new)
                        <a href="{{ route('news.show', ['id' => $new->id])}}">
                            <li class="text-dark">
                                {{$new->title}}
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
            <div class="bg-white">
                <img class="img-fluid" src="{{asset('image/logo.jpg ')}}">
            </div>
            <div class=" mt-4 border-right bg-white border-left border-bottom p-3 mb-4 "
                 style="border-top: 6px solid #000">
                <h1 class="  border-bottom text-uppercase font-weight-bold pb-3" style="font-size: 25px;">
                    @lang('message.категорії')
                    </h1>
                <ul style=" font-size: 13px;">

                    <li>
                        <a class="text-dark" href="{{asset('/unews')}}"> @lang('message.Всі') </a>
                    </li>
                    <li>
                        <a class="text-dark" href="{{asset('/busy_filter')}}">@lang('message.Бізнес') </a>
                    </li>
                    <li>
                        <a class="text-dark" href="{{asset('/marketing_filter')}}">@lang('message.Маркетинг')</a>
                    </li>
                    <li>
                        <a class="text-dark" href="{{asset('/management_filter')}}">@lang('message.Управління')</a>
                    </li>
                    <li>
                        <a class="text-dark" href="{{asset('/finances_filter')}}">@lang('message.Фінанси')</a>
                    </li>
                    <li>
                        <a class="text-dark" href="{{asset('/other_filter')}}">@lang('message.Різне')</a>
                    </li>
                </ul>
            </div>
            {{--            <div class=" mt-4 border-right bg-white border-left border-bottom p-3 mb-4 "--}}
            {{--                 style="border-top: 6px solid #000">--}}
            {{--                <h1 class="  border-bottom text-uppercase font-weight-bold pb-3" style="font-size: 25px;">Archives</h1>--}}
            {{--                <ul style="font-size: 13px;">--}}
            {{--                    <li>--}}
            {{--                        Lorem consectetur--}}
            {{--                    </li>--}}
            {{--                    <li>--}}
            {{--                        Dolor adipisicing--}}
            {{--                    </li>--}}
            {{--                    <li>--}}
            {{--                        Adipisci amet--}}
            {{--                    </li>--}}
            {{--                </ul>--}}
            {{--            </div>--}}
        </div>

        {{--            <div class="container">--}}
        {{--                <div class="row">--}}
        {{--                    <div class="p-4 col-md-3">--}}
        {{--                        <h2 class="mb-4">Pingendo</h2>--}}
        {{--                        <p>A company for whatever you may need, from website prototyping to publishing</p>--}}
        {{--                        <div class="ml-4">--}}
        {{--                            <i class="mr-3 fa fa-twitter "></i>--}}
        {{--                            <i class="mr-3 fa fa-facebook "></i>--}}
        {{--                            <i class="mr-3 fa fa-google-plus "></i>--}}
        {{--                            <i class="mr-3 fa fa-pinterest-square "></i>--}}
        {{--                        </div>--}}


        {{--                    </div>--}}

        {{--                    <div class="p-4 col-md-3">--}}
        {{--                        <h2 class="mb-4">Mapsite</h2>--}}
        {{--                        <ul class="list-unstyled"><a href="#" class="text-dark">Home</a> <br> <a href="#"--}}
        {{--                                                                                                 class="text-dark">About--}}
        {{--                                us</a> <br> <a href="#" class="text-dark">Our services</a> <br> <a href="#"--}}
        {{--                                                                                                   class="text-dark">Stories</a>--}}
        {{--                        </ul>--}}
        {{--                    </div>--}}
        {{--                    <div class="p-4 col-md-3">--}}
        {{--                        <h2 class="mb-4">Contact</h2>--}}
        {{--                        <p><a href="#" class="text-dark">--}}
        {{--                                <i class="fa d-inline mr-3 text-muted fa-phone"></i>+246 - 542 550 5462</a></p>--}}
        {{--                        <p><a href="#" class="text-dark">--}}
        {{--                                <i class="fa d-inline mr-3 text-muted fa-envelope-o"></i>info@pingendo.com</a></p>--}}
        {{--                        <p><a href="#" class="text-dark">--}}
        {{--                                <i class="fa d-inline mr-3 fa-map-marker text-muted"></i>365 Park Street, NY</a></p>--}}
        {{--                    </div>--}}
        {{--                    <div class="p-4 col-md-3">--}}
        {{--                        <h2 class="mb-4">Subscribe</h2>--}}
        {{--                        <form>--}}
        {{--                            <fieldset class="form-group"><label for="exampleInputEmail1">Get our newsletter</label>--}}
        {{--                                <input type="email" class="form-control" placeholder="Enter email"></fieldset>--}}
        {{--                            <button type="submit" class="btn btn-outline-dark">Submit</button>--}}
        {{--                        </form>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
    </div>
    <div class="row">
        <div class="col-12 mt-3 mx-auto text-center">
            <p class="text-center">© Copyright 2018 Pingendo - All rights reserved. </p>
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
</body>
</html>