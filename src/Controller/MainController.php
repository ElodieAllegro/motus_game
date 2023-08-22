<?php
namespace App\Controller;

use App\Entity\Users;
use App\Entity\WallOfFAme;
use App\Repository\UsersRepository;
use App\Repository\GameWordRepository;
use App\Repository\WallOfFAmeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(Request $request,
     EntityManagerInterface $entityManager, 
     UsersRepository $usersRepository, 
     GameWordRepository $gameWordRepository, 
     WallOfFAmeRepository $wallOfFAmeRepository): Response
    {
      //recupère les mots de la base de donnée
      $words = $gameWordRepository->findAll();
      $wordList = [];
      foreach ($words as $word) {
          $wordList[] = $word->getWord();
      }
        //choisis un mot au hasard
      $secretWord = $wordList[array_rand($wordList)];
      
        // Récupérer l'utilisateur connecté
        $user = $this->getUser();
        $hasWon = $request->query->get('win') === 'true';
        if ($user && $hasWon) {
            // j'ajoute 100 points en cas de victoire 
            $newScore = $user->getScore() + 100;
            $user->setScore($newScore);
        
            // j'envoie en base de donnée
            $entityManager->persist($user);
            $entityManager->flush();
        
            // Redirige l'utilisateur
            return $this->redirectToRoute('main'); 
        }

        $topPlayer = $usersRepository->findBy([], ['score' => 'DESC'], 3);

    
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'user' => $user,
            'secretWord' => $secretWord,
            'topPlayer' => $topPlayer
        ]);
        
    }
    
}



