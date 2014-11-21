<?php

/**
 * M2S micro-framework
 *
 * @author Mateus Schmitz matteuschmitz@gmail.com
 * @link https://github.com/mateuschmitz/skeleton
 * @license undefined
 * @package Session
 */

namespace M2S\Session;

/**
 * Classe Session
 */
class SessionHandler
{
	/**
	 * session_id()
	 * @var string
	 */
	protected $id;

	/**
	 * cria a sessão e atribui o session_id ao atributo id da classe
	 * @return void
	 */
	public function createSession()
	{
		session_start();
		$this->id = session_id();
	}

	/**
	 * verifica se a sessão existe e está com o session_id correto
	 * @return bool
	 */
	public function sessionExists()
	{
		if ($this->validateSession()) {
			return true;
		}

		return false;
	}

	/**
	 * Destrói a sessão
	 * @return bool
	 */
	public function destroySession()
	{
		session_destroy();

		if ($this->sessionExists()) {
			//exception
		}

		return true;
	}

	/**
	 * Retorna o id da sessão definido no objeto
	 * @return string id
	 */
	public function getSessionId()
	{
		return $this->id;
	}

	/**
	 * valida se o id da sessão corresponde ao session_id()
	 * @return bool
	 */
	public function validateSession()
	{
		if (session_id() == $this->id) {
			return true;
		}

		return false;
	}

	/**
	 * Adciona dados a sessão e ao objeto
	 * @param string $key   chave no array
	 * @param string $value conteúdo
	 */
	public function addInSession($key, $value)
	{
		$_SESSION[$key] = $value;
		$this->
	}

	/**
	 * [getFromSession description]
	 * @param  [type] $param [description]
	 * @return [type]        [description]
	 */
	public function getFromSession($param)
	{
		if (isset($_SESSION[$param])) {
			return $_SESSION[$param];
		}
	}

	/**
	 * [removeFromSession description]
	 * @param  [type] $param [description]
	 * @return [type]        [description]
	 */
	public function removeFromSession($param)
	{
		if (isset($_SESSION[$param])) {
			unset($_SESSION[$param]);
		}
	}
}