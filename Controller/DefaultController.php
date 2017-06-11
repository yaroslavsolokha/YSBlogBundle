<?php

namespace YS\BlogBundle\Controller;

use Doctrine\DBAL\Types\TextType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use YS\BlogBundle\Entity\BlogPost;
use YS\BlogBundle\Form\BlogPostType;

class DefaultController extends Controller
{
  public function indexAction()
  {
    $blogPosts = $this->getDoctrine()->getRepository('YSBlogBundle:BlogPost')->findAllOrderedByTitle();
    $categories = $this->getDoctrine()->getRepository('YSBlogBundle:Category')->findAll();
    return $this->render('YSBlogBundle:Default:index.html.twig', array (
      'blogPosts' => $blogPosts,
      'categories' => $categories
    ));
  }

  public function showAction(Request $request)
  {
    $blogPost = $this->getDoctrine()->getRepository('YSBlogBundle:BlogPost')->find($request->get('id'));
    return $this->render('YSBlogBundle:Default:show.html.twig', array (
      'blogPost' => $blogPost
    ));
  }

  public function deleteAction(Request $request)
  {
    $blogPost = $this->getDoctrine()->getRepository('YSBlogBundle:BlogPost')->find($request->get('id'));
    if($blogPost){
      $em = $this->getDoctrine()->getManager();
      $em->remove($blogPost);
      $em->flush();
    }
    return $this->redirectToRoute('ys_blog_list');
  }

  public function formAction(Request $request)
  {
    if($request->get('id')) {
      $blogPost = $this->getDoctrine()->getRepository('YSBlogBundle:BlogPost')->find($request->get('id'));
    } else {
      $blogPost = new BlogPost();
    }

    $form = $this->createForm(BlogPostType::class, $blogPost);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->flush();
      return $this->redirectToRoute('ys_blog_list');
    }

    return $this->render('YSBlogBundle:Default:form.html.twig', array (
      'form' => $form->createView()
    ));
  }
}
