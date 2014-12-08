<?php namespace Angel\Documents;

use Angel\Core\AdminCrudController;
use App, View;

class AdminDocumentController extends AdminCrudController {
	protected $Model	= 'Document';
	protected $uri		= 'documents';
	protected $plural	= 'documents';
	protected $singular = 'document';
	protected $package	= 'documents';
	protected $reorderable = true;

	public function edit($id)
	{
		$Document = App::make($this->Model);

		$document = $Document::withTrashed()->find($id);
		$this->data['document'] = $document;
		$this->data['changes'] = $document->changes();
		$this->data['action'] = 'edit';

		return View::make($this->package . '::admin.documents.add-or-edit', $this->data);
	}
}