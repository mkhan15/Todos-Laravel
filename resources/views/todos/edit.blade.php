@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card card-default">

            <div class="card-header">Update New Todo</div>

            <div class="card-body">

                @if($errors->any())
                <div class="alert alert-danger">

                    <ul class="list-group">

                        @foreach($errors->all() as $error)

                        <li class="list-group item">

                            {{$error}}

                        </li>

                        @endforeach

                    </ul>


                </div>

                @endif



                <form action = "/todos/{{$todo->id}}/update_todos" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="name" value = "{{$todo->name}}">

                    </div>



                    <div class="form-group">
                        <textarea class="form-control" cols="30" rows="10" name="description"
                            placeholder="Description">{{$todo->description}}


                            </textarea>

                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-success" type="submit">Update Todo</button>
                    </div>
                </form>



            </div>




        </div>

    </div>


</div>
@endsection
