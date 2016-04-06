<?php $this->extend('Layout.default'); ?>
<?php $this->startFragment('body'); ?>
<?php $this->view("v", new \Leno\View("default.Element.header")) ?>
<?php $this->e("v")->display(); ?>
        <section class="content">
<?php $this->getFragment('content')->display(); ?>
        </section>
<?php $this->view("v", new \Leno\View("default.Element.footer")) ?>
<?php $this->e("v")->display(); ?>
<?php $this->endFragment(); ?>
<?php $this->parent->display(); ?>
