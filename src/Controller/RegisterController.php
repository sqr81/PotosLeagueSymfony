<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;


class RegisterController extends AbstractController
{
    private $entitymanager;

    public function __construct(EntityManagerInterface $entitymanager){
        $this->entitymanager = $entitymanager;
    }

    /**
     * @Route("/inscription", name="register")
     */
    public function index(Request $request, UserPasswordHasherInterface $encoder): Response
    {
        $notification = null;
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        //on écoute la requête du form
        $form->handleRequest($request);
        //form soumis et valide?
        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
        //le email existe t'il deja?
        $search_email = $this->entityManager->getRepository(User::class)->findOneByEmail($user->getEmail());
        if (!$search_email){
            //hachage mdp
            $password = $encoder->hashPassword($user,$user->getPassword());
            $user->setPassword($password);
            //inscription en BDD
            $this->entitymanager->persist($user);
            $this->entitymanager->flush();

            $mail = new Mail();
            $content = "Bonjour ".$user->getFirstname()."<br/>Bienvenue sur la ligue 100% potes et 100% fun !<br><br/>. ";

            $mail->send($user->getEmail(), $user->getFirstname(), "Bienvenue sur la Poto's League", $content);

            $notification = "Ton inscription s'est correctement déroulée. Tu peux te connecter à ton compte.";
        }
        else{
            $notification = "L'email que tu as renseigné existe déjà. ";
        }
    }
        return $this->render('register/index.html.twig',[
            'form' => $form->createView(),
            'notification' => $notification
        ]);
    }
}
