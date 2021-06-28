<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code



defined('COMPANY_NAME')        OR define('COMPANY_NAME', "RBTEXTILE"); // company name
defined('TITLE')        	   OR define('TITLE', "RBTEXTILE || LARK INFOWAY"); // company name
defined('DEVELOP_BY')   	   OR define('DEVELOP_BY', "LARK INFOWAY"); // developer's name
defined('DEVELOP_URL')  	   OR define('DEVELOP_URL', "https://www.larkinfoway.com/"); // URL
defined('COMPANY')      	   OR define('COMPANY', "Rb Textile"); // company name
defined('START_YR')     	   OR define('START_YR', 2019); 



defined('LOGO_BLACK')     	   OR define('LOGO_BLACK', "lark-b.png"); 
defined('LOGO_WHITE')     	   OR define('LOGO_WHITE', "lark-w.png"); 
defined('USER_LOGO')     	   OR define('USER_LOGO', "common.png"); 
defined('LOGO_SIDEBAR')    	   OR define('LOGO_SIDEBAR', "lark-logo.png"); 


defined('TAX')   OR define('TAX', 5); 
defined('LOT')   OR define('LOT', "L");
defined('STARTLOT')   OR define('STARTLOT', 1);
defined('HSN')   OR define('HSN',  5208);
 

defined('FULL_NAME')   OR define('FULL_NAME', "TEXTILE PVT. LTD."); 
defined('COM_HEADER')   OR define('COM_HEADER', "Mfg. Cotton Sarees, Kitanga, Khanga & Dress Materials."); 
defined('ADDRESS1')    OR define('ADDRESS1', ', JETPUR-360370');
defined('ADDRESS2')    OR define('ADDRESS2', 'Champrajpur Road, Near Bhojadhar, B/h. Mayur Plastic, JETPUR-360370'); 
defined('GST_NO')   OR define('GST_NO', "1235234123"); 
defined('PAN_NO')   OR define('PAN_NO', "AAJCR1231231232380L"); 
defined('MOBILE')   OR define('MOBILE', "1234124231230"); 
defined('SUBJECT')   OR define('SUBJECT', "Subject to JETPUR Jurisdiction"); 
