@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 ">
                    <div class=" d-flex justify-content-between">
                        <h1 class="m-0">Products</h1>
                        <div class="me-2">
                            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                                Add Products
                            </a>
                        </div>
                    </div>
                    
                </div>
                @include('admin.layouts.message')
            </div>
        </div>
        <section class="content">
            <div class="container">
                <table class="table display" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total Itmes</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Published</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th>{{ $product->id }}</th>
                                <th>{{ $product->name }}</th>
                                <th>
                                    <img src="{{ asset('storage/admin/products/images/'. $product->image) }}"
                                     height="50px" width="50px">
                                </th>
                                <th>{{ $product->price }}</th>
                                <th>{{ $product->stock }}</th>
                                <th>{{ $product->payment_options }}</th>
                                <th>{{ $product->published }}</th>
                                <th>
                                    <a href="{{ route('admin.product.edit', ['product' => $product->id]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a class="text-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </section>
    </div>
@endsection


