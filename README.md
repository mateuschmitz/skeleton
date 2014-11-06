Skeleton
=======

O objetivo deste projeto é fornecer um esqueleto completo para aplicações web SIMPLES. Se você está iniciando com MVC, talvez este seja um bom ponto de partida.

Índice
-----
* [Instalação](#instalação)
* [Controllers](#controllers)
* [Views](#views)
* [Models](#models)
* [Configurações](#configurações)
* [Rotas](#rotas)
* [ToDo](#todo)

Instalação
---------
```sh
git clone git@github.com:mateuschmitz/skeleton.git [nome_aplicacao]
cd nome_aplicacao
php composer.phar install
```

Controllers
-----------
Todo controller criado deve estar em *app/src/Controller* possuir o namespace ** App\Controller **, importar e estender **App\Controller\BaseController**. Os controllers devem iniciar com letra maiúscula, terminar com a extensão **Controller** e todos os métodos devem obrigatoriamente terminar com ** Action **. Exemplo:

```php
<?php

namespace App\Controller;

use App\Controller\BaseController;
use App\View\Model\ViewModel;

class IndexController extends BaseController
{
  /**
   * Função default, exibe a home do skeleton
   */
  public function indexAction()
  {
    return new ViewModel(true, ['title' => 'Skeleton']);
  }
}

?>
```
Views
-----
O projeto trabalha com um sistema de templates. O arquivo **layout.phtml** define o design do projeto, como por exemplo cabeçalho, rodapé e demais elementos que sejam comuns a todas as páginas. Os elementos específicos de cada view são definidos nos arquivos específicos que ficam dentro da pasta do template em questão e devem ter extensão **.phtml**. Os arquivos ficam organizados da seguinte forma:

* Cada template deve possui uma pasta com seu nome no seguinte caminho *app/src/View/Layout*
* Dentro da pasta do template deve existir o arquivo layout.phtml que será utilizado sempre que o layout for chamado
* Nesta mesma pasta devem ficar os arquivos específicos das views
* Dentro da pasta criada deve existir a pasta errors, onde estarão as views de erros

### Layout ###
Deve estar localizado em *app/src/View/Layout/<NOME_DO_LAYOUT>/layout.phtml*

### View ###
Devem estar localizadas em *app/src/View/Layout/<NOME_DO_LAYOUT>/NOME_DA_VIEW.phtml*

Models
------
* Ainda não implementado


Configurações
-------------
* Ainda não implementado


Rotas
-----

```
'index' => array(
  'route' => '',
  'constraints' => array(
    'namespace'  => 'Site\Controller\\',
    'controller' => 'IndexController',
    'action'   => 'indexAction'
  )
)
```
```
'user'  => array(
  'route'     => '/user/[:action:]',
  'constraints' => array(
    'namespace'  => 'Site\Controller\\',
    'controller' => 'UserController',
    'action'   => '[:action:]Action'
  ),
  'validations'    => array(
    '[:action:]' => '([a-zA-Z]*)'
  ),
  'default' => array(
    'action' => 'indexAction'
  )
)
```
```
'user' => array(
  'route'     => '/[:param:]',
  'constraints' => array(
    'namespace'  => 'Site\Controller\\',
    'controller' => 'UserController',
    'action'   => 'indexAction'
  ),
  'validations' => array(
    '[:param:]' => '([a-zA-Z]*)'
  ),
  'param'      => array(
    'param' => '[:param:]'
  )
)
```
```
'forum'  => array(
  'route'     => '/forum/[:action:]/[:param:]',
  'constraints' => array(
    'namespace'  => 'Site\Controller\\',
    'controller' => 'ForumController',
    'action'   => '[:action:]Action'
  ),
  'validations'    => array(
    '[:action:]' => '([a-zA-Z]*)',
    '[:param:]' => '([0-9]*)'
  ),
  'default' => array(
    'action' => 'indexAction'
  ),
  'param'      => array(
    'param' => '[:param:]'
  )
)
```

ToDo
-----
[TODO](TODO.md)