# Web Asset Loader
Nette extension for loading JS and CSS into template.

**Assets gets loaded into the page in the exact order as you define it. This is useful for loading libraries (jQuery) first or overriding css.**

## Installation

You can install WebAssetLoader using Composer:

```
composer require ibr/web-asset-loader
```

## Example with Nette Framework extension

Configuration in `config.neon`

```yaml
extensions:
	webAssetLoader: IBR\WebAssetLoader\Nette\Extension

webAssetLoader:
	js:
		- path/to/file/file1.js
		- path/to/file/file2.js
	css:
		- path/to/file/file1.css
		- path/to/file/file2.css
```

Usage in `BasePresenter.php` (need to pass the instance of the control and create component)

```php
use \IBR\WebAssetLoader\Loader as WebAssetLoader;

abstract class BasePresenter extends \Nette\Application\UI\Presenter
{
	/**
	 * @var WebAssetLoader
	 * @inject
	 */
	public $webAssetLoader;

	public function createComponentWebAssetLoader()
	{
		return $this->webAssetLoader;
	}

}
```

Usage in `@layout.latte` (or any template)

```latte
{control webAssetLoader:css}

{control webAssetLoader:js}
```

Result

```latte
<link rel="stylesheet" href="{$basePath}/path/to/file/file1.css">
<link rel="stylesheet" href="{$basePath}/path/to/file/file2.css">

<script type="text/javascript" src="{$basePath}/path/to/file/file1.js"></script>
<script type="text/javascript" src="{$basePath}/path/to/file/file2.js"></script>
```
