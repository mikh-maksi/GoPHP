<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php wp_nav_menu( array( 'theme_location' => "main-menu" ) ); ?>
<hr>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h2><?php echo wp_title("", true); ?></h2>
					<?php echo get_the_content(); ?>
					<?php endwhile; else: ?>
						<p>	К сожалению, нет записей, удовлетворяющих заданным критериям.</p>
				<?php endif; ?>


</body>
</html>