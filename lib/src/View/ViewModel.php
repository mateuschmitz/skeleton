<?php

namespace M2S\View;

/**
 * Classe responsável pela renderização das views
 */
class ViewModel
{
	/**
	 * Define se a view deve ser auto renderizada ao instanciar a classe
	 * @var bool
	 */
	protected $autoRender;

	/**
	 * Define o layout a ser executado no momento da renderização
	 * @var string
	 */
	protected $layout;

	/**
	 * Define qual view será executada
	 * @var string
	 */
	protected $view;

	/**
	 * Dados passados para a view no momento da construção do objeto
	 * @var array
	 */
	protected $dataView;

	/**
	 * Conteúdo do layout carregado
	 * @var [type]
	 */
	protected $layoutFile;

	/**
	 * Conteúdo da view carregado
	 * @var [type]
	 */
	protected $contentView;

	/**
	 * Helpers que serão carregados
	 * @var array
	 */
	protected $helpers = array();

	/**
	 * construtor da classe
	 * @param boolean $autoRender Define se a view deve ser auto renderizada ao instanciar a classe
	 * @param array   $dataView   Dados passados para a view
	 */
	public function __construct($autoRender = true, $dataView = array()) {

		$this->layout     = 'default';
		$this->autoRender = $autoRender;

		if ((!empty($dataView)) && (is_array($dataView))) {
			foreach ($dataView as $key => $value) {
				$this->setVariable($key, $value);
			}
		}

		if ($this->autoRender) {
			$this->render();
		}
	}

	/**
	 * Renderiza a view solicitada, por padrão renderiza a 'index'
	 * @param  string $view nome da view a ser renderizada
	 * @return string
	 */
	public function render($view = 'index') {

		$this->view        = $view;
		$this->layoutFile  = $this->getLayoutFile();

		return $this->layoutFile;
	}

	/**
	 * Seta variáveis para o layout
	 * @param string 			   $variableName    Nome dado a variável
	 * @param string/integer/array $variableContent Conteúdo da variável
	 */
	public function setVariable($variableName, $variableContent) {
		$this->$variableName = $variableContent;
	}

	/**
	 * Seta um novo layout para a aplicação
	 * @param string $newLayout nome do novo layout
	 */
	public function setLayout($newLayout) {
		$this->layout = $newLayout;
	}

	/**
	 * Retorna o nome do layout utilizado atualmente
	 * @return string
	 */
	public function getLayout() {
		return $this->layout;
	}

	/**
	 * Adiciona novos helpers
	 * @param array $helper Aceita somente o nome da classe ou o nampespace completo
	 */
	public function addHelper($helper)
	{
		foreach ($helper as $key => $value) {
			preg_match('/\\\/', $value, $matches);
			if (empty($matches)) {
				$newHelper = "M2S\View\Helper\\" . $value;
				$this->helpers[] = $newHelper;
				$this->$key = new $newHelper;
			} else {
				$this->helpers[] = $value;
				$this->$key = new $value;
			}
		}

		return $this;
	}

	// public function getHelper()
	// {
	// 	return $this->helpers;
	// }

	/**
	 * Retorna o conteúdo da view informada no método render()
	 * @return string
	 */
	public function content() {
		return $this->getContentView();
	}

	/**
	 * Carrega e retorna o layout em uso
	 * @return string
	 */
	protected function getLayoutFile () {
		return require(LAYOUT_PATH . DS . $this->layout . DS . "layout.phtml");
	}

	/**
	 * Carrega e retorna a view em uso
	 * @return string
	 */
	protected function getContentView () {
		return require(LAYOUT_PATH . DS . $this->layout . DS . $this->view . ".phtml");
	}
}
