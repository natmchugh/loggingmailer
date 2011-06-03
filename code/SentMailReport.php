<?php

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
				'formatting' => '<a href=\"custom-admin/$ID\"> {$Date.Nice} </a>'
			,
			),
			"To" => array(
				"title" => "To", // todo: use NestedTitle(2)
				"link" => true,
			),
			"From" => array('title' => 'From',),
			"Subject" => array('title' => 'Subject',
				'formatting' => '<a href="#">$Subject</a>'),
			"Body" => array('title' => 'Body',),
		);
	}

	function getParameterFields() {
		return new FieldSet(
			new CheckboxField('OnLive', _t('SideReport.ParameterLiveCheckbox', 'Check live site'))
		);
	}

}
