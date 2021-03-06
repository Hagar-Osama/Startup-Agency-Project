@extends('backend_layouts.layout')
@section('title')
Dashboard | Portfolios
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('backend_includes.sidebar_admin')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1>Dashboard<h1>
            </div>
            <div class="alert-success">
                {{session('success')}}
            </div>
            <div class='text-right'>
                <a href="{{route('portfolios.create')}}" class="btn btn-primary">Create New portfolio</a>
            </div>
            <h2>Section title</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Service Name</th>
                            <th>Client Name</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($portfolios)
                        @if($portfolios->count() > 0)
                        @foreach($portfolios as $portfolio)
                        <tr>
                            <td>{{$portfolio->id}}</td>
                            <td>{{$portfolio->name}}</td>
                            <td>{{$portfolio->image}}</td>
                            <td>@if (! empty($portfolio->service))  {{$portfolio->service->name }} @endif</td>
                            <td>@if (! empty($portfolio->client)) {{$portfolio->client->name}} @endif</td>
                            <td><a href="{{route('portfolios.show',['portfolio'=>$portfolio->id])}}" class="btn btn-warning">Show</a></td>
                            <td><a href="{{route('portfolios.edit',['portfolio'=>$portfolio->id])}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{route('portfolios.destroy', ['portfolio'=>$portfolio->id])}}" method="POST">
                                    @csrf
                                    {{{method_field('DELETE')}}}
                                    <input type="submit" name="delete" value= "Delete" class="btn btn-danger">

                                </form>
                            </td>

                        </tr>
                        @endforeach
                        @endif
                        @endisset

                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
