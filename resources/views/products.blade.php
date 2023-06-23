<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	  {{-- Font Awesome CSS --}}
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-solid.css">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-regular.css">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-light.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css"
		integrity="sha384-PJsj/BTMqILvmcej7ulplguok8ag4xFTPryRq8xevL7eBYSmpXKcbNVuy+P0RMgq" crossorigin="anonymous">

	<title>AJAX CRUD</title>
</head>

<body>

	<div class="container">
		{{-- <div class="col-md-2"></div> --}}
		<div class="col-md-8">
			<h2 class="my-5 text-center">Laravel - AJAX CRUD</h2>
			<a class="btn btn-success my-3" href="" data-bs-toggle="modal" data-bs-target="#addModal">Add Product</a>
			<div class="table-data">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Price</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $key=>$product)
						<tr>
							<th>{{ $key+1 }}</th>
							<td>{{ $product->name }}</td>
							<td>{{ $product->price }}</td>
							<td>
								<a href=""
									class="btn btn-success update_product_form"
									data-bs-toggle="modal"
									data-bs-target="#updateModal"
									data-id="{{ $product->id }}"
									data-name="{{ $product->name }}"
									data-price="{{ $product->price }}"
								>
									<i class="fa-solid fa-pen-to-square"></i>
								</a>
								<a href=""
									class="btn btn-danger"
									data-id="{{ $product->id }}"
								>
									<i class="fa-solid fa-trash"></i>
								</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{!! $products->links() !!}
			</div>
		</div>
	</div>

	@include('add_product_modal')
	@include('update_product_modal')
	@include('product_js')

</body>

</html>