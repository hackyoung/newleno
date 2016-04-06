<?php $this->extend('default.Layout.vertical'); ?>
<?php $this->startFragment('content'); ?>
        <div class="tc-container">
            <div class="tc-one">
<?php $this->getFragment('one')->display(); ?>
            </div>
            <div class="tc-two">
<?php $this->getFragment('two')->display(); ?>
            </div>
        </div>
<?php $this->endFragment(); ?>
<?php $this->parent->display(); ?>
