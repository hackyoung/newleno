<?php $this->extend('default.Layout.two_col'); ?>
<?php $this->startFragment('one'); ?>
        <div class="leno-piece-common">
<?php $this->view("v", new \Leno\View("default.Element.item.requirement")) ?>
<?php $this->e("v")->display(); ?>
        </div>
        <div class="leno-piece-common">
            hello world
        </div>
        <div class="leno-piece-common">
            hello world
        </div>
        <div class="leno-piece-common">
            hello world
        </div>
        <div class="leno-piece-common">
            hello world
        </div>
        <div class="leno-piece-common">
            hello world
        </div>
        <div class="leno-piece-common">
            hello world
        </div>
<?php $this->endFragment(); ?>
<?php $this->startFragment('two'); ?>
        <div class="leno-piece-common">
            hello world
        </div>
<?php $this->endFragment(); ?>
<?php $this->parent->display(); ?>
