@extends('master.layout')

@section('titel')
    Ajouter 
@endsection

@section('style')   
    <style>
        body{
            background-color: #dddddd;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
                    <h1>Create Post</h1>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div style="margin-top: 10px;" class="card ">
            <div class="card-header">
                <h3 class="card-title" >Poster une publication</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data"> 
                    @csrf
                    <div class="form-gorup">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Titre</label>
                    <input type="text" class="form-control" name="titel" placeholder="Titre">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">image</label>
                    <input type="file" class="form-control" name="image">
                    </div>
                    <div class="mb-3">
                         <label for="exampleFormControlTextarea1" class="form-label">Déscripton</label>
                    <textarea class="form-control" name="body" placeholder="Déscription" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Valider</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        body{
            background-color: none;
        }
    </style>
@endsection


@section('script')
<script>
   // alert("Hello from welcome page alert")
</script>

@endsection