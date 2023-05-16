<!doctype html>
<html lang="en">

<head>
    <title>Adventure</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <form  method='post' action="{{url('/upload')}}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="form-group mt-5">
              <label for="">File </label>
              <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</body>

</html>
