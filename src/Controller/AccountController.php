<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
// vous pouvez utiliser cette méthode pour récupérer les articles de l'utilisateur connecté et les passer au modèle Twig
// dans votre repository est configurée pour rechercher les articles associés à un utilisateur. Ensuite, dans votre modèle Twig, 
// vous pouvez parcourir les articles de l'utilisateur et les afficher comme vous le souhaitez. Votre modèle Twig actuel semble correct pour afficher les articles.

class AccountController extends AbstractController
{
    #[Route('/account', name: 'app_account')]
    public function index(ArticleRepository $articleRepository): Response
        // injection de dependance

    {
        // Récupérez l'utilisateur connecté
        $user = $this->getUser();

        // Vérifiez si l'utilisateur est connecté
        if ($user) {
            // Récupérez les articles de l'utilisateur connecté
            $articles = $articleRepository->findArticlesByUser($user->getId());
        } else {
            $articles = [];
        }

        return $this->render('account/account.html.twig', [
            'controller_name' => 'AccountController',
            'articles' => $articles,
        ]);
    }
}
