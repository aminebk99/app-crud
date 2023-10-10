<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
</head>

<body>
    <h1>Create a product</h1>
    <form action="{{route('product.store')}}" method="post">
        @csrf
        @method('post')
        <div>
            <label >Name :</label>
            <input type="text" name="name" placeholder="Name...">
        </div>
        <div>
            <label >Qty :</label>
            <input type="text" name="qty" placeholder="Qty...">
        </div>
        <div>
            <label >Price :</label>
            <input type="text" name="price" placeholder="Price...">
        </div>
        <div>
            <label >Description :</label>
            <input type="text" name="description" placeholder="Description...">
        </div>
        <div>
            <input type="submit" value="Save a New Product">
        </div>
    </form>

</body>

</html>
