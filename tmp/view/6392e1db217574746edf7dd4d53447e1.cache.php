<head>
    <title><?php echo $title; ?></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="<?php echo $keywords; ?>" />
    <meta name='description' content="<?php echo $description; ?>" />
    <meta name='author' content="<?php echo $author; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<?php if(gettype($js) !== "array") { $js = []; } ?>
<?php foreach($js as $j) { ?>
        <script src="<?php echo $j; ?>" type="text/javascript"></script>
<?php } ?>
<?php if(gettype($css) !== "array") { $css = []; } ?>
<?php foreach($css as $c) { ?>
        <link href="<?php echo $c; ?>" rel="stylesheet" type="text/css" />
<?php } ?>
</head>
