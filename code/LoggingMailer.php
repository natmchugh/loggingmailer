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

class LoggingMailer extends Mailer{
   
   function sendPlain($to, $from, $subject, $plainContent, $attachedFiles = false, $customheaders = false) {
	        
		if ( parent::sendPlain($to, $from, $subject, $plainContent, $attachedFiles, $customheaders) ) {
	        $log = new MailLog();
		$log->To = $to;
		$log->From = $from;
		$log->Subject = $subject;
		$log->Body = $plainContent;
		$log->Date = date('Y-m-d H:i:s');
		$log->write();
		} else {
		  throw new Exception("Mail not accepted for delivery to $to");
		}
	     
		
               
	}
	
	/**
	 * Send a multi-part HTML email.
	 * 
	 * @return bool
	 */
	function sendHTML($to, $from, $subject, $htmlContent, $attachedFiles = false, $customheaders = false, $plainContent = false, $inlineImages = false) {
	
		if (parent::sendHTML($to, $from, $subject, $htmlContent, $attachedFiles, $customheaders, $plainContent, $inlineImages) ) {
	        $log = new MailLog();
		$log->To = $to;
		$log->From = $from;
		$log->Subject = $subject;
		$log->Body = $htmlContent;
		$log->Date = date('Y-m-d H:i:s');
		$log->write();
		} else {
		  throw new Exception("Mail not accepted for delivery to $to");
		}
		
	} 
}
