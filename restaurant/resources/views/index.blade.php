@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($categories as $c)
        <div class="col-md-12">
            <h2 style="color: blue;">{{$c->name}}</h2>
            <div class="jumbotron">
                <div class="row">
                    @foreach(App\Models\Food::where('category_id',$c->id)->get() as $food)
                    <div class="col-md-3">
                        <p class="text-center">
                        <img src="{{asset('images')}}/{{$food->image}}" 
                            alt="{{$food->name}}" width="200" height="155">
                        </p>
                        
                        <p class="text-center">
                            {{$food->name}} <span>€{{$food->price}}</span>
                        </p>
                        <p class="text-center">
                            <a href="{{route('food.view',[$food->id])}}">
                                <button class="btn btn-outline-danger">
                                    {{__('View')}}
                                </button>
                            </a>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection