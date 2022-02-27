@extends('master')
@section('title')
    Manage product Page
@endsection

@section('body')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header text-center">All Product</div>
                        <div class="card-body">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="text-center">
                                    <th>SL NO</th>
                                    <th> ID </th>
                                    <th> Name </th>
                                    <th> Category </th>
                                    <th> Brand </th>
                                    <th> Price </th>
                                    <th> Description </th>
                                    <th> Image </th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category}}</td>
                                        <td>{{$product->brand}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->image}}</td>
                                        <td class="text-center">
                                            <a href="{{route('edit-product',['id'=>$product->id])}}" class="btn  btn-success btn-sm">
                                                <i class="fa fa-user-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm" onclick="deleteProduct({{$product->id}})">
                                                <i class="fas fa-user-times"></i>
                                            </a>
                                            <form method="post" action="{{route('delete-product',['id'=>$product->id])}}" id="deleteProductForm{{$product->id}}">
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function deleteProduct(id)
        {
            event.preventDefault();
            var check = confirm('Are you sure to delete this..');
            if(check)
            {
                document.getElementById('deleteProductForm'+id).submit();
            }
        }
    </script>
@endsection


