@extends('Layout.main')

@section('title', 'Mainpage')

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
                    <h1 class="m-0">MainPage</h1>
                </div>
            </div>
            <div class="row mb-2">
               
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
           
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive"> <!-- table-responsive qo'shildi -->
                        
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>
@endsection