@include('frontend.layouts.header')

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORM VALIDATION - LARAVEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    {{-- base url mate {{url}} use thay --}}
    <form action={{$url}} method="post">
        @csrf

        <div class="container">
            <h1 class="text-center">
                {{$title}}
            </h1>

            {{-- 1. Old method form field (comment krel chhe)--}}

                <div class="form-row">
                    <div class="col">
                    <label for="">Name</label>
                    <input type="name" class="form-control" name="name" value='{{$customers->name}}'/>
                    <span class="text-danger">
                        @error('name')
                            {{$message}}
                        @enderror
                    </span>
                    </div>
                </div>

                <div class="form-group mt-2">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" id="" value="{{$customers->email}}"/>
                    <span class="text-danger">
                        @error('email')
                            {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="form-group mt-2">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" id=""/>
                    <span class="text-danger">
                        @error('password')
                            {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="form-group mt-2">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id=""/>
                    <span class="text-danger">
                        @error('password_confirmation')
                            {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="form-group mt-2">
                    <label for="">Gender</label>
                    <div class="custom-control custom-checkbox">
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="male" value="M"{{$customers->gender=="Male" ? "checked" : ""}}>
                    <label for="female">Female</label>
                    <input type="radio" name="gender" id="female" value="F"  {{$customers->gender=="Female" ? "checked" : ""}}>

                      </div>
                    <span class="text-danger">
                        @error('gender')
                            {{$message}}
                        @enderror
                    </span>
                </div>


                <div class="form-group mt-2">
                    <label for="">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" id="" value="{{$customers->dob}}"/>
                    <span class="text-danger">
                        @error('address')
                            {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="form-group mt-2">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="address" id="" value="{{$customers->address}}"/>
                    <span class="text-danger">
                        @error('address')
                            {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="form-group mt-2">
                    <label for="">City</label>
                    <input type="text" class="form-control" name="city" id="" value="{{$customers->city}}"/>
                    <span class="text-danger">
                        @error('address')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                        <div class="form-group mt-2">
                            <label for="">State</label>
                            <input type="text" class="form-control" name="state" id="" value="{{$customers->state}}"/>
                            <span class="text-danger">
                                @error('state')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group mt-2">
                            <label for="">Country</label>
                            <input type="text" class="form-control" name="country" id="" value="{{$customers->country}}"/>
                            <span class="text-danger">
                                @error('country')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>


                <div class="form-group mt-2">
                    <label for="">Status</label>
                    <input type="text" class="form-control" name="status" id="" value="{{$customers->status}}"/>
                    <span class="text-danger">
                        @error('status')
                            {{$message}}
                        @enderror
                    </span>
                </div>

                <button class="btn btn-primary mt-2">Submit</button>

        </div>
    </form>

</body>

</html>
