<?php

/**
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @package   LoggingMailer
 * @author     Nathaniel McHugh <nat@fishtrap.co.uk>
 */

class MailLog extends DataObject {
    
	static $db = array(
	        "To" => "Varchar",
                "From" => "Varchar",
		"Date" => "Datetime",
		"Subject" => "Text",
		"Body" => "Text"
	);
}