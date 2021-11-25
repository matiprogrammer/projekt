@extends('layouts.app')

@section('content')
    <div class="">
        <div class="container  justify-content-center mt-50 mb-50">
            <h2>Wypożyczenia użytkownika <b>{{ $user->name }}</b></h2>
            @forelse ($rentals as $re)

                <div class="row">
                    <div class="col-md-10">
                        <div class="card card-body">
                            <div
                                class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                <div class="mr-2 mb-3 mb-lg-0"> <img src="{{ asset('images/' . $re->equipment->photo) }}"
                                        width="150" height="150" alt=""> </div>
                                <div class="media-body">
                                    <h6 class="media-title font-weight-semibold"> <a href="#"
                                            data-abc="true">{{ $re->equipment->name }}</a> </h6>
                                    <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                        @foreach ($re->equipment->tags as $tag)
                                            <li class="list-inline-item"><a href="#" class="text-muted"
                                                    data-abc="true">{{ $tag->name }}</a></li>
                                        @endforeach
                                    </ul>
                                    <p class="mb-3">{{ $re->equipment->desc }} </p>
                                </div>
                                <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                    <p>Wypożyczonych: {{ $re->quantity }}</p>
                                    <div> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                            @
                                    <a href="/rental/{{ $re->id }}/return"><button type="button"
                                            class="btn btn-dark mt-4 text-white"> Zwróć</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
            <p>Brak</p>
            @endforelse

        </div>
    </div>
@endsection
