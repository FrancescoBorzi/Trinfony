<?php

namespace Trinfony\AuthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $authManager = $this->get('doctrine')->getManager('auth');
        $charactersManager = $this->get('doctrine')->getManager('characters');

        $connection = $authManager->getConnection();
        $statement = $connection->prepare("SELECT * FROM account");
        //$statement->bindValue('id', 123);
        $statement->execute();
        $results = $statement->fetchAll();

        dump($results);

        $connection = $charactersManager->getConnection();
        $statement = $connection->prepare("SELECT * FROM characters");
        //$statement->bindValue('id', 123);
        $statement->execute();
        $results = $statement->fetchAll();

        dump($results);

        return $this->render('TrinfonyAuthBundle:Default:index.html.twig');
    }
}
