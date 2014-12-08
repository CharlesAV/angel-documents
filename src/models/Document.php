<?php namespace Angel\Documents;

use Angel\Core\LinkableModel;
use App, Config, Input;

class Document extends LinkableModel {

	public static function columns()
	{
		return array(
			'name',
			'html',
			'file'
		);
	}
	public function validate_rules()
	{
		return array(
			'name' => 'required',
			'file' => 'required'
		);
	}
	
	///////////////////////////////////////////////
	//                  Events                   //
	///////////////////////////////////////////////
	public static function boot()
	{
		parent::boot();

		static::saving(function($document) {
			$document->plaintext = strip_tags($document->html);
		});
	}
	
	///////////////////////////////////////////////
	//               Relationships               //
	///////////////////////////////////////////////
	public function changes()
	{
		$Change = App::make('Change');

		return $Change::where('fmodel', 'Document')
				   	       ->where('fid', $this->id)
				   	       ->with('user')
				   	       ->orderBy('created_at', 'DESC')
				   	       ->get();
	}

	// Handling relationships in controller CRUD methods
	public function pre_delete()
	{
		parent::pre_delete();
		$Change = App::make('Change');
		$Change::where('fmodel', 'Document')
			        ->where('fid', $this->id)
			        ->delete();
	}

	///////////////////////////////////////////////
	//               Menu Linkable               //
	///////////////////////////////////////////////
	public function link()
	{
		return asset($this->file);
	}
	public function link_edit()
	{
		return admin_url('documents/edit/' . $this->id);
	}
	public function search($terms)
	{
		return static::where(function($query) use ($terms) {
			foreach ($terms as $term) {
				$query->orWhere('name', 'like', $term);
				$query->orWhere('plaintext', 'like', $term);
			}
		})->get();
	}
}