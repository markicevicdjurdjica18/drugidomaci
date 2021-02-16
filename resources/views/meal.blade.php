<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Meals</title>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Food</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Meals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ingredient">Ingredients</a>
                    </li>


                </ul>
            </div>
        </nav>
    </header>

    <div class="row">
        <div class="ml-2 col-6">
            <table class="table display table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Time to cook</th>
                        <th>Created at</th>
                        <th>No. ingredients </th>
                        <th>Details</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($meals as $meal)
                    <tr>
                        <td>{{$meal->id}}</td>
                        <td>{{$meal->name}}</td>
                        <td>{{$meal->time_to_cook}}min</td>
                        <td>{{$meal->created_at}}</td>
                        <td>{{$meal->ingredients->count()}}</td>
                        <td><button onclick="openDetails({{$meal->id}})" class="btn btn-success">Details</button></td>
                        <td>
                            <form method="POST" action="/meal/{{$meal->id}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-danger" name="delete" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-5" id="ingredients">
            <table class="table display">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody id="ingredientsTable">

                </tbody>
            </table>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        function openDetails(id) {
            $.getJSON("/api/meals/" + id + "/ingredients", function (data) {
                
                if (!data.status) {
                    alert(data.error);
                    return;
                }
                $("#ingredientsTable").html("");
                for (let ingredient of data.data) {
                    $("#ingredientsTable").append(`
                        <tr>
                            <td>${ingredient.name}</td>
                            <td>${ingredient.ammount}</td>
                        </tr>
                    `)
                }
            })
        }
    </script>
</body>

</html>