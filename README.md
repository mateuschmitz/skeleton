# Skeleton

**Simple skeleton for simple web applications.**

### Route Examples

```
'index' => array(
  'route' => '',
  'constraints' => array(
    'namespace'  => 'Site\Controller\\',
    'controller' => 'IndexController',
    'action' 	 => 'indexAction'
  )
)
```
```
'user'  => array(
  'route' 	  => '/user/[:action:]',
  'constraints' => array(
    'namespace'  => 'Site\Controller\\',
    'controller' => 'UserController',
    'action' 	 => '[:action:]Action'
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
  'route' 	  => '/[:param:]',
  'constraints' => array(
    'namespace'  => 'Site\Controller\\',
    'controller' => 'UserController',
    'action' 	 => 'indexAction'
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
  'route' 	  => '/forum/[:action:]/[:param:]',
  'constraints' => array(
    'namespace'  => 'Site\Controller\\',
    'controller' => 'ForumController',
    'action' 	 => '[:action:]Action'
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