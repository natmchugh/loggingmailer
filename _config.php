<?php

Email::set_mailer( new LoggingMailer() );
SS_Report::register('ReportAdmin', 'SentMailReport', -10);