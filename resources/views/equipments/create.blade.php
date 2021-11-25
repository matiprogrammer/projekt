@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Utwórz wyposażenie') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/equipments/create" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Nazwa</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="model">Model</label>
                                <input type="text" class="form-control" id="model" name="model">
                            </div>
                            <div class="form-group">
                                <label for="desc">Opis</label>
                                <textarea class="form-control" id="desc" name="desc" required rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="url">Url</label>
                                <input type="text" class="form-control" id="url" name="url">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Dostępna ilość</label>
                                <input type="number" class="form-control" name="quantity" id="quantity">
                            </div>
                            <div class="form-group">
                                <label for="photo">Fotografia:</label>
                                <input type="file" name="photo" id="photo">
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-dark mt-4 text-white"> Zapisz</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
