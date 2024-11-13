@extends('Layout.main')

@section('title', 'Kitoblar')

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
                    <h1 class="m-0">Kitoblar</h1>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    @can('kitobcreate')
                    <a href="/kitobcreate" class="btn btn-primary">Create</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
               
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive"> <!-- table-responsive qo'shildi -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Author</th>
                                    <th>Price</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody">
                                @foreach($kitoblar as $kitob)
                                <tr>
                                    <td>{{ $kitob->id }}</td> 
                                    <td>{{ $kitob->name }}</td>
                                    <td>{{ $kitob->author}}</td>
                                    <td>{{ $kitob->price }}</td>
                                    <td>
                                            <a href="{{route('kitobedit',$kitob->id)}}" class="btn btn-success">Update</a>
                                    </td>
                                    <td><a href="{{route('kitobdelete',$kitob->id)}}" class="btn btn-danger">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>
@endsection