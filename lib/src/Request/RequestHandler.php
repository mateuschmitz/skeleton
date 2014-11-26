<?php

/**
 * M2S micro-framework
 *
 * @author Mateus Schmitz matteuschmitz@gmail.com
 * @link https://github.com/mateuschmitz/skeleton
 * @license undefined
 * @package Request
 */

namespace M2S\Request;

/**
 * Classe Request
 */
class RequestHandler
{
	/**
	 * $_SERVER['REQUEST_METHOD']
	 * @var string
	 */
	protected $method;

	/**
	 * $_POST
	 * @var array
	 */
	protected $post;

	/**
	 * $_GET
	 * @var array
	 */
	protected $get;

	/**
	 * Construtor da class
	 */
	public function __construct()
	{
		$this->method = $_SERVER['REQUEST_METHOD'];

		if (isset($_POST)) {
			$this->post = $_POST;
		}

		if (isset($_POST)) {
			$this->get = $_POST;
		}
	}

	/**
	 * retrna o método utilizado na requisição
	 * @return string $_SERVER['REQUEST_METHOD']
	 */
	public function getMethod()
	{
		return $this->method;
	}

	/**
	 * compara se o método passado é o mesmo da requisição
	 * @param  string $req
	 * @return boolean
	 */
	public function methodIs($req)
	{
		if (strtoupper($req) == $this->method) {
			return true;
		}

		return false;
	}

	/**
	 * retorna os parâmetros passados via POST
	 * @param  string $param
	 * @return array/boolean
	 */
	public function getFromPost($param = null)
	{
		if (!is_null($param)) {
			if (isset($this->post[$param])) {
				return $this->post[$param];
			}

			return false;
		}

		return $this->post;
	}

	/**
	 * retorna os parâmetros passados via GET
	 * @param  string $param
	 * @return array/boolean
	 */
	public function getFromGet($param = null)
	{
		if (!is_null($param)) {
			if (isset($this->get[$param])) {
				return $this->get[$param];
			}

			return false;
		}

		return $this->get;
	}
}