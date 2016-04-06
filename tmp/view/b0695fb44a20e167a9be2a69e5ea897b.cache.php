<!doctype html>
<html>
<?php $this->view("v", new \Leno\View("Element.head", $__head__)) ?>
<?php $this->e("v")->display(); ?>
    <body>
<?php $this->getFragment('body')->display(); ?>
    </body>
</html>
