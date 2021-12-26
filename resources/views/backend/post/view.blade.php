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
		<h1 class="main-title float-left">Post List</h1>
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
				<h4>Total posts = {{$cnt}}</h4>
			</div>
			<div class="card-body">
				<table id="datatable" class="table table-sm table-bordered">
					<thead>
						<tr>
							<th>SL</th>
							<th class="text-center">User_id</th>
							<th class="text-center">Categpry_id</th>
							<th class="text-center">Title</th>
							<th class="text-center">Description</th>
							<th class="text-center">Image</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($posts as $post)
						<tr>
							<td>{{$loop->index+1}}</td>
							<td class="text-center"><span class="text-semibold">{{ $post->users->name }}</span></td>
							<td class="text-center"><span class="text-semibold">{{ $post->categories->name }}</span></td>
							<td class="text-center"><span class="text-semibold">{{ $post->title }}</span></td>
							<td class="text-center"><span class="text-semibold">{{ $post->content }}</span></td>
							<td class="text-center"><span class="text-semibold"><img src="{{ $post->thumbnail }}" height="100" alt=""></span></td>
							<td class="text-center">
								<a class="btn btn-sm btn-success" href="{{route('post.edit',$post->id)}}">
									<i class="fa fa-edit"></i>
								</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{-- {{$posts->links()}} --}}
			</div>
		</div>
	</div>	
</div>

@endsection
@endsection