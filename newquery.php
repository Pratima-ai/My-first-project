<!------------------- Query to pull header footer -------------------->
<?php get_header(); ?>
<?php get_footer(); ?>
<!------------------- Query to pull header footer -------------------->


<!------------------------ Query to pull pages ------------------------>
<?php echo get_stylesheet_directory_uri(); ?>

1. Pull page with static page id
<?php query_posts('post_type=page&p=31');while (have_posts()): the_post(); ?>
<?php endwhile; wp_reset_query(); ?>


2. Pull page with dynamic pace id
<?php query_posts('post_type=page&p='.$postid.'');while (have_posts()): the_post(); ?>
<?php endwhile; wp_reset_query(); ?>


3. Order ascending descending
<?php query_posts('post_type=page&p=31&order=DESC');while (have_posts()): the_post(); ?>
<?php endwhile; wp_reset_query(); ?>
<?php query_posts('post_type=page&p=31&order=ASC');while (have_posts()): the_post(); ?>
<?php endwhile; wp_reset_query(); ?>
<!------------------------ Query to pull pages ------------------------>


<!------------------------ Query to pull posts ------------------------>
1. Pull post of certain category
<?php query_posts('post_type=post&category_name=featured&posts_per_page=-1');  while(have_posts()): the_post(); ?>
<?php endwhile; wp_reset_query(); ?>

2. Pull custom post type
<?php query_posts('post_type=banner&posts_per_page=-1'); while(have_posts()): the_post(); ?>
<?php endwhile; wp_reset_query(); ?>

3. Pull Custom post type with category
<?php
$the_query = new WP_Query( array(
    'post_type' => 'menu',
    'posts_per_page' => -1,
    'tax_query' => array(
        array (
            'taxonomy' => 'menu_category',
            'field' => 'slug',
            'terms' => 'destress',
        )
    ),
) );

while ( $the_query->have_posts() ) :$the_query->the_post(); ?>
    <div class="menu-item">
        <div class="title">
            <h3>
                <?php echo the_title(); ?>
            </h3>
        </div>
        <div class="content">
            <p><?php echo the_content(); ?></p>
        </div>
    </div>
    <?php
endwhile;wp_reset_postdata(); ?>


<!------------------------ Query to pull posts ------------------------>


<!----------------------- Query to pull content ----------------------->
1. For Page Name
<?php echo the_title(); ?>

2. For Page Content
<?php echo the_content(); ?>

3. To pull content with limit (It preserves html tags )
<?php $trimmed = wp_filter_nohtml_kses( wp_trim_words( get_the_content(), 12, "" ) ); ?>
<?php echo $trimmed; ?>

4. To pull content with limit (It removes html tags )
<p><?php echo wp_trim_words( get_the_content(), 40, '...' ); ?></p> <!-- To trim the -->

5. For Page Excerpt
<?php the_excerpt(); ?>

6. For Page Link
<?php the_permalink(); ?>


7. To pull custom field
<?php get_field( 'field_name' )?>    <!-- If it is inside a loop -->
<?php get_field( 'field_name', 3 )?> <!-- If it is not inside a loop, the number is id --
>
<?php if( get_field('field_name') ): ?>
    <p>My field value: <?php the_field('field_name'); ?></p>
<?php endif; ?>

<!-- To pull picture -->
5. Pull Image (It pulls image in image tag)
<?php the_post_thumbnail('full'); ?>

6. For Background Image(Pulls image in src)
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?> <!-- As background image-->
<div style="background-image: url('<?php echo $image[0]; ?>')">
    <!-- To pull picture -->


    echo do_shortcode( '[contact-form-7 id="91" title="quote"]' );
<!----------------------- Query to pull content ----------------------->



<!--    -->