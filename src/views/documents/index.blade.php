@extends('core::template')

@section('title','Documents')

@section('content')
<main class="documents">
	<div class="row">
		<div class="column large-12">
			<h1>Documents</h1>
			@foreach($documents as $document) 
			<div class="document-item">
				<div class="document-name"><a href="{{ asset($document->file) }}">{{ $document->name }}</a></div>
				<div class="document-html">
					{{ $document->html }}
				</div>
				<hr />
			</div>
			@endforeach
		</div>
	</div>
</main>
@stop