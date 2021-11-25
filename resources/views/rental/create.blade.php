@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Wypożyczenie') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/rental/create">
                            @csrf
                            <input type="hidden" class="form-control" id="equipment_id" name="equipment_id" value="{{ $equipment->id }}">
                            <div class="container  justify-content-center mt-50 mb-50">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="card card-body">
                                            <div
                                                class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                                <div class="mr-2 mb-3 mb-lg-0"> <img
                                                        src="{{ asset('images/' . $equipment->photo) }}" width="150"
                                                        height="150" alt=""> </div>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Dostępna ilość: {{ $equipment->availableQuantityAttribute() }}</p>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Ilość wypożyczana</label>
                                <input type="number" class="form-control" name="quantity" id="quantity">
                            </div>
                            <div class="form-group">
                                <label for="name">Imię</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="surname">Nazwisko</label>
                                <input type="text" class="form-control" id="surname" name="surname" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-dark mt-4 text-white"> Wypożycz</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
