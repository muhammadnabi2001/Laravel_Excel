@extends('Layout.main')

@section('title', 'Ingredients')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if (session('delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>
            @endif
            @if (session('update'))
            <div class="alert alert-info" role="alert">
                {{ session('update') }}
            </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Updatekitobpage</h1>
                </div>
            </div>
            <div class="row mb-2">

            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-5">
                    <div class="table-responsive">
                        <form action="{{route('kitobupdate',$kitob->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Kitob name</label>
                                <input type="text" class="form-control" placeholder="input kitob name"
                                    name="name" value="{{$kitob->name}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kitob author</label>
                                <input type="text" class="form-control" placeholder="input kitob author"
                                    name="author" value="{{$kitob->author}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kitob Price</label>
                                <input type="number" class="form-control" placeholder="input talaba adress"
                                    name="price" value="{{$kitob->price}}">
                            </div>               
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection