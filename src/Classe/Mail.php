<?php

namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;

class Mail
{
    private $api_key = "d296d7a8b94efe5ab525fdb191fa0f0f";
    private $api_key_secret = "17f38bbfc75e3eddcc58158bfac0d4f6";

    public function send($to_email,$to_name, $subject, $content){
        $mj = new Client($this->api_key, $this->api_key_secret, true,['version' => 'v3.1']);

$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "sqr81@free.fr",
                'Name' => "Poto's League"
             ],
             
             'To' => [
                [
                    'Email' => $to_email,
                    'Name' => $to_name
                ]
             ],
             
            'TemplateID' => 3819735,
            'TemplateLanguage' => true,
            'Subject' => "$subject",
            'Variables' => [
                'content' => $content,
             ]
             
        ]
    ]
];
$response = $mj->post(Resources::$Email, ['body' => $body]);
$response->success();
    }
}