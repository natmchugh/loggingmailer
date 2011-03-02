<?php

class LoggingMailer extends Mailer{
   
   function sendPlain($to, $from, $subject, $plainContent, $attachedFiles = false, $customheaders = false) {
	        
		if ( parent::sendPlain($to, $from, $subject, $plainContent, $attachedFiles = false, $customheaders = false) ) {
	        $log = new MailLog();
		$log->To = $to;
		$log->From = $from;
		$log->Subject = $subject;
		$log->Body = $plainContent;
		$log->Date = date('Y-m-d h:i:s');
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
	
		if (parent::sendHTML($to, $from, $subject, $htmlContent, $attachedFiles = false, $customheaders = false, $plainContent = false, $inlineImages = false) ) {
	        $log = new MailLog();
		$log->To = $to;
		$log->From = $from;
		$log->Subject = $subject;
		$log->Body = $htmlContent;
		$log->Date = date('Y-m-d h:i:s');
		$log->write();
		} else {
		  throw new Exception("Mail not accepted for delivery to $to");
		}
		
	} 
}