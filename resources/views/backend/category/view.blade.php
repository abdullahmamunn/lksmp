@extends('backend.layouts.app')
@section('content')
@section('content')
<style type="text/css">
  .i-style{
        display: inline-block;
        padding: 10px;
        width: 2em;
        text-align: center;
        font-size: 2em;
        vertical-align: middle;
        color: #444;
  }
  .demo-icon{cursor: pointer; }
</style>
<div class="col-xl-12">
	<div class="breadcrumb-holder">
		<h1 class="main-title float-left">Category List</h1>
		<ol class="breadcrumb float-right">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>Home</strong></a></li>
			<li class="breadcrumb-item active">Menu</li>
		</ol>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container fullbody">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<a id="demo-btn-addrow" class="btn btn-success btn-sm" href="{{route('menu.add')}}">
					<i class="ion-plus"></i> Add Menu
				</a>
			</div>
			<div class="card-body">
				<table id="datatable" class="table table-sm table-bordered">
					<thead>
						<tr>
							<th>SL</th>
							<th class="text-center">Name</th>
							<th class="text-center">Slug</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
						<tr>
							<td>{{$loop->index+1}}</td>
							<td class="text-center"><span class="text-semibold">{{ $category->name }}</span></td>
							<td class="text-center"><span class="text-semibold">{{ $category->slug }}</span></td>
							<td class="text-center">
								<a class="btn btn-sm btn-success" href="{{route('category.edit',$category->id)}}">
									<i class="fa fa-edit"></i>
								</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>	
</div>

@endsection
@endsection