@include('frontend.layouts.header')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card-header">
                <h2>Category Details

                    <a href="{{url('admin/category/create')}}" class="btn btn-primary float-right">Add Category</a>
                </h2>
            </div>
            <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">NAME</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($categories as $item)
                                <tr>
                                    <td class="text-center">{{$item->id}}</td>
                                    <td class="text-center">{{$item->name}}</td>
                                    <td class="text-center">{{$item->slug}}</td>
                                    <td class="text-center"> 
                                        <a href="{{url('admin/category/'.$item->id.'/edit')}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('admin/category/'.$item->id.'/delete')}}" class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>
                             @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
