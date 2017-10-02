<?php
/* MySql Home */
define('M_HOST','localhost');
define('M_USER','root');
define('M_PASS','');
define('M_DB','soap');

// /* MySql Class */
// define('M_HOST','localhost');
// define('M_USER','user10');
// define('M_PASS','tuser10');
// define('M_DB','user10');

define('LINK_WSDL', 'autoService.wsdl');

/* ERRORs */
define('ERR_TO_CLIENT_NO_CONNECTION', 'Sorry but the service is not yet available, we are working on fixing the problem and will work again soon. Try a little later.');
define('ERR_TO_CLIENT_NO_WRITING', 'Not successfully writing to the database!');
define('ERR_TO_CLIENT_NO_YEAR', 'No param \'year\'!');
define('ERR_TO_CLIENT_NO_ARRAY', 'Need array!');
define('ERR_TO_CLIENT_NO_ID', 'Need id!');