@extends('layouts.app')

@section('content')
    <script>
        function hide($tagName) {
            var tag = document.getElementById($tagName);
            tag.style.display = "none";
        }
    </script>
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-md-8">
                <a href="/equipments">Wróć</a>
                <div class="card">
                    <div class="card-header">{{ __('Edytuj wyposażenie') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/equipments/{{ $equipment->id }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nazwa</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                    value="{{ $equipment->name }}">
                            </div>
                            <div class="form-group">
                                <label for="model">Model</label>
                                <input type="text" class="form-control" id="model" name="model"
                                    value="{{ $equipment->model }}">
                            </div>
                            <div class="form-group">
                                <label for="desc">Opis</label>
                                <textarea class="form-control" id="desc" name="desc" required
                                    rows="3">{{ $equipment->desc }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="url">Url</label>
                                <input type="text" class="form-control" id="url" name="url"
                                    value="{{ $equipment->url }}">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Dostępna ilość</label>
                                <input type="number" class="form-control" name="quantity" id="quantity"
                                    value="{{ $equipment->quantity }}">
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('images/'.$equipment->photo) }}" width="150"
                                        height="150" alt="">
                                <label for="photo">Fotografia:</label>
                                <input type="file" name="photo" id="photo">
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-dark mt-4 text-white"> Zapisz</button>
                            </div>
                        </form>

                        <p class="text-left">
                            Tagi:
                            @forelse ($equipment->tags as $tag )
                                <form method="POST" action={{ url("/tag/$equipment->id/$tag->id") }}>
                                    @csrf
                                    @method('delete')

                                    <p id="tag-{{ $tag->id }}">{{ $tag->name }} <button type="submit"
                                            class="btn-close" aria-label="Close">X</button></p>
                                </form>
                            @empty
                                Brak tagów
                            @endforelse
                        </p>

                        <form method="POST" action="/tag/{{ $equipment->id }}">
                            @csrf
                            <div class="input-group input-group-sm mb-3">
                                <input type="text" class="form-control" name="tag_name"
                                    aria-describedby="inputGroup-sizing-sm">
                                <div>
                                    <span id="add_tag"><button type="submit" class="btn btn-light">Dodaj</button></span>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
