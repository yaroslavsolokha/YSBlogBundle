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
"repositories" : [
...
{
    "type" : "vcs",
    "url" : "https://github.com/yaroslavsolokha/YSBlogBundle.git"
}],
```
##### 2. Composer update
```
$ compser update 
```
##### 3. Setup YSUserBundle - https://github.com/yaroslavsolokha/YSUserBundle.git
##### 4. Add to AppKernel.php
```
 $bundles = [
     ...
     new YS\BlogBundle\YSBlogBundle()
 ];
```
##### 5. Update schema
```
$ bin/console doctrine:schema:update
```