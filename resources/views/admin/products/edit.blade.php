@include('frontend.layouts.header')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card-header">
                <h2 class=text-center>EDIT PRODUCT DETAILS
                    <a href="{{ url('admin/products') }}" class="btn btn-primary float-right">Back</a>
                </h2>

                <div class="card-body">
                    <form action="{{ url('admin/products/' . $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Select Category</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $product->category_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- CHECKBOX SELECTED CATEGORIES

            <div class="mb-3">
            <label>Select Category</label><br>
            @foreach ($categories as $item)
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="categories[]" value="{{$item->id}}"> {{$item->name}}
                </label>&nbsp;&nbsp;
            @endforeach
            </div> --}}

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
                            <input type="file" name="images[]" class="form-control" multiple >
                            @foreach ($product->images1 as $image)
                            <img src="{{ asset('images/products/' . $image->image) }}"
                                 alt="Product Image"
                                 style="width: 100px; height: 100px;" class="mt-2">
                        @endforeach
                            {{-- @if ($product->image)
                                <img class="mt-3" src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}"
                                    style="max-height: 200px;" >
                            @endif --}}
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
