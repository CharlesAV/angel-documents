@extends('core::admin.template')

@section('title', ucfirst($action).' Document')

@section('css')
@stop

@section('js')
	{{ HTML::script('packages/angel/core/js/ckeditor/ckeditor.js') }}
@stop

@section('content')
<h1>{{ ucfirst($action) }} Document</h1>
@if ($action == 'edit')
	{{ Form::open(array('role'=>'form',
	'url'=>'admin/documents/delete/'.$document->id,
	'class'=>'deleteForm',
	'data-confirm'=>'Delete this document forever?  This action cannot be undone!')) }}
	<input type="submit" class="btn btn-sm btn-danger" value="Delete" />
	{{ Form::close() }}
@endif

@if ($action == 'edit')
	{{ Form::model($document) }}
@elseif ($action == 'add')
	{{ Form::open(array('role'=>'form', 'method'=>'post')) }}
@endif

<div class="row">
	<div class="col-md-9">
		<table class="table table-striped">
			<tbody>
				<tr>
					<td>
						{{ Form::label('name', 'Name') }}
					</td>
					<td>
						<div style="width:300px">
							{{ Form::text('name', null, array('class'=>'form-control')) }}
						</div>
					</td>
				</tr>
				<tr>
					<td>
						{{ Form::label('html', 'Description') }}
					</td>
					<td>
						{{ Form::textarea('html', null, array('class'=>'ckeditor')) }}
					</td>
				</tr>
				<tr>
					<td>
						{{ Form::label('file', 'File') }}
					</td>
					<td>
						{{ Form::text('file', null, array('class'=>'form-control','style' => 'float:left;width:300px;')) }}
						<button type="button" class="btn btn-default fileBrowse" style="float:left">Browse...</button>
						<div class="clearfix"></div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>{{-- Left Column --}}
</div>{{-- Row --}}
<div class="text-right pad">
	<input type="submit" class="btn btn-primary" value="Save" />
</div>
{{ Form::close() }}
@stop
