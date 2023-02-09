<?php 

namespace App\Service; 

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

class Mail { 

    protected mailerInterface $mailer; 

    public function __construct(MailerInterface $mailer) { 
        $this->mailer = $mailer;
    } 

    public function envoie($email , $subject , $text ){ 

        $envoie = (new Email())
       
        ->from($email)
        ->to('you@example.com')
      
        ->text($text)
        ->html($text);

        return $this->mailer ->send($envoie) ;

    }

}
