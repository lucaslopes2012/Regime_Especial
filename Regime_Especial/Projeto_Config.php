<?php
/** O nome do banco de dados*/
define('DB_NAME', 'BDRegime_Especial');
/**Usuário do banco de dados MySQL */
define('DB_USER', 'root');
/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');
/** nome do host do MySQL */
define('DB_HOST', 'localhost:3306');
/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
	define('BASEURL', '/Projetos/Regime_Especial/');
/** caminho do arquivo de banco de dados **/
if ( !defined('DBAPI') )
	define('DBAPI', ABSPATH . 'Inc/BD_Config.php');
/** caminhos dos templates de header e footer **/
define('HEADER_TEMPLATE', ABSPATH . 'Inc/Header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'Inc/Footer.php');