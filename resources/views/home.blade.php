<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    @livewireStyles
    <style>
        .completed {
            text-decoration: line-through;
        }
    </style>
</head>
<body>
<!-- Just an image -->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        Brand
    </a>
</nav>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Todo
        </div>
        <div class="card-body">
            @livewire('todos')

        </div>
    </div>
</div>

    @livewireScripts


</body>
</html>
