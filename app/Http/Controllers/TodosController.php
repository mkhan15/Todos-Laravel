<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{


       public function index()
       {

        $todos = Todo::all();
      return view('todos.index',compact('todos'));

       }

       public function show($todoId){

         $todo = Todo::find($todoId);

         return view('todos.show',compact('todo'));
       }


       public function create(){

        return view('todos.create');

       }

       public function store(){

        $this->validate( request(),[

          'name'=>'required',
          'description'=>'required'
          ]);

          $data = Request()->all();
         $todo = new todo();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
        $todo->save();

        return redirect('/todos');

        }

        public function edit($id)
        {
         $todo= Todo::find($id);

         return view('todos.edit')->with('todo',$todo);

        }


        public function update($id){

            $this->validate(request(),[

                'name'=>'required',
                'description'=>'required'
            ]);

            $data = request()->all();

            $todo= Todo::find($id);

            $todo->name =$data['name'];
            $todo->description =$data['description'];

            $todo->save();

            return redirect('/todos');
        }


public function destroy($id){

    $todo = Todo::find($id);

    $todo->delete();

    return redirect('/todos');



}

    }
