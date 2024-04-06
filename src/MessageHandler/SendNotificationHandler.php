<?php

namespace App\MessageHandler;

use App\Message\SendNotification;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Mime\Email;

#[AsMessageHandler]
final class SendNotificationHandler
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    public function __invoke(SendNotification $sendNotification)
    {
        // do something with your message
        $email = (new Email())
                ->from('messenger@symfony.com')
                ->to('you@example.com')
                ->subject('It works or not ??')
                ->text('Sending email is fun!')
                ->html('<p>See Twig integration for better HTML integration!</p>');

        $this->mailer->send($email);
    }
}
