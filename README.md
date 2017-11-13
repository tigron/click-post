# click-post
An API client for Ricoh Click &amp; Post service

# Howto

Create the session

	$session = \Esker\Session::get($username_setting->value, $password_setting->value);


Now allocate a transport with transportName = 'MODEsker'

	$transport = new \Esker\Transport();
	$transport->recipientType = "";
	$transport->transportIndex = 0;
	$transport->transportName = 'MODEsker';

Add variables for sending the document

	$transport->add_variable('Subject', 'Invoice ' . $invoice->number);
	$transport->add_variable('FromCompany', 'My Company');
	$transport->add_variable('ToBlockAddress', 'Your company' . "\n" . 'Street 1' . "\n" . '1000 Brussels . "\n" . 'Belgium');
	$transport->add_variable('Color', 'Y');
	$transport->add_variable('Cover', 'N');
	$transport->add_variable('BothSided', 'N');
	$transport->add_variable('MaxRetry', 3);
	$transport->add_variable('NeedValidation', 1);

Attach the document. Must be an instance of \Skeleton\File\Pdf
Check the package tigron/skeleton-file-pdf for more information

	$transport->add_attachment($pdf_object);

Send the document

	$submission = new \Esker\Submission($session);
	$result = $submission->submit_transport($transport);

$result will contain tracking information:

	stdClass Object
	(
	    [submissionID] => TLOTXXXXXXX
	    [transportID] => MOD.XXXXXXXXXXXXXXXxxX
	)

