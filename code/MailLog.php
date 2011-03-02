<?php

class MailLog extends DataObject {
    
    
	static $db = array(
	        "To" => "Varchar",
                "From" => "Varchar",
		"Date" => "Datetime",
		"Subject" => "Text",
		"Body" => "Text"
	);
}