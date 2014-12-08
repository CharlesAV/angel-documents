@extends('core::admin.template')

@section('title', 'Documents')

@section('js')
	{{ HTML::script('packages/angel/core/js/jquery/jquery-ui.min.js') }}
	<script>
		$(function() {
			$("tbody").sortable(sortObj);
		});
	</script>
@stop

@section('content')
<div class="row pad">
	<div class="row pad">
		<div class="col-sm-8 pad">
			<h1>Documents</h1>
			<a class="btn btn-sm btn-primary" href="{{ admin_url('documents/add') }}">
				<span class="glyphicon glyphicon-plus"></span>
				Add
			</a>
		</div>
		<div class="col-sm-4 well">
			{{ Form::open(array('role'=>'form', 'method'=>'get')) }}
				<div class="form-group">
					<label>Search</label>
					<input type="text" name="search" class="form-control" value="{{ $search }}" />
				</div>
				<div class="text-right">
					<input type="submit" class="btn btn-primary" value="Search" />
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th style="width:80px;"></th>
					<th>Name</th>
				</tr>
			</thead>
			<tbody data-url="documents/order">
			@if(count($documents))
				@foreach($documents as $document)
					<tr{{ $document->deleted_at ? ' class="deleted"' : '' }} data-id="{{ $document->id }}">
						<td>
							<input type="hidden" class="orderInput" value="{{ $document->order }}" />
							<a href="{{ url('admin/documents/edit/' . $document->id) }}" class="btn btn-xs btn-default">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
							<button type="button" class="btn btn-xs btn-default handle">
								<span class="glyphicon glyphicon-resize-vertical"></span>
							</button>
						</td>
						<td>{{ $document->name }}</td>
					</tr>
				@endforeach
			@else 
					<tr>
						<td colspan="3" align="center" style="padding:30px;">
							No Documents Found.
						</td>
					</tr>
			@endif
			</tbody>
		</table>
	</div>
</div>
@stop
