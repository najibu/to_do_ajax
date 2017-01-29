<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>To-do list Application</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="container">
    <section class="todo" id="data_section">
      <ul class="todo-controls">
        <li><img src="/assets/img/add.png" width="14px" onClick="show_form('add_task');"></li>
      </ul>
      @foreach($todos as $todo)
        @if($todo->status)
          <li class="done" id="{{$todo->id}}">
            <a href="#" class="toggle"></a>
            <span id="span_{{$todo->id}}">{{$todo->title}}</span> 
            <a href="#" onClick="delete_task('{{$todo->id}}');" class="icon-delete">Delete</a>
            <a href="#" onClick="edit_task('{{$todo->id}}', '{{$todo->title}}');" class="icon-edit">Edit</a>
          </li>
        @else
          <li id="{{$todo->id}}">
            <a href="#"onClick="task_done('{{$todo->id}}');"class="toggle"></a> 
            <span id="span_{{$todo->id}}">{{$todo->title}}</span>
            <a href="#" onClick="delete_task('{{$todo->id}}');" class="icon-delete">Delete</a>
            <a href="#" onClick="edit_task('{{$todo->id}}','{{$todo->title}}');"class="icon-edit">Edit</a>
          </li>
        @endif
      @endforeach
    </section>
    <section id="form_section">

      <form class="todo" id="add_task" style="display: none">
        {!! csrf_field() !!}
        <input type="text" id="task_title" name="title" placeholder="Enter a task name" value="">
        <button name="submit">Add Task</button>
      </form>

      <form id="edit_task" class="todo" style="display: none">
        <input type="hidden" id="edit_task_id" value="">
        <input type="text" id="edit_task_title" name="title" value="">
        <button name="submit">Edit Task</button>
      </form>
    </section>
  </div>
  <script src="http://code.jquery.com/jquery-latest.min.js"type="text/javascript"></script>
    <script src="assets/js/todo.js"type="text/javascript"></script>
</body>
</html>