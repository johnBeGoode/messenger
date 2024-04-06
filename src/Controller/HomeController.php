<?php

namespace App\Controller;

use App\Message\SendNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(MessageBusInterface $bus): Response
    {
        // Déclenche le SendNotificationHandler
        $bus->dispatch(new SendNotification('C\est magique !!!'));

        return $this->render('home/index.html.twig');
    }
}
