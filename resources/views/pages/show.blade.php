<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>{{$news->title}}</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{mb_strcut($news->content,1,280)}}" />
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
            <a href="{{url('/unews')}}"> <img src="{{asset('image/Sites%20(2).png')}}" class="img-fluid w-100 "> </a>
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
                            <li class="nav-item"><a class="nav-link" href="{{asset('/unews')}}">@lang('message.Всі')</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('/busy_filter')}}">@lang('message.Бізнес')</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('/marketing_filter')}}">Маркетинг</a>
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
                        <ul class="navbar-nav">
                            <a href="{{url('setlocale/ru')}}">
                                <li class="mx-3 text-dark">Ru</li>
                            </a>
                            <a href="{{url('setlocale/ua')}}">
                                <li class="text-dark">Uk</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="row bg-light">
        <div class="col-lg-8  p-3 ">

            <div class="bg-white border p-3 mb-3">
                <img src="{{ asset('upload/'.$news->image)}}" class="img-fluid">
                @if($news->categories == 'business')
                    <button type="button" class="text-white my-4 text-uppercase px-2 py-1"
                            style=" border: none; background-color: black;">@lang('message.Бізнес')
                    </button>
                @elseif($news->categories == 'marketing')
                    <button type="button" class="text-white my-4 text-uppercase px-2 py-1"
                            style=" border: none; background-color: black;">@lang('message.Маркетинг')
                    </button>
                @elseif($news->categories == 'finances')
                    <button type="button" class="text-white my-4 text-uppercase px-2 py-1"
                            style=" border: none; background-color: black;">@lang('message.Фінанси')
                    </button>
                @elseif($news->categories == 'other')
                    <button type="button" class="text-white my-4 text-uppercase px-2 py-1"
                            style=" border: none; background-color: black;">@lang('message.Різне')
                    </button>
                @elseif($news->categories == 'management')
                    <button type="button" class="text-white my-4 text-uppercase px-2 py-1"
                            style=" border: none; background-color: black;">@lang('message.Управління')
                    </button>
                @endif

                {{--                <button type="submit" name="submit" value = "ukr" class="text-white my-4 text-uppercase px-2 py-1"--}}
                {{--                        style=" border: none; background-color: black;">UK--}}
                {{--                </button>--}}
                {{--                <button type="submit" name="submit" value = "rus" class="text-white my-4 text-uppercase px-2 py-1"--}}
                {{--                        style=" border: none; background-color: black;">RU--}}
                {{--                </button>--}}
                <h2 class="text-uppercase font-weight-bold" style="color: black;"> {{$news->title}}</h2>
                <small>  {{$news->updated_at}}</small>
                <p class="mt-2" style="font-size: 13px;">{!! $news->content !!}

                </p>

{{--                <button type="button" class="btn btn-outline-secondary" style="border-radius: 0px;">read more</button>--}}
            </div>

            {{--            <div>--}}

            {{--                <div class="container p-4 px-5">--}}
            {{--                    <div class=" text-center">--}}

            {{--                        <h4 class="mt-4">Comments</h4>--}}
            {{--                        <div class="row">--}}
            {{--                            <div class="col-md-3 text-left"><b>Name</b></div>--}}
            {{--                            <div class="col-md-3"></div>--}}
            {{--                            <div class="col-md-3"></div>--}}
            {{--                            <div class="col-md-3 text-left">12.09.2019</div>--}}
            {{--                        </div></div>--}}
            {{--                    <div class="row">--}}


            {{--                        <div class="col-md-9 ">--}}
            {{--                            <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit.--}}
            {{--                                Consequatur distinctio doloribus ex labore nesciunt veritatis voluptatem!--}}
            {{--                                Aspernatur delectus exercitationem in ipsum nemo officiis ullam.--}}
            {{--                                Cum dolorum ipsum non sapiente tempora!</p>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}


            {{--                    <div class="row">--}}
            {{--                        <div class="col-md-3 text-left"><b>Name</b></div>--}}
            {{--                        <div class="col-md-3"></div>--}}
            {{--                        <div class="col-md-3"></div>--}}
            {{--                        <div class="col-md-3 text-left">12.09.2019</div>--}}
            {{--                    </div>--}}
            {{--                    <div class="row">--}}


            {{--                        <div class="col-md-9 ">--}}
            {{--                            <p class="text-left">--}}
            {{--                                Consequatur distinctio doloribus ex labore nesciunt veritatis voluptatem!--}}

            {{--                                Cum dolorum ipsum non sapiente!</p>--}}
            {{--                        </div>--}}

            {{--                    </div>--}}





            {{--                    <h4 class="text-center mt-4 mb-5">Add Comments</h4>--}}
            {{--                    <div>--}}
            {{--                        <input type="text" class="form-control my-3" id="form27" placeholder="Name">--}}
            {{--                        <textarea class="form-control mb-3" id="form30" rows="3" placeholder="Your message"></textarea>--}}
            {{--                        <button type="submit" class="btn btn-dark">Send</button>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>


        <div class="col-lg py-3  m-3 ">
            <form class="form-inline  my-2 my-lg-0 justify-content-start ">
                <input class="form-control border btn-outline-light mr-sm-2 w-75 pl-5" type="search"
                       placeholder="  Search..."
                       aria-label="Search">
                <button class="btn btn-outline-dark bg-dark  my-sm-0" name="Search" type="submit"><i
                            class="fa fa-search text-white"></i></button>
            </form>

            <div class=" mt-4 border-right bg-white border-left border-bottom p-3 mb-4 "
                 style="border-top: 6px solid #000">
                <h1 class="  border-bottom text-uppercase font-weight-bold pb-3" style="font-size: 25px;">@lang('message.останніновини')</h1>
                <ul style="font-size: 13px;">
                    @foreach($all_news as $a)
                        <a href="{{ route('news.show', ['id' => $a->id])}}">
                            <li class="text-dark">
                                {{$a->title}}
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
            <div class="bg-white">
                <img class="img-fluid" src="{{asset('image/logo.jpg')}}">
            </div>
            <div class=" mt-4 border-right bg-white border-left border-bottom p-3 mb-4 "
                 style="border-top: 6px solid #000">
                <h1 class="  border-bottom text-uppercase font-weight-bold pb-3" style="font-size: 25px;">
                    @lang('message.категорії') </h1>
                <ul style="font-size: 13px;">
                    <li>
                        <a class="text-dark" href="{{asset('/unews')}}">  @lang('message.Всі') </a>
                    </li>
                    <li>
                        <a class="text-dark" href="{{asset('/busy_filter')}}">  @lang('message.Бізнес') </a>
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

            {{--            <div class=" mt-4 border-right bg-white border-left border-bottom p-3 mb-4 "--}}
            {{--                 style="border-top: 6px solid #000">--}}
            {{--                <h1 class="  border-bottom text-uppercase font-weight-bold pb-3" style="font-size: 25px;">I feel that I--}}
            {{--                    never was</h1>--}}
            {{--                <div class="mx-auto  col-lg-12 mt-4">--}}
            {{--                    <form>--}}
            {{--                        <div class="form-row">--}}
            {{--                            <div class="form-group col-md-6"><input type="text" class="form-control" id="form27"--}}
            {{--                                                                    placeholder="Name"></div>--}}
            {{--                            <div class="form-group col-md-6"><input type="email" class="form-control" id="form28"--}}
            {{--                                                                    placeholder="Email"></div>--}}
            {{--                        </div>--}}
            {{--                        <div class="form-group"><input type="text" class="form-control" id="form29"--}}
            {{--                                                       placeholder="Subject">--}}
            {{--                        </div>--}}
            {{--                        <div class="form-group"><textarea class="form-control" id="form30" rows="3"--}}
            {{--                                                          placeholder="Your message"></textarea>--}}
            {{--                        </div>--}}
            {{--                        <button type="submit" class="btn btn-dark">Send</button>--}}
            {{--                    </form>--}}

            {{--                </div>--}}
            {{--            </div>--}}


        </div>

        <div class="">

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
            {{--                        <ul class="list-unstyled"> <a href="#" class="text-dark">Home</a> <br> <a href="#" class="text-dark">About--}}
            {{--                                us</a> <br> <a href="#" class="text-dark">Our services</a> <br> <a href="#" class="text-dark">Stories</a>--}}
            {{--                        </ul>--}}
            {{--                    </div>--}}
            {{--                    <div class="p-4 col-md-3">--}}
            {{--                        <h2 class="mb-4">Contact</h2>--}}
            {{--                        <p> <a href="#" class="text-dark">--}}
            {{--                                <i class="fa d-inline mr-3 text-muted fa-phone"></i>+246 - 542 550 5462</a> </p>--}}
            {{--                        <p> <a href="#" class="text-dark">--}}
            {{--                                <i class="fa d-inline mr-3 text-muted fa-envelope-o"></i>info@pingendo.com</a> </p>--}}
            {{--                        <p> <a href="#" class="text-dark">--}}
            {{--                                <i class="fa d-inline mr-3 fa-map-marker text-muted"></i>365 Park Street, NY</a> </p>--}}
            {{--                    </div>--}}
            {{--                    <div class="p-4 col-md-3">--}}
            {{--                        <h2 class="mb-4">Subscribe</h2>--}}
            {{--                        <form>--}}
            {{--                            <fieldset class="form-group"> <label for="exampleInputEmail1">Get our newsletter</label> <input type="email" class="form-control" placeholder="Enter email"> </fieldset> <button type="submit" class="btn btn-outline-dark">Submit</button>--}}
            {{--                        </form>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3 mx-auto text-center">
            <p class="text-center">© Copyright 2018 Pingendo - All rights reserved. </p>
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