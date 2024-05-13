<?php

namespace App\Controller;
//namespace App\Entity;
use App\Entity\Users;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\UsersFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints as Assert;

class UsersController extends AbstractController
{
    /**
     * @Route("/users", name="app_users")
     */
    public function index(): Response
    {
        $users = new Users();
        $form = $this->CreateForm(UsersFormType::class, $users);
       // if ($form->isSubmitted() && $form->isValid()) {
        //$users = $form->getData();
        
        return $this->render('users/users-form.html.twig', [
            'form_title' => "Gestion des utilisateurs",
            'form_users' => $form
            //'controller_name' => 'UsersController'
        ]);
    }

    /**
     * @Route("/users/lire", name="app_users_lire")
     */
    public function lire(ManagerRegistry $doctrine,Request $request): Response
    {
        $entityManager = $doctrine->getManager();
        $users = $entityManager->getRepository(Users::class)->findAll();
       
        //$form = $this->CreateForm(UsersFormType::class, $users);
       // dump($users);die;
        return $this->render('users/users-lire.html.twig', [
            'form_title' => "Afficher un utilisateur",
            'utilisateurs'=>$users
            //'form_users' => $form
            //'controller_name' => 'UsersController'
        ]);
    }

    /**
     * @Route("/users/ajouter", name="app_users_aj")
     */
    public function ajouter(ManagerRegistry $doctrine,Request $request): Response
    {
        $users = new Users();
        $form = $this->CreateForm(UsersFormType::class, $users);

        // a la place du unset on fait un clone
        //$empty_form = clone $form;

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
           // $users = $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($users);
            $entityManager->flush();

            //unset($users);
           // unset($form);
           
            //return $this->redirectToRoute('add_user_success');
            return $this->render('users/users-ajouter-succes.html.twig', [
                'form_title' => "utilisateur ".$users->getId()." créé avec success"
            
            ]);
        }

        return $this->render('users/users-ajouter.html.twig', [
            'form_title' => "Ajouter un utilisateur",
            'form_users' => $form,
            //'controller_name' => 'UsersController'
        ]);

       // $form = $empty_form;
    }

    /**
     * @Route("/users/modifier/{id}", name="app_users_mod")
     */
    public function modifier(ManagerRegistry $doctrine,Request $request,$id): Response
    {
       $entityManager = $doctrine->getManager();
       $user = $entityManager->getRepository(Users::class)->find($id);
        //$newuser = new Users;
        $form = $this->createForm(UsersFormType::class, $user)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //$this->$entityManager->flush();
            $entityManager->flush();
        }

        return $this->render('users/users-modifier.html.twig', [
            'form_title' => "Modifier un utilisateur",
            'form_users' => $form
            //'controller_name' => 'UsersController'
        ]);
        
    }

    /**
     * @Route("/users/supprimer/{id}", name="app_users_sup")
     */
    public function supprimer(ManagerRegistry $doctrine,$id): Response
    {
        $entityManager = $doctrine->getManager();
        $user = $entityManager->getRepository(Users::class)->find($id);
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->render('users/users-supprimer.html.twig', [
            'form_title' => "Supprimer un utilisateur"
            
            //'controller_name' => 'UsersController'
        ]);
    }

    
}
