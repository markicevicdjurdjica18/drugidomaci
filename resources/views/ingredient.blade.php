<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Ingredients</title>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Food</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="/">Meals</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/ingredient">Ingredients</a>
                    </li>


                </ul>
            </div>
        </nav>
    </header>
    <div class="container mt-2">
        <div class="row">
            <div class="col-8">
                <table class="table display table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created_at</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ingredients as $ingredient)
                        <tr>
                            <td>{{$ingredient->id}}</td>
                            <td>{{$ingredient->name}}</td>
                            <td>{{$ingredient->created_at}}</td>
                            <td>
                                <form method="POST" action="/ingredient/{{$ingredient->id}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="btn btn-danger" name="delete" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <h4>Create new ingredient</h4>
                <form action="/ingredient" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label>Name</label>
                    <input type="text" name="name" class="mt-2 form-control">
                    <button type="submit" class="mt-2 form-control btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>