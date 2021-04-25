<?php

namespace App\Controller;

use App\Entity\Club;
use App\Entity\Comment;
use App\Entity\SuggestBook;
use App\Form\ClubType;
use App\Form\CommentFormType;
use App\Form\SuggestFormType;
use App\Repository\ClubRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Twig\Environment;

/**
 * @Route("/club")
 * @IsGranted("ROLE_USER")
 */
class ClubController extends AbstractController
{
    /**
     * @Route("/", name="club_index", methods={"GET"})
     */
    public function index(ClubRepository $clubRepository): Response
    {
        // usually you'll want to make sure the user is authenticated first
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->render('club/index.html.twig', [
            'clubs' => $clubRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="club_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        // usually you'll want to make sure the user is authenticated first
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $club = new Club();
        $form = $this->createForm(ClubType::class, $club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($club);
            $entityManager->flush();

            return $this->redirectToRoute('club_index');
        }

        return $this->render('club/new.html.twig', [
            'club' => $club,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="club_show", methods={"GET"})
     */
    public function show(Club $club): Response
    {
        // usually you'll want to make sure the user is authenticated first
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');



        return $this->render('club/show.html.twig', [
            'club' => $club,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="club_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Club $club): Response
    {
        // usually you'll want to make sure the user is authenticated first
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $form = $this->createForm(ClubType::class, $club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('club_index');
        }

        return $this->render('club/edit.html.twig', [
            'club' => $club,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="club_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Club $club): Response
    {
        // usually you'll want to make sure the user is authenticated first
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if ($this->isCsrfTokenValid('delete'.$club->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($club);
            $entityManager->flush();
        }

        return $this->redirectToRoute('club_index');
    }

    /**
     * @Route("/{id}", name="club_join", methods={"JOIN"})
     */
    public function join(Request $request, Club $club): Response
    {
        // usually you'll want to make sure the user is authenticated first
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->redirectToRoute('club_index');
    }

    /**
     * @Route("/{id}/suggest", name="club_suggest", methods={"GET"})
     */
    public function submit(Environment $twig): Response
    {
        // usually you'll want to make sure the user is authenticated first
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $suggest_book = new SuggestBook();

        $form = $this->createForm(SuggestFormType::class, $suggest_book);

        return $this->render('club/show.html.twig', [
            'suggest_form' => $form->createView()
        ]);
    }

}
