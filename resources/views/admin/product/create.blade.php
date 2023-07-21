@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Proudcts</h1>
                </div>
            </div>
            @include('admin.layouts.message')
        </div>
    </div>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Product Managment</h3>
                        </div>
            
                        <form action="{{ route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="category-id">Select Category</label>
                                        <select id="category-id"
                                            name="category_id"
                                            class="form-control @error('category_id')
                                                is-invalid
                                            @enderror">
                                            @foreach ($catagories as $category)
                                                <option value="{{ $category->id }}"
                                                    @selected(old('category_id') == $category->id)>
                                                    {{ $category->name  }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="tag-id">Select Tag</label>
                                        <select id="tag-id"
                                            name="tag_id"
                                            class="form-control @error('tag_id')
                                                is-invalid
                                            @enderror">
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}"
                                                    @selected(old('tag_id') == $tag->id)>
                                                    {{ $tag->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('tag_id')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="name">Name</label>
                                        <input id="name" name="name" 
                                            class="form-control @error('name')
                                                is-invalid
                                            @enderror"
                                            value="{{ old('name') }}"
                                            placeholder="Enter name">
                                        @error('name')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="tag-id">Price</label>
                                        <input id="price" name="price" 
                                            class="form-control @error('price')
                                                is-invalid
                                            @enderror"
                                            value="{{ old('price') }}"
                                            placeholder="Enter price">
                                        @error('price')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                
                                <div class="row">
                                    <div class="form-group">
                                        <label for="name">Description</label>
                                        <textarea id="name" 
                                            name="description" 
                                            class="form-control @error('description')
                                                is-invalid
                                            @enderror"
                                            >
                                            {{ old('description') }}
                                        </textarea>
                                        @error('description')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="form-group ">
                                            <label for="name">Uplaod Image</label>
                                            <input type="file" 
                                                name="image" 
                                                class="form-control @error('image')
                                                    is-invalid
                                                @enderror"
                                            >
                                            @error('image')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="name">Stock(qantity)</label>
                                        <input type="number" 
                                            name="stock" 
                                            class="form-control @error('stock')
                                                is-invalid
                                            @enderror"
                                           value="{{ old('stock') }}">
                                        @error('stock')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="category-id">Payment Method</label>
                                        <select id="category-id"
                                            name="payment_options"
                                            class="form-control @error('payment_options')
                                                is-invalid
                                            @enderror">
                                            @foreach ($paymentMethods as $paymentMethod)
                                                <option value="{{ $paymentMethod }}"
                                                    @selected(old('payment_options') == $paymentMethod)>
                                                    {{ $paymentMethod  }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('payment_options')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6 mt-0">
                                        <label for="published">Do you want to publish ?
                                            <input type="checkbox" name="published" id="published"
                                              value="activate"  
                                             @checked(old('published'))>
                                        </label>
                                        @error('published')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    
@endsection


