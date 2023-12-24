<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Tutorial Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 9 CRUD Example Tutorial</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('products.create') }}"> Create item</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>product name </th>
                    <th>product desc </th>
                    <th>price </th>
                    <th>stock </th>
                    <th>category </th>
                    <th>brand</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->product_name  }}</td>
                        <td>{{ $item->product_desc  }}</td>
                        <td>{{ $item->prod_price  }}</td>
                        <td>{{ $item->prod_stock  }}</td>
                        <td>{{ $item->categories->category_name  }}</td>
                        <td>{{ $item->brands->brand_name }}</td>
                     
                        <td>
                            <form action="{{ route('products.destroy',$item->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('products.edit',$item->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $products->links() !!}
    </div>
</body>
</html>