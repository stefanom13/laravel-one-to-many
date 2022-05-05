@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="pb-2">Modifica  Post : "{{$post->title}}"</h2>
        <div class="pb-3">
            <button class="btn btn-secondary"><a href="{{ route('admin.post.store') }}">Torna indietro <-</a></button>
        </div>
        <form action="{{ route('admin.post.update',$post) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- parte titolo --}}
            <div class="form-group">
                <label for="title">Titolo*</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title',$post->title) }}" aria-describedby="emailHelp">
                @error('title')
                    <div class="invalid-feedback">{{ 'errore titolo' }}</div>
                @enderror
            </div>
            {{-- info categories --}}
            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select class="custom-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                    <option value="">Seleziona Categoria</option>
                    @foreach ($categories as $category)
                    <option {{ old('category_id',optional($post->category)->id) == $category->id  ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>  
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ 'Errore' }}</div>
                @enderror
            </div>
            {{-- info contenuto articoli --}}
            <div class="form-group">
                <label for="content">Contenuto Articolo*</label>
                <textarea class="form-control  @error('content') is-invalid @enderror" id="content" name="content"
                    rows="3">{{ old('content',$post->content) }}</textarea>
                @error('title')
                    <div class="invalid-feedback">{{ 'Errore nel inserimento articolo' }}</div>
                @enderror
                {{-- <input type="password" class="form-control" id="exampleInputPassword1"> --}}
            </div>

            {{-- info dati pubblicazione --}}
            <div class="form-group">
                <label for="published_at">Data di Pubblicazione</label>
                <input type="date" class="form-control @error('published_at') is-invalid @enderror" id="published_at"
                    name="published_at" value="{{ old('published_at')?: Str::substr($post->published_at,0,10) }}" aria-describedby="emailHelp">
                @error('title')
                    <div class="invalid-feedback">{{ 'errore' }}</div>
                @enderror
            </div>

            {{-- <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> --}}

            <button type="submit" class="btn btn-warning">Salva!</button>
        </form>
        <form action="{{route('admin.post.destroy',$post)}}" method="POST" class="pt-2">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger ">Elimina!</button>
        </form>
    </div>
@endsection
