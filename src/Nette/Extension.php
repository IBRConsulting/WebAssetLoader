<?php
/**
 * This file is part of the WebAssetLoader package
 *
 * @license		MIT
 * @author		Vojtěch Lank <vojtech.lank@ibrconsulting.cz>
 * @copyright	(c) 2017, IBR Consulting, s.r.o.
 * @link		https://github.com/IBRConsulting/WebAssetLoader
 */

namespace IBR\WebAssetLoader\Nette;

use \IBR\WebAssetLoader\Loader;
use \Nette\DI\CompilerExtension;

class Extension extends CompilerExtension {

	public $defaults = [
		'js' => [],
		'css' => []
	];

	public function loadConfiguration()
	{
		$config = $this->getConfig($this->defaults);
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('loader'))
				->setClass(Loader::class, [$config]);
	}

}
