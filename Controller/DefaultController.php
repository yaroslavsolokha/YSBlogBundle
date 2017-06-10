<?php

namespace YS\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
  public function indexAction()
  {
    $blogPosts = $this->getDoctrine()->getRepository('YSBlogBundle:BlogPost')->findAllOrderedByTitle();
    return $this->render('YSBlogBundle:Default:index.html.twig', array (
      'blogPosts' => $blogPosts
    ));
  }

  public function showAction(Request $request)
  {
    $blogPost = $this->getDoctrine()->getRepository('YSBlogBundle:BlogPost')->find($request->get('id'));
    return $this->render('YSBlogBundle:Default:show.html.twig', array (
      'blogPost' => $blogPost
    ));
  }
}
