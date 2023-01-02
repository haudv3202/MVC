<?php require_once(APPROOT . '/views/templates/head.php'); ?>

<h1><?php echo $data['title'];?></h1>

<ul>
    <?php foreach($data['users'] as $value){ ?>
            <li><?php echo $value->name; ?></li>
    <?php }?>
</ul>

<?php require_once(APPROOT . '/views/templates/footer.php'); ?>
