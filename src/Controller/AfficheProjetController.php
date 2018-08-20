<?php

namespace App\Controller;

use App\Entity\Projets;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
        $projets = $repo->find($id);

        return $this->render('affiche_projet/index.html.twig', [
          
            "projets" => $projets
            
        ]);
    }

    /**
     * @Route("/ajout-projet", name="ajout_projet")
     */
    public function ajoutProjet(Request $request , ObjectManager $manager)
    {

        $projet = new Projets;

        $form = $this->createFormBuilder($projet)
                     ->add('PRO_nom')
                     ->add('PRO_desc', TextareaType::class)
                     ->add('PRO_image', FileType::class)
                     ->add('PRO_techno')
                     ->add('PRO_url')
                     ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            /* @var Symfony\Component\HttpFoundation\File\UploadedFile $photo */

            $photo = $form->get('PRO_image')->getData();

            $photoName = $this->generateUniqueFileName().'.'.$photo->guessExtension();

            // déplace le fichier là où doit êtrs stocké
            $photo->move(
                $this->getParameter('photos_directory'),
                $photoName
            );

           // updates the 'photo' property to store the photo file name
           // instead of its contents

           $projet->setProImage($photoName);

            $manager->persist($projet);
            $manager->flush();
        }             
        
        return $this->render('ajout_projet/ajout.html.twig', [
            'ajoutForm' => $form->createView(),
        ]);
    }

   /**
    * @return string
    */
   private function generateUniqueFileName()
   {
       // md5() reduces the similarity of the file names generated by
       // uniqid(), which is based on timestamps
       return md5(uniqid());
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

}
