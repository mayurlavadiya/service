@include('frontend.layouts.header')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{(session('message'))}}</div>
            @endif
            <div class="card-header">
                <h2  class=text-center>EDIT CATEGORY DETAILS
                    <a href="{{url('admin/category')}}" class="btn btn-primary float-right">Back</a>
                </h2>

                <div class="card-body">
                    <form action="{{url('admin/category/'.$category->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="mb-3">
                            <b><label for="">Category Name</label>
                            <input type="text" name="name" class="form-control" value="{{$category->name}}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
