@include('frontend.layouts.header')
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>



    {{-- base url mate {{url}} use thay --}}
    <form action={{$url}} method="post" class="mt-5">
        @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <h4>
                                <a href="{{url('admin/category/create')}}" class="btn btn-primary float-end">ADD Category</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <h1 class="text-center">
                    {{$title}}
                </h1>
            {{-- 1. Old method form field (comment krel chhe)--}}

                <div class="form-row">
                    <div class="col">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" name="name" value=""/>
                    <span class="text-danger">
                        @error('name')
                            {{$message}}
                        @enderror
                    </span>
                    </div>
                </div>


                <div class="form-group mt-2">
                    <label for="">Category Name</label>
                    <input type="text" class="form-control" name="address" id="" value=""/>
                    <span class="text-danger">
                        @error('address')
                            {{$message}}
                        @enderror
                    </span>
                </div>

                {{-- <div class="form-group">
                    <label for="categories">Categories:</label>
                    <select name="categories[]" id="categories" class="form-control" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="form-group mt-2">
                    <label for="">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" id="" value=""/>
                    <span class="text-danger">
                        @error('address')
                            {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="form-group mt-2">
                    <label for="photos">Select Photos</label>
                    <input type="file" name="photos[]" id="photos" class="form-control-file" multiple>
                </div>

                <button class="btn btn-primary mt-2">Submit</button>

        </div>
    </form>

</body>

</html>
