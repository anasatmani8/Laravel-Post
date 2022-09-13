@extends('master.layout')

@section('titel')
    {{ $post->titel }}
@endsection

@section('style')   
    <style>
        body{
            background-color: #dddddd;
        }
    </style>
@endsection

@section('content')
        <div class="row my-5">
            <div class="col-md-8"> 
               <div class="row">
                    <div class="col-md-12 mb-2">
                        <h3></h3>
                        <div class="card h-100 ">
                            <img src="{{ asset('./uploads/'.$post->image)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post["titel"] }}</h5>
                            <p class="card-text">{{ $post->body }}</p>
                            
                                 </div>
                </div>
                @if(auth()->user()->id == $post->user_id)
                        <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-warning">Modifier</a>

                        <form id="{{ $post->id }}" action="{{ route('post.delete', $post->slug) }}" method="post">
                            @csrf
                            @method('DELETE')
                            </form>
                            <button
                        
                            
                            onclick="event.preventDefault();
                            if(confirm('Etes-vous sûr?'))
                            document.getElementById('{{ $post->id }}').submit();"
                            class="btn btn-danger" type="submit">supprimer</button>
                @endif
                    </div>

               </div>
              
        </div>
    </div>
@endsection

@section('script')
<script>
    alert("Hello from home page alert")
</script>

@endsection