@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="container pt-2 pb-2">
            <button type="button" class="btn btn-outline-warning"><a href="{{ route('admin.post.create')}}"> Crea Nuovo Post</a></button>
        </div>
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Categorie</th>
                <th scope="col">Data di Pubblicazione</th>
                <th scope="col">Data Creazione</th>
                <th scope="col">Click</th>
              </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->slug}}</td>
                    <td>{{ $post->category ? $post->category->name : '-'}}</td>
                    <td>{{$post->published_at}}</td>
                    <td>{{$post->created_at}}</td>
                    <td><button type="button" class="btn btn-outline-success"><a href="{{ route('admin.post.edit',$post)}}">Edit</a></button></td>
                    <td>
                        <form action="{{route('admin.post.destroy',$post)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                    
                    
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>

  
        @foreach($posts as $post)
            
        @endforeach
   

@endsection