<div>

    <div>
        @if($message)
            <div class="alert alert-success mt-1">
                {{ $message }}
            </div>
        @endif

        <div class="d-flex">
            <input type="text" name="addTodo" class="form-control form-control-lg" id="addTodo"
                   placeholder="What needs to be done?" value="{{ old('addTodo') }}" wire:model="title"
                   wire:keydown.enter="addTodo">
            &nbsp;
            {{--            <button class="btn btn-primary" type="submit" wire:click="addTodo">ADD</button>--}}
        </div>
        @if($errors->has('title'))
            <div class="text-danger">{{ $errors->first('title') }}</div>
        @endif

        <ul class="list-group mt-3">
            @foreach($todos as $todo)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <input type="checkbox" class="mr-5"
                               wire:change="toggle({{ $todo->id }})" {{ $todo->completed == 1 ? 'checked' : ''  }}>
                        <a
                            href="#"
                            class="{{ $todo->completed ? 'completed' : '' }}"
                            onclick="promptUpdateTodo('{{ $todo->title }}') || event.stopImmediatePropagation()"
                            wire:click="updateTodo({{ $todo->id }}, todoUpdated)"
                        >
                            {{ $todo->title }}
                        </a>
                    </div>

                    <div>
                        <button class="btn btn-sm btn-danger" wire:click="deleteTodo({{ $todo->id }})"
                                onclick="confirm('Are you sure?') || event.stopImmediatePropagation() "> X
                        </button>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>

</div>

<script>
    let todoUpdated = '';

    function promptUpdateTodo(title) {

        event.preventDefault();

        todoUpdated = '';

        const todo = prompt("Update Todo ", title);

        // Check if null or spaced
        if (todo == null || todo.trim() == '') {
            // console.log("cancel or empty");
            todoUpdated = '';
            return false;
        }

        todoUpdated = todo;
        return true;

    }
</script>
