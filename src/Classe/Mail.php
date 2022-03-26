<?php 


namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;

class Mail{
    private $api_key='6300dd933ed18ab4bfa1b8ebb996901a';
    private $api_key_secret='c0eecd2d709321bd2150ef4267920c46';

    public function send($to_email,$to_name,$subject, $content)
    {
        $mj = new Client($this->api_key,$this->api_key_secret,true,['version' => 'v3.1']);
$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "tassadit.mgh@gmail.com",
                'Name' => "MGH BOOKS"
            ],
            'To' => [
                [
                    'Email' => $to_email,
                    'Name' => $to_name,
                ]
            ],
            'TemplateID' => 3800900,
            'TemplateLanguage' => true,
            'Subject' => $subject,
            'Variables' => [
                'content' => $content
            ]
        ]
    ]
];
$response = $mj->post(Resources::$Email, ['body' => $body]);
$response->success();
    }
}



