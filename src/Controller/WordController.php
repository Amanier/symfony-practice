<?php

namespace App\Controller;

use App\Entity\Word;
use App\Form\WordType;
use App\Repository\WordRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WordController extends AbstractController
{
    /**
    * @Route("/admin/words", name="admin-words")
    */
    public function list(WordRepository $wordRepository)
    {
        $words = $wordRepository->findAll();
        return $this->render('word/list.html.twig', ["words" => $words]);
    }

    /**
    * @Route("/admin/word-create", name="admin-word-create")
    */

    public function create(request $request, ObjectManager $manager) {

        $word = new Word();
        $form =  $this->createForm(WordType::class, $word);
            
            // ->add('french', TextType::class)
            // ->add('english', TextType::class)
            // ->add('save', SubmitType::class)
            // ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {

                $manager->persist($word);
                $manager->flush();
                return $this->redirectToRoute('admin-words');
            }

        return $this->render('word/create.html.twig', [
            'form' => $form->createView()
        ]);
     }


    
     /**
    * @Route("/admin/word-read-{id}", name="admin-word-read")
    */

    public function read($id, WordRepository $wordRepository) {

        $word = $wordRepository->find($id);

        return $this->render('word/read.html.twig', [
            'word' => $word
        ]);
    }

    /**
    * @Route("/admin/word-update-{id}", name="admin-word-update")
    */

    public function update($id, request $request, ObjectManager $manager, WordRepository $wordRepository) {


        $word = $wordRepository->find($id);

        $form =  $this->createForm(WordType::class, $word);
            
            // ->add('french', TextType::class)
            // ->add('english', TextType::class)
            // ->add('save', SubmitType::class)
            // ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {

                $manager->persist($word);
                $manager->flush();
                return $this->redirectToRoute('admin-words');
            }

        return $this->render('word/create.html.twig', [
            'form' => $form->createView()
        ]);
     }

   

    /**
    * @Route("/admin/word-del-{id}", name="admin-word-del")
    */
    public function del($id, WordRepository $wordRepository, ObjectManager $manager) {

        $word = $wordRepository->find($id);

        $manager->remove($word);
        $manager->flush();

        return $this->redirectToRoute('admin-words');
     }
}