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
            <div class="card">
                <div class="card-header">{{ __('All Foods') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">{{ __('Image') }}</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Description') }}</th>
                                <th scope="col">{{ __('Price') }}</th>
                                <th scope="col">{{ __('Category') }}</th>
                                <th scope="col">{{ __('Edit') }}</th>
                                <th scope="col">{{ __('Delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($foods) > 0)
                            @foreach($foods as $key=>$food)
                            <tr>
                                <th>
                                <img 
                                    src="{{asset('images')}}/{{$food->image}}" 
                                        width="100">
                                </th>
                                <td>{{$food->name}}</td>
                                <td>{{$food->description}}</td>
                                <td>{{$food->price}}</td>
                                <td>{{$food->category_id}}</td>
                                <td>
                                    <a href="{{route('food.edit',
                                        [$food->id])}}">
                                        <button 
                                        class="btn btn-outline-success">
                                        {{ __('Edit') }}
                                        </button>
                                    </a>
                                </td>
                                <td>
                                           
                                            <button type="button" 
                                            class="btn btn-outline-danger" 
                                            data-toggle="modal" data-target="#exampleModal{{$food->id}}">
                                                {{ __('Delete')}}
                                            </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$food->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <form action="{{route('food.destroy',
                                        [$food->id])}}" method="post">@csrf
                                            {{method_field('DELETE')}}
                                        
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{__('Delete a food')}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{ __('Are you sure?')}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                                                <button type="submit"
                                                class="btn btn-outline-danger">
                                                    {{ __('Delete')}}
                                                </button>
                                            </div>
                                            </div>
                                          </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <td colspan="4">No food to display</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
