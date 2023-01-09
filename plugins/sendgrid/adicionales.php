<?php
//si tienes certificado SSL: HTTPS:// | deja tal cual las siguientes 4 lineas
//Si no tienes SSL: HTTP:// | comenta las siguientes 4 lineas
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
	$location = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	header('Location: '.$location);
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require 'vendor/autoload.php';
require 'constant.php';

$apy_key=SECRET_KEY;
$email = new \SendGrid\Mail\Mail(); 

//aquí va el correo y nombre del remitente // remitente creado en: app.sendgrid.com
$email->setFrom("insert@remitente.com", "insert name remitente");
//Asunto del correo
$email->setSubject("Esta es una prueba");

$email->addTo("test@example.com", "Example User");
$email->addTo("test+1@example.com", "Example User1");
$toEmails = [
    "test+2@example.com" => "Example User2",
    "test+3@example.com" => "Example User3"
];
$email->addTos($toEmails);

$email->addCc("test+4@example.com", "Example User4");
$ccEmails = [
    "test+5@example.com" => "Example User5",
    "test+6@example.com" => "Example User6"
];
$email->addCcs($ccEmails);

$email->addBcc("test+7@example.com", "Example User7");
$bccEmails = [
    "test+8@example.com" => "Example User8",
    "test+9@example.com" => "Example User9"
];
$email->addBccs($bccEmails);

$email->addHeader("X-Test1", "Test1");
$email->addHeader("X-Test2", "Test2");
$headers = [
    "X-Test3" => "Test3",
    "X-Test4" => "Test4",
];
$email->addHeaders($headers);

$email->addDynamicTemplateData("subject1", "Example Subject 1");
$email->addDynamicTemplateData("name1", "Example Name 1");
$email->addDynamicTemplateData("city1", "Denver");
$substitutions = [
    "subject2" => "Example Subject 2",
    "name2" => "Example Name 2",
    "city2" => "Orange"
];
$email->addDynamicTemplateDatas($substitutions);

$email->addCustomArg("marketing1", "false");
$email->addCustomArg("transactional1", "true");
$email->addCustomArg("category", "name");
$customArgs = [
    "marketing2" => "true",
    "transactional2" => "false",
    "category" => "name"
];
$email->addCustomArgs($customArgs);

$email->setSendAt(1461775051);

// You can add a personalization index or personalization parameter to the above
// methods to add and update multiple personalizations. You can learn more about 
// personalizations [here](https://sendgrid.com/docs/Classroom/Send/v3_Mail_Send/personalizations.html).

// The values below this comment are global to an entire message

$email->setFrom("test@example.com", "Twilio SendGrid");

$email->setGlobalSubject("Sending with Twilio SendGrid is Fun and Global 2");

$email->addContent(
    "text/plain",
    "and easy to do anywhere, even with PHP"
);
$email->addContent(
    "text/html",
    "<strong>and easy to do anywhere, even with PHP</strong>"
);
$contents = [
    "text/calendar" => "Party Time!!",
    "text/calendar2" => "Party Time 2!!"
];
$email->addContents($contents);

$email->addAttachment(
    "base64 encoded content1",
    "image/png",
    "banner.png",
    "inline",
    "Banner"
);
$attachments = [
    [   
        "base64 encoded content2",
        "banner2.jpeg",
        "image/jpeg",
        "attachment",
        "Banner 3"
    ],
    [
        "base64 encoded content3",
        "banner3.gif",
        "image/gif",
        "inline",
        "Banner 3"
    ]
];
$email->addAttachments($attachments);

//Crea tu template en: https://mc.sendgrid.com/dynamic-templates/new
$email->setTemplateId("d-13b8f94fbcae4ec6b75270d6cb59f932");

$email->addGlobalHeader("X-Day", "Monday");
$globalHeaders = [
    "X-Month" => "January",
    "X-Year" => "2017"
];
$email->addGlobalHeaders($globalHeaders);

$email->addSection("%section1%", "Substitution for Section 1 Tag");
$sections = [
    "%section3%" => "Substitution for Section 3 Tag",
    "%section4%" => "Substitution for Section 4 Tag"
];
$email->addSections($sections);

$email->addCategory("Category 1");
$categories = [
    "Category 2",
    "Category 3"
];
$email->addCategories($categories);

$email->setBatchId(
    "MWQxZmIyODYtNjE1Ni0xMWU1LWI3ZTUtMDgwMDI3OGJkMmY2LWEzMmViMjYxMw"
);

$email->setReplyTo("dx+replyto2@example.com", "DX Team Reply To 2");

$email->setAsm(1, [1, 2, 3, 4]);

$email->setIpPoolName("23");

// Mail Settings
$email->setBccSettings(true, "bcc@example.com");
$email->enableBypassListManagement();
//$email->disableBypassListManagement();
$email->setFooter(true, "Footer", "<strong>Footer</strong>");
$email->enableSandBoxMode();
//$email->disableSandBoxMode();
$email->setSpamCheck(true, 1, "http://mydomain.com");

// Tracking Settings
$email->setClickTracking(true, true);
$email->setOpenTracking(true, "--sub--");
$email->setSubscriptionTracking(
    true,
    "subscribe",
    "<bold>subscribe</bold>",
    "%%sub%%"
);
$email->setGanalytics(
    true,
    "utm_source",
    "utm_medium",
    "utm_term",
    "utm_content",
    "utm_campaign"
);

$sendgrid = new \SendGrid($apy_key);
try {
    $response = $sendgrid->send($email);
    //print $response->statusCode() . "\n";
    //print_r($response->headers());
    //print $response->body() . "\n";
    echo json_encode($response->statusCode());
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}

?>
