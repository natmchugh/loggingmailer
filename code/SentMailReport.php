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

class SentMailReport extends SS_Report {

	function description() {
		return 'Log of emails sent from the site';
	}

	function title() {
		return ("Logged Email");
	}

	function sourceRecords($params, $sort, $limit) {
		if (empty($sort)) {
			$sort = "Date DESC";
		}
		$ret = DataObject::get('MailLog', '', $sort);
		return $ret;
	}

	function columns() {
		return array(
			'Date' => array(
				"title" => "Date", // todo: use NestedTitle(2)
				"link" => true,
			),
			"To" => array(
				"title" => "To", // todo: use NestedTitle(2)
				"link" => true,
			),
			"From" => array('title' => 'From',),
			"Subject" => array('title' => 'Subject',
				),
			"Body" => array('title' => 'Body',),
		);
	}

	function getParameterFields() {
		return new FieldSet(
			new CheckboxField('OnLive', _t('SideReport.ParameterLiveCheckbox', 'Check live site'))
		);
	}

}
