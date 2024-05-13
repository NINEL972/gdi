<?php

namespace App\Controller;

use App\Entity\Demandes;
use App\Entity\SuiviInfo;
use App\Form\DemandesFormType;
use App\View\Form;
use App\Form\SuiviInfoFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Notification\Notification;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;







class DemandesController extends AbstractController
{
    /**
     * @Route("/demandes/lire/", name="app_demandes_lire")
     */
    public function lire(ManagerRegistry $doctrine, PaginatorInterface $paginator, Request $request): Response
    {
        $entityManager=$doctrine->getManager();
        $demandes=$entityManager->getRepository(Demandes::class)->findAll();
        $articles = $paginator->paginate(
            $demandes, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            5 // Nombre de résultats par page
        );
        //dump($demandes);die;
        return $this->render('/demandes/demande-lire.html.twig', [
            'form_title' => "Affichage de la liste de demandes",
            'demandes'=>$demandes,
            'articles' => $articles,

            //'controller_name' => 'DemandesController'
        ]);

        return $this->render('/demandes/pagination.html.twig', [
            'articles' => $articles,

            //'controller_name' => 'DemandesController'
        ]);
    }

    /**
     * @Route("/demandes/modifier/{id}", name="app_demandes_modifier")
     */
    public function modifier(ManagerRegistry $doctrine,Request $request,$id, NotifierInterface $notifier): Response
    {
        $entityManager = $doctrine->getManager();
        $demande = $entityManager->getRepository(Demandes::class)->find($id);

        if (!$demande) {
            throw $this->createNotFoundException(
                "Aucune demande trouvée pour l'id ".$id
            );
        }
        $form = $this->createForm(DemandesFormType::class, $demande)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //$this->$entityManager->flushsy();
            $entityManager->flush();
            $notifier->send(new Notification('Votre demande a bien été modifiée', ['browser']));
            
            return $this->redirectToRoute('app_demandes_lire', [
                'id' => $demande->getId(),
                'cuid'=>$demande->getCuid()
            ]);

        }

        return $this->render('demandes/demande-modifier.html.twig', [
            'form_title' => "Modifier une demande",
            'form_demandes' => $form,
            'demande'=>$demande,
            //'controller_name' => 'UsersController'
        ]);
        
        
    }

    /**
     * @Route("/demandes/supprimer/{id}", name="app_demandes_supprimer")
     */
    public function supprimer(ManagerRegistry $doctrine,$id, NotifierInterface $notifier): Response
    {
        $entityManager = $doctrine->getManager();
        $demande = $entityManager->getRepository(Demandes::class)->find($id);

        if (!$demande) {
            throw $this->createNotFoundException(
                "Aucune demande trouvée pour l'id ".$id
            );
        }
        else{
        $entityManager->remove($demande);
        $entityManager->flush();
        $notifier->send(new Notification('Votre demande a bien été supprimée', ['browser']));


        return $this->redirectToRoute('app_demandes_lire', [
            'form_title' => "Supprimer un utilisateur",
            'id' => $demande->getId()
            
            //'controller_name' => 'UsersController'
        
        ]);
        }
    }

    /**
     * @Route("/demandes/valider-supprimer/{id}", name="app_demandes_valider_supprimer")
     */
    public function valider_supprimer(ManagerRegistry $doctrine, NotifierInterface $notifier, $id): Response
    {
        $entityManager = $doctrine->getManager();
        $demande = $entityManager->getRepository(Demandes::class)->findAll();


        return $this->render('demandes/demande-valider-supprimer.html.twig', [
            'id'=>$id
        ]);

    }

    /**
     * @Route("/demandes/ajouter", name="app_demandes_ajouter")
     */
    public function ajouter(ManagerRegistry $doctrine,Request $request, NotifierInterface $notifier): Response
    {
        $demande = new Demandes();
        $form = $this->CreateForm(DemandesFormType::class, $demande);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($demande);
            $entityManager->flush();
            $notifier->send(new Notification('Votre demande a bien été ajoutée', ['browser']));
           
            return $this->redirectToRoute('app_demandes_lire', [
                'id'=> $demande->getId(),
                'cuid'=>$demande->getCuid(),
            ]);
            
        }
        return $this->render('demandes/demande-ajouter.html.twig', [
            'form_title'=>'Ajouter une demande',
            'form_demandes' => $form,

        ]);

    }

     /**
     * @Route("/demandes/ajouterinfo", name="app_demandes_ajouter_info")
     */
    public function ajouter_info(ManagerRegistry $doctrine,Request $request, NotifierInterface $notifier): Response
    {
        $demande = new SuiviInfo();
        $form = $this->CreateForm(SuiviInfoFormType::class, $demande);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($demande);
            $entityManager->flush();
            $notifier->send(new Notification('Votre demande a bien été ajoutée', ['browser']));
            
        }
        return $this->render('demandes/demande-suiviInfo.html.twig', [
            'form_demandes' => $form,

        ]);

    }

}  
    



