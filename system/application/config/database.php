<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$config['db_manager'] = 'doctrine';

$active_group = 'default';
$active_record = TRUE;

//development

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'WebMaster';
$db['default']['password'] = 'babilon6';
$db['default']['database'] = 'CI';


$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = FALSE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

$db['default']['dsn'] = $db['default']['dbdriver'] .
                        '://' . $db['default']['username'] .
                        ':' . $db['default']['password'].
                        '@' . $db['default']['hostname'] .
                        '/' . $db['default']['database'];
                   
// Require Doctrine.php. ** .htaccess could rewrite the url to skip the database connection in some cases like images, styles...
if (!defined('DATABASE') || DATABASE) {
	require_once(realpath(dirname(__FILE__) . '/../..') . DIRECTORY_SEPARATOR . 'database/Doctrine/Doctrine.php');
        spl_autoload_register(array('Doctrine', 'autoload'));
	Doctrine_Core::setModelsDirectory(realpath(dirname(__FILE__) . '/..') . DIRECTORY_SEPARATOR . 'models');
	spl_autoload_register(array('Doctrine', 'modelsAutoload'));

	$manager = Doctrine_Manager::getInstance();
	$manager->setAttribute(Doctrine_Core::ATTR_MODEL_LOADING, Doctrine_Core::MODEL_LOADING_CONSERVATIVE);
	$manager->openConnection($db['default']['dsn'], $db['default']['database']);
	$manager->setAttribute(Doctrine_Core::ATTR_AUTOLOAD_TABLE_CLASSES, true);
	$manager->setAttribute(Doctrine_Core::ATTR_DEFAULT_TABLE_CHARSET,'utf8');
        $manager->setAttribute(Doctrine_Core::ATTR_NAME_PREFIX,'doctrine');
	//$conn = Doctrine_Manager::Connection(); 
        $conn = Doctrine_Manager::connection($db['default']['dsn'], 'doctrine');
	$conn->setCharset('utf8');
        
        
        //Para generar los modelos
        Doctrine_Core::generateModelsFromDb(realpath(dirname(__FILE__) . '/..') . DIRECTORY_SEPARATOR . 'models', array('doctrine'), array('generateTableClasses' => true));
        
}
/* End of file database.php */
/* Location: ./application/config/database.php */