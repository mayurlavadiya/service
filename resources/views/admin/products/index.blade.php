@include('frontend.layouts.header')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card-header">
                <h2>Products Details
                    <a href="{{ url('admin/products/create') }}" class="btn btn-primary float-right">ADD Product</a>
                </h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CATEGORY</th>
                            <th>NAME</th>
                            <th>PRICE</th>
                            <th>IMAGE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    @foreach ($item->categories as $category)
                                        {{ $category->name }}<br>
                                    @endforeach
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    @foreach ($item->images ?? [] as $image)
                                    <img src="{{ asset('/images/products/'. $image->image) }}" alt="Product Image" style="width: 100px; height: 80px;">
                                    @endforeach

                                </td>
                                <td>
                                    <a href="{{ url('admin/products/' . $item->id . '/edit') }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ url('admin/products/' . $item->id . '/delete') }}"
                                        class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- edit blade --}}
{{-- <div class="row space-between mt-3">
                                @foreach ($product->images ?? [] as $image)
                                <img src="{{ asset('images/products/' . $image->image) }}" alt="Product Image"
                                style="width: 200px; height: 150px;" class="img-responsive">
                                <a href="#" wire:click.prevent='deleteimage({{$image->id}})'>
                                <i class="fa fa-times text-danger mr-4"></i></a>
                                @endforeach
                            </div> --}}
