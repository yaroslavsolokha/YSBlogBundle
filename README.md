YSBlogBundle
=======
Documentation for internal settings for bundle.
Inside - YSUserBundle, IvoryCKEditorBundle.

#### Setup
##### 1. Add to your composer:
```
"require": {
    ...
    "ys/blog-bundle" : "dev-master"
    },
"repositories" : [
...
{
    "type" : "vcs",
    "url" : "https://github.com/yaroslavsolokha/YSBlogBundle.git"
}],
```
##### 2. Composer update
```
$ cd server
$ docker exec -it php /bin/sh
$ cc ysblogbundle
$ composer update 
```
##### 3. Setup YSUserBundle - https://github.com/yaroslavsolokha/YSUserBundle
##### 4. Add to AppKernel.php
```
 $bundles = [
     ...
     new YS\BlogBundle\YSBlogBundle(),
     new Ivory\CKEditorBundle\IvoryCKEditorBundle()
 ];
```
##### 5. Update schema
```
$ bin/console doctrine:schema:update
```
##### 6. Add import to config.yml
```
imports:
    ...
    - { resource: "@YSBlogBundle/Resources/config/config.yml" }
```
##### 7. Add to security.yml
``` 
access_control:
...
    - { path: ^/blog/new, role: ROLE_USER }
```