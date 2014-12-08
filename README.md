Angel Documents
==============
This is a module for the [Angel CMS](https://github.com/CharlesAV/angel).

Installation
------------
Add the following requirements to your `composer.json` file:
```javascript
"repositories": [
	{
		"type": "vcs",
		"url": "https://github.com/CharlesAV/angel-documents"
	}
],
"require": {
	"angel/documents": "dev-master"
},
```

Issue a `composer update` to install the package.

Add the following service provider to your `providers` array in `app/config/app.php`:
```php
'Angel\Documents\DocumentsServiceProvider'
```

Issue the following command:
```bash
php artisan migrate --package="angel/documents"  # Run the migrations
```

Open up your `app/config/packages/angel/core/config.php` and add the documents route to the `menu` array:
```php
'menu' => array(
	'Pages' => 'pages',
	'Menus' => 'menus',
	'Documents' => 'documents',  // <--- Add this line
	'Users' => 'users',
	'Settings' => 'settings'
),
```
