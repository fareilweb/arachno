<?php

/**
 * Entry Point Of The App
 */
class App
{
	/** @var string $controller - the current controller */
	private $controller = null;

	/** @var string $controller_instance - the current controller */
	private $controller_instance = null;

	/** @var string $default_controller - the current controller */
	private $default_controller = 'MainController';

	/** @var string $method - the current method */
	private $method = 'index';

	/** @var array $params - the remaining parameters */
	private $params = array();

	/**
	 * App constructor
	 * @return App
	 */
	public function __construct()
	{
		$this->RegisterAutoloaders();
		$parsedUrl = $this->ParseUrl();
		if ($parsedUrl) {
// If $parsedUrl[0] is a controller
			if ($this->IncludeController($parsedUrl[0])) {
				unset($parsedUrl[0]);

				$this->controller_instance = new $this->controller;

// Method. If $parsedUrl[0] is a controller AND $parsedUrl[1] is a method
				if (isset($parsedUrl[1]) && method_exists($this->controller_instance, $parsedUrl[1])) {
					$this->method = $parsedUrl[1];
					unset($parsedUrl[1]);
				}
			} else {
// If $parsedUrl[0] is NOT a controller try to run method of default controller
				$this->IncludeController($this->default_controller);
				$this->controller_instance = new $this->default_controller;

// If $parsedUrl[0] is a method
				if (method_exists($this->controller_instance, $parsedUrl[0])) {
					$this->method = $parsedUrl[0];
					unset($parsedUrl[0]);
				}

			}

/* Get and Set params from the remaining $parsedUrl vars */
			$this->params = $parsedUrl ? array_values($parsedUrl) : array();

/* Call controller and method, and passing the parameters */
			call_user_func_array(array($this->controller_instance, $this->method), array($this->params));
		} else {
/* If the $parsedUrl is EMPTY use Default controller/methods with empty args */
			$this->IncludeController($this->default_controller);
			$this->controller_instance = new $this->default_controller;
			call_user_func_array(array($this->controller_instance, $this->method), array($this->params));
		}
	}


	/**
	 * Register Autoloads
	 * @return void
	 */
	private function RegisterAutoloaders()
	{
		spl_autoload_register(function ($class_name) {
			$toSearch = [
				__DIR__ . DIRECTORY_SEPARATOR . $class_name . ".php",
				__DIR__ . DIRECTORY_SEPARATOR . "managers" . DIRECTORY_SEPARATOR . $class_name . ".php",
				__DIR__ . DIRECTORY_SEPARATOR . "filters" . DIRECTORY_SEPARATOR . $class_name . ".php",
				__DIR__ . DIRECTORY_SEPARATOR . "models" . DIRECTORY_SEPARATOR . $class_name . ".php",
				__DIR__ . DIRECTORY_SEPARATOR . "libs" . DIRECTORY_SEPARATOR . $class_name . ".php"
			];
			$file_included = false;
			$index = 0;
			$count = count($toSearch);

			while ($file_included === false && $index < $count) {
				$file = $toSearch[$index];

				if (file_exists($file)) {
					require_once($file);
					$file_included = true;
				}
				$index++;
			}
		});
	}


	/**
	 * Try to find a controller and include it
	 * @param string $class_name
	 * @return bool
	 */
	private function IncludeController($class_name)
	{
		$controllers_folder = __DIR__ . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR;
		$controllersToSearch = [
			ucfirst($class_name) . "Controller",
			strtolower($class_name) . "controller",
			strtolower($class_name) . "_controller",
			$class_name,
			ucfirst($class_name) . "_Controller"
		];

		$file_included = false;
		$index = 0;
		$count = count($controllersToSearch);
		while ($file_included === false && $index < $count) {
			$file = "$controllers_folder{$controllersToSearch[$index]}.php";

			if (file_exists($file)) {
				require_once($file);
				$this->controller = $controllersToSearch[$index];
				$file_included = true;
			}
			$index++;
		}

		return $file_included;
	}


	/**
	 * Parse url to search for "url" variable and split its parts into an array
	 * @return array $parurl
	 */
	private function ParseUrl() : array
	{
		$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		if (isset($get['url'])) {
			$parsed_url = explode('/', filter_var(rtrim($get['url'], '/'), FILTER_SANITIZE_URL));
			return $parsed_url;
		} else {
			return [];
		}
	}
}
