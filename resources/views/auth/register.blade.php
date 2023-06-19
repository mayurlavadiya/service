@include('layouts.header')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card-header">
                <h2 class="text-center">REGISTRATION FORM
                    <a href="{{ url('/') }}" class="btn btn-primary float-right">Back</a>
                </h2>
            </div>

            <div class="card-body">
                @if (Session::has('error'))
                    <p class="text-danger">{{ Session::get('error') }}</p>
                @endif
                <form action="{{ route('register') }}" method="POST" id="myform" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                        @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control">
                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                        @if ($errors->has('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>


                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    <span class="text-left"><b>Already registered ?</b> <a href="{{route('login')}}">Click here for Login</span></a>
                </form>
            </div>
        </div>
    </div>
</div>


@include('layouts.footer')
