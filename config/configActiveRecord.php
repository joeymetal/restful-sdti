<?php
/**active record setup
 * exemplo sqlite
 * 'sqlite' => 'sqlite://my_database.db',
 * 
*/

$cfg = ActiveRecord\Config::instance();
$cfg->set_model_directory('models');
$cfg->set_connections(
  array(
    'development' => 'mysql://root:@localhost/development_db',
    'test' => 'mysql://username:password@localhost/test_database_name',
    'production' => 'mysql://username:password@localhost/production_database_name'
  )
);

//Não muito necesaria
ActiveRecord\DateTime::$DEFAULT_FORMAT = 'd-m-Y'; 
#d-m-Y short
ActiveRecord\DateTime::$FORMATS['awesome_format'] = 'H:i:s m/d/Y';