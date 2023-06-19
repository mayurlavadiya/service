@include('layouts.header')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            <div class="card-header">
                <h2 class="text-center">LOGIN FORM
                    <a href="{{ url('/') }}" class="btn btn-primary float-right">Back</a>
                </h2>
            </div>

            <div class="card-body">
                @if (Session::has('error'))
                    <p class="text-danger">{{ Session::get('error') }}</p>
                @endif
                @if (Session::has('success'))
                    <p class="text-success">{{ Session::get('success') }}</p>
                @endif

                <form action="{{ route('login') }}" method="post" id="myform" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control">
                        @if($errors->has('error'))
                            <p class="text-danger">{{$errors->first('error')}}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                        @if($errors->has('error'))
                            <p class="text-danger">{{$errors->first('error')}}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <span class="text-left">Not registered yet ? <a href="{{route('register')}}">Click here for Register</span></a>
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
