<?php namespace Angel\Documents;

use App, View;

class DocumentController extends \Angel\Core\AngelController {
	
	public function __construct()
	{
		$this->Document = $this->data['Document'] = App::make('Document');

		parent::__construct();
	}
	
	function index()
	{
		// Query
		$this->data['documents'] = $this->Document
			->orderBy('order','asc')
			->get();
			
		// Return
		return View::make('documents::documents.index',$this->data);
	}
}