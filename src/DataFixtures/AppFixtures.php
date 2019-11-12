<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i <= 2; $i++) {
            $book = new Book();
            $book
                ->setTitle('Bonjour' . $i)
                ->setPrice(100 + $i);
            $manager->persist($book);

            $author = new Author();
            $author
                ->setSurname('Jean' . $i)
                ->setName('Paul' . $i)
                ->setBook($book);
            $manager->persist($author);

            $categories = new Category();
            $categories
                ->setType('Type' . $i)
                ->setBook($book);
            $manager->persist($categories);
        }

        $manager->flush();
    }
}
