@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <form action="{{route('food.store')}}" 
            method="post" enctype="multipart/form-data">@csrf
            <div class="card">
                <div class="card-header">{{ __('Add new food') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">{{__('Name')}}</label>
                        <input type="text" name="name" 
                            class="form-control
                            @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                {{ $message}}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">{{__('Description')}}</label>
                        <textarea name="description" 
                        class="form-control
                        @error('description') is-invalid @enderror"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                {{ $message}}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">{{__('Price')}}</label>
                        <input type="number" name="price" 
                            class="form-control
                            @error('price') is-invalid @enderror">
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                {{ $message}}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">{{__('Category')}}</label>
                        <select name="category" class="form-control
                        @error('category') is-invalid @enderror">
                            <option value="">{{__('select category')}}</option>
                            @foreach(App\Models\Category::all() as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                {{ $message}}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">{{__('Image')}}</label>
                        <input type="file" name="image" 
                            class="form-control
                            @error('image') is-invalid @enderror">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                {{ $message}}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-outline-primary"
                            type="submit">{{__('Submit')}}</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
