<?php

namespace App\Controller;

use App\Entity\Projets;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AfficheProjetController extends Controller
{
    /**
     * @Route("/projet/{id}", name="affiche_projet")
     */
    public function vueProjet($id)
    {
        $repo = $this->getDoctrine()
        ->getRepository(Projets::class);
        
        $idSuivant = $id + 1;
        $idPrecedent = $id - 1;

        $projets = $repo->findById($id);
        $suivant = $repo->findById($idSuivant);
        $precedent = $repo->findById($idPrecedent);

        return $this->render('affiche_projet/projet.html.twig', [
          
            "projets" => $projets,
            "suivant" => $suivant,
            "precedent" => $precedent,
            
        ]);
    }

    /**
     * @Route("/ajout-projet", name="ajout_projet")
     */
    public function ajoutProjet(Request $request , ObjectManager $manager)
    {

        $projet = new Projets;

        $form = $this->createFormBuilder($projet)
                     ->add('PRO_nom', TextType::class, array(
                         'label' => 'Nom du projet : ',
                         "label_attr" => [
                            "class" => "color-2 d-block pb-5 raleway light fs-20"
                        ],
                         'attr' => array(
                             'class' => 'mb-20 button-form'
                         ),
                     ))
                     ->add('PRO_desc', TextareaType::class, array(
                        'label' => 'Description : ',
                        "label_attr" => [
                            "class" => "color-2 d-block pb-5 raleway light fs-20"
                        ],
                        'attr' => array(
                            'class' => 'mb-20 button-form'
                        ),
                    ))
                     ->add('PRO_image', FileType::class, array(
                        'label' => 'Image du projet : ',
                        "label_attr" => [
                            "class" => "color-2 d-block pb-5 raleway light fs-20"
                        ],
                        'attr' => array(
                            'class' => 'mb-20'
                        ),
                    ))
                     ->add('PRO_boxprojet', FileType::class, array(
                        'label' => 'Image de la box projet : ',
                        "label_attr" => [
                            "class" => "color-2 d-block pb-5 raleway light fs-20"
                        ],
                        'attr' => array(
                            'class' => 'mb-20'
                        ), 
                    ))
                     ->add('PRO_techno', TextType::class, array(
                        'label' => 'Technologies : ',
                        "label_attr" => [
                            "class" => "color-2 d-block pb-5 raleway light fs-20"
                        ],
                        'attr' => array(
                            'class' => 'mb-20 button-form'
                        ),   
                    ))
                     ->add('PRO_url', TextType::class, array(
                        'label' => 'Url du projet : ',
                        "label_attr" => [
                            "class" => "color-2 d-block pb-5 raleway light fs-20"
                        ],
                        'attr' => array(
                            'class' => 'mb-20 button-form'
                        ),
                    ))
                     ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            // récupere les données du fichiers et son nom.

            $photo = $form->get('PRO_image')->getData();
            $boxprojet = $form->get('PRO_boxprojet')->getData();

            $photoName = $photo->getClientOriginalName().'.'.$photo->guessExtension();
            $boxprojetName = $boxprojet->getClientOriginalName().'.'.$boxprojet->guessExtension();

            // déplace le fichier là où doit être stocké.
            $photo->move(
                $this->getParameter('photos_directory'),
                $photoName
            );

            $boxprojet->move(
                $this->getParameter('boxprojet_directory'),
                $boxprojetName
            );

           // Pousse les données en BDD.

           $projet->setProImage($photoName);
           $projet->setProBoxProjet($boxprojetName);   

            $manager->persist($projet);
            $manager->flush();
        }             
        
        return $this->render('ajout_projet/ajout.html.twig', [
            'ajoutForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/connexion", name="security_login")
     */
    public function login(){
        return $this->render('security/connexion.html.twig');
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout(){

    }

    /**
     * @Route("/mymeteo", name="mymeteo_projet")
     */
    public function mymeteo(){
        return $this->render('projets/mymeteo/index.html');
    }

    /**
     * @Route("/databeerbase", name="databeerbase_projet")
     */
    public function databeerbase(){
        return $this->render('projets/databeerbase/index.php');
    }
    
}
