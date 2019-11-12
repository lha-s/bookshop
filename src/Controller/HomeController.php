<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function index(Request $request, BookRepository $bookRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'books' => $bookRepository->findAll(),
        ]);
    }

    /**
     * @Route("/book-search", name="book_show", methods={"GET"})
     */
    public function show(Request $request, BookRepository $bookRepository): Response
    {

        //Protect this
        $category = $request->query->get('category');
        $price = $request->query->get('price');

        $book = $bookRepository->findBy(array('category' => $category));

        return $this->render('home/index.html.twig', [
            'books' => $book,
        ]);
    }
}
