<?php
/**
 * This file is part of the WebAssetLoader package
 *
 * @license		MIT
 * @author		Vojtěch Lank <vojtech.lank@ibrconsulting.cz>
 * @copyright	(c) 2017, IBR Consulting, s.r.o.
 * @link		https://github.com/IBRConsulting/WebAssetLoader
 */

namespace IBR\WebAssetLoader;

use \Nette\Application\UI\Control;

class Loader extends Control {

	/**
	 * @var array
	 */
	private $assets;

	public function __construct(array $assets)
	{
		parent::__construct();
		$this->assets = $assets;
	}

	public function renderJs()
	{
		$this->template->setFile(__DIR__ . '/js.latte');
		$this->template->assets = isset($this->assets['js']) ? $this->assets['js'] : [];
		$this->template->render();
	}

	public function renderCss()
	{
		$this->template->setFile(__DIR__ . '/css.latte');
		$this->template->assets = isset($this->assets['css']) ? $this->assets['css'] : [];
		$this->template->render();
	}

}
