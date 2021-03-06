<?php
/**
 * Template Name: Home
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package davidpenuela
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<meta name="description" content='An Asexual is a person "who does not experience sexual attraction". However some of them are able to feel romantic attraction and be in platonic relationships.'>
<meta name="author" content="David Penuela & Guillermo Brotons">
<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/img/favicon.ico">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target="#mainMenu">
	<div class="hfeed site home_container" id="load1">
		<?php do_action( 'before' ); ?>
		<header id="masthead" class="site-header" role="banner">
	        <nav class="navbar navbar-asexuals navbar-fixed-top" role="navigation">
	            <div class="container-fluid">
	                <div class="navbar-header">
	                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                    </button>
	                </div>
	                <div class="collapse navbar-collapse asexuals-collapse" id="mainMenu">
	                    <ul id="scrollMenu" class="nav navbar-nav">
	                        <li><a class="scroll-link" href="#video" data-id="video">Home</a></li>
	                        <li><a class="scroll-link" href="#project" data-id="project">Project</a></li>
	                        <li><a class="scroll-link" href="#about" data-id="about">About</a></li>
<!-- 	                        <li><a class="scroll-link" href="#news" data-id="news">News</a></li> -->
	                        <li><a class="scroll-link" href="#participate" data-id="participate">Participate</a></li>
	                        <li><a class="scroll-link" href="#contact" data-id="contact">Contact</a></li>
	                    </ul>
	                  </div><!--/.nav-collapse -->
	            </div>        
	        </nav>
		</header><!-- #masthead -->
		<div class="content">
			<div class="container-fluid" id="load2">
				<div class="row homeVimeo" id="video">
					<div class="col-xs-12 video">
						 <iframe src="//player.vimeo.com/video/85209027?title=0&amp;byline=0&amp;portrait=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
				</div>
			</div><!-- video-->

			<div class="container-fluid section_project" id="load3">
				<div class="row" id="project">
					<?php
	                $args = array( 'posts_per_page' => -1, 'category' => 2, 'orderby' => 'title', 'order' => 'ASC');
	                $lastposts = get_posts( $args );
	                foreach ( $lastposts as $post ) :
	                    setup_postdata( $post ); ?>
	                    <div id="image_<?php echo $post->ID; ?>" class="nopadding col-sm-4 col-md-4 imageWrapper">
	                        <?php echo get_the_post_thumbnail($post_id, 'full', array('class' => 'img-responsive'));
		                        if(get_custom_field('has_text')){
			                        echo '<a class="fancybox-iframe" href = "#'.get_custom_field("a_name").'_'.$post->ID.'">';
		                        }else{
			                        echo '<a class="fancybox-media" href = "'.get_custom_field("e_video").'">';
			                        
		                        }
		                        
	                        ?>
	                        	<div class="description">
									<div class="desc_center"><?php print_custom_field('a_name'); ?></div>
									<div class="desc_bottom">
										<?php print_custom_field('b_age'); ?>,
										<?php print_custom_field('c_location'); ?><br />
										<?php print_custom_field('d_type'); ?><br />										
									</div>
								</div>
	                        </a>
	                    </div>
	                    <?php  
	                    	if(get_custom_field('has_text')){
			                	echo '<div class="interview_box" id="'.get_custom_field("a_name").'_'.$post->ID.'" style="display:none;">';
				                	echo '<div class="interview_box_inner">'.apply_filters('the_content',get_custom_field("e_text")).'</div><!-- interviewbox-->';
			                	echo '</div><!-- #hidden_michele-->';
		                    }else{
			                    echo '';    
		                    }
		                ?>
	                <?php endforeach; wp_reset_postdata(); ?>
				</div>
			</div><!-- images -->

			<div class="container-fluid section" id="load4">
				<div class="row" id="about">
						<?php $post_20 = get_post(20); ?>
						<div class="col-xs-12 col-sm-3"><h1><?php echo $post_20->post_title; ?></h1></div>
						<div class="clearfix visible-xs"></div>
						<?php echo apply_filters('the_content',$post_20->post_content); ?>
				</div>
			</div><!-- about -->
			<div class="clearfix"></div>
			
			<div class="container-fluid section" id="load5">
				<div class="row" id="news">
					<?php
	                $get_args = array( 'posts_per_page' => -1, 'category' => '3', 'orderby' => 'title', 'order' => 'ASC');
	                $allnews = get_posts( $get_args );
	                foreach ( $allnews as $post ) :
	                    setup_postdata( $post ); ?>
	                    <div id="news_<?php echo $post->ID; ?>" class="col-sm-4 col-md-4 newsWrapper">
	                        <div class="news_date"><?php print_custom_field('n_a_date'); ?></div>
	                        <div class="news_description"><?php print_custom_field('n_b_description'); ?></div>
	                        <div class="news_link"><?php print_custom_field('n_c_link:to_link','Watch'); ?></div>
	                    </div>
	                <?php endforeach; wp_reset_postdata(); ?>
				</div><!-- news-->
			</div><!-- load5-->
			<div class="container-fluid section" id="load6">
				<div class="row" id="participate">
						<?php $post_22 = get_post(22); ?>
						<div class="col-xs-12 col-sm-3"><h1><?php echo $post_22->post_title; ?></h1></div>
						<div class="visible-xs clearfix"></div>
						<?php echo apply_filters('the_content',$post_22->post_content); ?>
				</div>
			</div><!-- participate -->

			<div class="container-fluid section" id="load7">
				<div class="row" id="contact">
						<?php $post_24 = get_post(24); ?>
						<div class="col-xs-12 col-sm-3"><h1><?php echo $post_24->post_title; ?></h1></div>
						<?php echo apply_filters('the_content',$post_24->post_content); ?>
				</div>
			</div><!-- contact -->

		</div><!-- content so i can scrollspy-->
		<!-- ?php get_footer(); ?-->
	</div><!-- #home-container -->

	<?php wp_footer(); ?>

</body>
</html>
