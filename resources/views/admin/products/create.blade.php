@include('frontend.layouts.header')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card-header">
                <h2 class="text-center">ADD PRODUCT
                    <a href="{{ url('admin/products') }}" class="btn btn-primary float-right">Back</a>
                </h2>
            </div>

            <div class="card-body">
                <form action="{{ url('admin/products') }}" method="POST" id="myform" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label>Select Category</label><br>
                        @foreach ($categories as $item)
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $item->id }}"> {{ $item->name }}
                            </label>&nbsp;&nbsp;
                        @endforeach
                        <div id="agree_chk_error" class="text-danger"></div> <!-- Error message -->
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
                        <input type="file" name="images[]" class="form-control" multiple>
                        <div id="image_chk_error" class="text-danger"></div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#myform").on("submit", function(e) {
            if (!$("input[name='categories[]']:checked").length) {
                e.preventDefault();
                $("#agree_chk_error").text("Please select at least one category.").show();
            } else {
                $("#agree_chk_error").hide();
            }

            if (!$("input[name='images[]']").get(0).files.length) {
                e.preventDefault();
                $("#image_chk_error").text("Please select at least one image.").show();
            } else {
                $("#image_chk_error").hide();
            }
        });
    });
</script>
