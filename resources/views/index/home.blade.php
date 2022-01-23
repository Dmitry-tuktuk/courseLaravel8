@extends('layouts.main')

@section('title')@parent - {{ $title }} @endsection

@section('header')

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1>{{ mb_strtoupper($h1) }}</h1>

                {{--Для JS-framework--}}
                {{--@{{ title }}--}}

                {{-- title --}}

            </div>

        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div>
{{--                @if (count($date1) > 20)
                    <p>Count > 20</p>
                @elseif(count($date1) < 20)
                    <p>Count < 20</p>
                @else
                    <p>Count = 20</p>
                @endif--}}

                {{--@isset($date2)
                    Переменная $date2 определена и не равна `null` ...
                @endisset--}}

                {{--@empty($date3) empty $date3
                @endempty--}}

                {{--@production
                    prodaction
                @endproduction--}}

{{--                @env('local')
                    <h1>Local</h1>
                @endenv--}}

{{--                @for ($i = 0; $i < count($date1); $i++)
                    @if($date1[$i] % 2 != 0)
                        @continue
                        @elseif($date1[$i] == 6 || $date1[$i] == 8)
                            @continue
                        @elseif($date1[$i] == 16)
                            @break
                        @endif
                    {{$date1[$i]}} <br>
                @endfor--}}

{{--                @foreach($date2 as $k => $v)
                    {{$k}} => {{ $v }} <br>
                @endforeach--}}

            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($posts as $post)
                    <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{$post->content}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">
                                    {{--{{$post->created_at}}--}}
                                    {{--{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d.m.Y') }}--}}
                                    {{$post->getPostDate()}}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-md-12">
                    {{$posts->onEachSide(2)->appends(['test' => request()->test])->links('vendor.pagination.my-pagination')}}
                </div>
            </div>
        </div>
    </div>

@endsection
{{--@section('scripts')
    <script>alert(111)</script>
@endsection--}}
