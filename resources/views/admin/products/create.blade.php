@include('frontend.layouts.header')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{(session('message'))}}</div>
            @endif
            <div class="card-header">
                <h2  class=text-center>PRODUCT DETAILS
                    <a href="{{url('admin/products')}}" class="btn btn-primary float-right">Back</a>
                </h2>

                <div class="card-body">
                    <form action="{{url('admin/products')}}" method="POST" enctype="multipart/form-data" >
                    @csrf

        <div class="mb-3">
            <label>Select Category</label><br>
            @foreach ($categories as $item)
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $item->id }}"> {{ $item->name }}
                </label>&nbsp;&nbsp;
            @endforeach
        </div>

            <input type="hidden" name="category_id" value="{{ $categories->first()->id }}">

                        <div class="mb-3">
                            <label for="">Product Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="">Product Price</label>
                            <input type="text" name="price" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="">Product Images</label>
                            <input type="file" name="images[]" class="form-control" multiple required>
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


