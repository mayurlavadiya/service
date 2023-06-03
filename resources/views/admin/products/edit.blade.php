@include('frontend.layouts.header')
<style>
    .AClass {
        right: -2px;
        position: absolute;
    }
</style>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">EDIT PRODUCT DETAILS
                        <a href="{{ url('admin/products') }}" class="btn btn-primary float-right">Back</a>
                    </h2>
                </div>

                <div class="card-body">
                    <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                        {{-- <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data"> --}}

                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Select Category</label><br>
                            @foreach ($categories as $item)
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="categories[]"
                                        value="{{ $item->id }}"
                                        {{ in_array($item->id, $product->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    {{ $item->name }}
                                </label>&nbsp;&nbsp;
                            @endforeach
                        </div>

                        <div class="mb-3">
                            <label for="">Product Name</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">Product Price</label>
                            <input type="text" name="price" class="form-control" value="{{ $product->price }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="">Product Image</label>
                            <input type="file" name="images[]" class="form-control" multiple>

                            <div class="row col-xs-4 space-between mt-2">
                                @foreach ($product->images ?? [] as $image)
                                    <div style="position:relative;">
                                        <button type="button" class="close AClass">
                                            <span>&times;</span>
                                        </button>
                                        <img src="{{ asset('images/products/' . $image->image) }}"
                                            alt="Product Image" style="width: 150px; height: 100px;"
                                            class="img-responsive">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-5">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


