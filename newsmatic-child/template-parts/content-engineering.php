<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsmatic
 */
use Newsmatic\CustomizerDefault as ND;

$archive_post_element_order = $args['archive_post_element_order'];
$archive_post_meta_order = $args['archive_post_meta_order'];

global $post;

// echo '<pre>';
// print_r($post);
// print_r();
// exit;
?>
<a class="article-link" href="<?php the_permalink(); ?>">
<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> style="background:url('<?php echo get_the_post_thumbnail_url($post,'full'); ?>')">
    <div class="acontent">
        <div class="article-heading-wrapper">
            <h2><?php echo $post->post_title; ?></h2>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
</a>