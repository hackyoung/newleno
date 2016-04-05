<?php $this->extend('layout'); ?>
<?php $this->startFragment('head'); ?>
        <div>
            <h1><?php echo $hello; ?></h1>
            <ul>
<?php if(gettype($llist) !== "array") { $llist = []; } ?>
<?php foreach($llist as $val) { ?>
                <li><?php echo $val; ?></li>
<?php } ?>
            </ul>
        </div>
<?php $this->endFragment(); ?>
<?php $this->parent->display(); ?>
