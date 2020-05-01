<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Todo;

class Todos extends Component
{

    public $title = '';
    public $message = '';

    public function render()
    {
        return view('livewire.todos', [
            'todos' => Todo::all()
        ]);
    }

    public function addTodo() {

        $this->validate([
            'title' => 'required'
        ]);

        Todo::create([
            'title' => $this->title,
            'completed' => false
        ]);

        $this->message = "Successful";
        $this->title = '';
    }

    public function deleteTodo($id) {
        Todo::find($id)->delete();
    }

    public function toggle($id) {
        $todo = Todo::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function updateTodo($id, $title) {
        $todo = Todo::find($id);
        $todo->title = $title;
        $todo->save();
    }

}
