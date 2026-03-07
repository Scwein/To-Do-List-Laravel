@extends('layouts.main')

@section('content')
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <div class="mt-4 position-absolute top-0 start-50 translate-middle">
            <span class="navbar-brand mb-0 h1 ">My To-Do List</span>
        </div>
    </div>
</nav>

<div class="container-fluid mt-5">
    <form action="" method="post">
        <div class="mb-3">
            <input type="text" class="form-control" id="task" name="task" value="{{ old('task') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
    @endif

    <div class="row">
        <div class="col-md-2">
            <h4 class="text-center">{{ $title_list }}</h4>

            @if ($tasks)
                <ol class="list-group list-group-numbered">
                    @foreach ($tasks as $task)
                        <li class="list-group-item"> {{ $task['task_desc'] }} </li>
                    @endforeach
                </ol>

                <form action="" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-light mt-2" type="submit">Удалить задачи</button>
                </form>
            @else
                <strong> {{ 'Ваш список дел пуст!' }} </strong>
            @endif
        </div>
    </div>
</div>
@endsection