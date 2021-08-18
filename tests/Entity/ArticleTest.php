<?php

//namespace Tests\AppBundle\Entity;
namespace App\Tests\Entity;

use App\Entity\Article;
use App\Entity\Category;

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    public function testArticle()
    {
        $article = new Article();
        $name = "fourchette lestée";
        $prix = "5.90";
        $category = new Category();

        $article->setName($name);
        $category->setName("Autonomie-Apprentissage");
        $this->assertEquals("fourchette lestée", $article->getName());

        $article->setPrix($prix);
        $this->assertEquals("5.90", $article->getprix());

        $article->setCategory($category);
        $this->assertEquals("Autonomie-Apprentissage", $article->getCategory());
    }

    public function testPrixHT()
    {
        $article = new Article();
        $prix = "120";

        $this->assertEquals("100", $article->$prix->prixHT());
    }
}
