YSBlogBundle
=======
Inside - YSUserBundle.

#### Setup
##### 1. Add to your composer:
```
"require": {
    ...
    "ys/blog-bundle" : "dev-master"
    },
"repositories" : [{
    ...
    "type" : "vcs",
    "url" : "https://github.com/yaroslavsolokha/YSBlogBundle.git"
}],
```
##### 2. Composer update
##### 3. Parameters.yml
```
parameters:
    database_host: xxx
    database_port: xxx
    database_name: xxx
    database_user: xxx
    database_password: xxx
    mailer_transport: smtp
    mailer_host: xxx
    mailer_user: xxx
    mailer_password: xxx
    secret: xxx
    facebook_client_id: xxx
    facebook_client_secret: xxx
    google_client_id: xxx
    google_client_secret: xxx
```
##### 4. Add translator to config.yml
```
framework:
    translator: { fallbacks: ['%locale%'] }
```
##### 5. Update schema
```
$ bin/console doctrine:schema:update
```
##### 6. Add to AppKernel.php
```
$bundles = [
    ...
    new FOS\UserBundle\FOSUserBundle(),
    new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),
    new HWI\Bundle\OAuthBundle\HWIOAuthBundle(),
    // These are the other bundles the SonataAdminBundle relies on
    new Knp\Bundle\MenuBundle\KnpMenuBundle(),
    new Sonata\CoreBundle\SonataCoreBundle(),
    new Sonata\BlockBundle\SonataBlockBundle(),
    // And finally, the storage and SonataAdminBundle
    new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
    new Sonata\AdminBundle\SonataAdminBundle(),
    new Ivory\OrderedFormBundle\IvoryOrderedFormBundle(),
    new YS\UserBundle\YSUserBundle()
];
```
##### 7. Add import to config.yml
```
imports:
    ...
    - { resource: "@YSUserBundle/Resources/config/security.yml" }
    - { resource: "@YSUserBundle/Resources/config/config.yml" }
```
##### 8. Add to routing.yml
```
...
ys_user_bundle:
    resource: "@YSUserBundle/Resources/config/routing.yml"
```
##### 9. bin/console assets:install
##### 10. bin/console fos:user:create admin --super-admin
##### 11. Go:
###### - XXX/app_dev.php/login
###### - XXX/app_dev.php/admin
###### - XXX/app_dev.php/register
###### - XXX/app_dev.php/resetting/request
###### - XXX/app_dev.php/profile
###### - XXX/app_dev.php/profile/edit
##### 12. Extend Bundle layout for index page, replace app/Resources/views/default/index.html.twig to:
```
{% extends 'YSUserBundle::base.html.twig' %}
{% block body %}
    <div class="main container">
        <h1>YSUserBundle</h1>
        <ul>
            <li><a href="{{ path('sonata_admin_dashboard') }}">Admin</a></li>
            <li><a href="{{ path('fos_user_security_login') }}">Sign In</a></li>
            <li><a href="{{ path('fos_user_registration_register') }}">Sign Up</a></li>
            <li><a href="{{ path('fos_user_resetting_request') }}">Forgot password?</a></li>
            <li><a href="{{ path('fos_user_profile_show') }}">Show profile</a></li>
            <li><a href="{{ path('fos_user_profile_edit') }}">Edit profile</a></li>
            <li><a href="{{ path('fos_user_security_logout') }}">Sign Out</a></li>
        </ul>
    </div>
{% endblock %}
```
#### TODO
##### 1. sonata-project/user-bundle": "dev-add_support_for_fos_user2 - move to bundle composer