<!-- Template Name: Mini News -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title()?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <?php wp_head();?>
</head>

<body>
<?php get_header();?>

<div class="container">
<?php breadcrumbs(); ?>

    <div class="row">
        <div class="col-md-12">

            <!-- Title -->
            <h1 class="mt-4 mb-3"><?php the_title()?></h1>
            <!-- Post Content -->
            <?php the_content();
$defaults = array(
    'before' => '<div class="row justify-content-center align-items-center">' . __('Pages:'),
    'after' => '</div>',
);
wp_link_pages($defaults);
edit_post_link();
?>
            <hr>
        </div>
    </div>
</div>

<!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- Post Content Column -->
        <?php $query = new WP_Query(['category_name' => 'news']);?>
        <?php $query->query_posts('showposts=8');?>
        <?php while ($query->have_posts()) {$query->the_post();?>
        <?php if (has_post_thumbnail()) {?>
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item center">
            <div class="card h-100  ">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('thumbnail', array(
    'class' => 'mx-auto d-block w-100 h-auto'));?></a>
                </p>
                <div class="card-body">
                    <p>
                        <a href="<?php the_permalink();?>" rel="bookmark"><?php the_title();?></a>
                    </p>
                </div>
            </div>
        </div>
        <?php }?>
        <?php }?>
        <?php wp_reset_postdata();?>
    </div>
</div>

    <?php get_footer();?>
    <?php wp_footer();?>

</body>
