<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of UserController
 *
 * @author jonathan-gomez
 */
class UserController extends Controller {
    /**
     * @Route("/profil", name="profil")
     */
    public function getProfil() {//Fonction pour récuperer les informations du profil de l'utilisateur connecté
       
        $repository = $this->getDoctrine()->getManager()->getRepository('UserBundle:User');
        $monProfil = $repository->findBy(array('username' => $this->getUser()->getUsername()));

        return $this->render('admin/profil.html.twig', array('monProfil' => $monProfil));
    }
}