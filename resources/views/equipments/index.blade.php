@extends('layouts.app')

@section('content')
    <div class="">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
            rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>



        <div class="container  justify-content-center mt-50 mb-50">
            <div class="row">
                <div class="col-md-10">
                    <div class="input-group">
                        @if (Auth::user())
                            <a href="/equipments/create">Wprowadź nowe wyposażenie</a>
                            <p></p>
                        @endif
                        <form action="/equipments" method="GET">
                            <label for="tags">Tagi</label>
                            <input type="text" id="tags" name="tags" value="{{ $tags }}"
                                class="bootstrap-tagsinput form-control" data-role="tagsinput" />

                            <button class="btn btn-default" type="submit">Szukaj</button>

                        </form>
                    </div>
                    @foreach ($equipments as $equipment)
                        <div class="card card-body">
                            <div
                                class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                <div class="mr-2 mb-3 mb-lg-0"> <img src="{{ asset('images/' . $equipment->photo) }}"
                                        width="150" height="150" alt=""> </div>
                                <div class="media-body">
                                    <h6 class="media-title font-weight-semibold"> <a href="#"
                                            data-abc="true">{{ $equipment->name }}</a> </h6>
                                    <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                        @foreach ($equipment->tags as $tag)
                                            <li class="list-inline-item"><a href="#" class="text-muted"
                                                    data-abc="true">{{ $tag->name }}</a></li>
                                        @endforeach
                                    </ul>
                                    <p class="mb-3">{{ $equipment->desc }} </p>
                                </div>
                                <div class="mt-3 mt-lg-0 ml-lg-3 text-center">

                                    <p>Dostępnych: {{ $equipment->availableQuantityAttribute() }}</p>
                                    @if (Auth::user())
                                        <input class="w-50 " id="quantity_selected" type="number" autofocus>

                                        <div> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i> <i class="fa fa-star"></i> </div>

                                        <a href="/rental/create/{{ $equipment->id }}"><button type="button"
                                                class="btn btn-dark mt-4 text-white"> Wypożycz</button></a>
                                    @endif
                                </div>
                                @if (Auth::user())
                                    <div class="d-flex flex-column">
                                        <div><a href="/equipments/{{ $equipment->id }}/edit"><button type="button"
                                                    class="btn btn-link ">Edytuj</button></a></div>
                                        <form action="{{ url("/equipments/$equipment->id") }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-link " type="submit">Usuń</button>
                                        </form>

                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
