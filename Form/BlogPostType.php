<?php

// src/YS/BlogBundle/Form/BlogPostType.php

namespace YS\BlogBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BlogPostType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('title')
      ->add('body', CKEditorType::class, array(
        'config_name' => 'my_config'
      ))
    ;
  }
}