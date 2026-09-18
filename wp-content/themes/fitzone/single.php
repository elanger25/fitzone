<?php get_header(); ?>
<main id="main" class="inner standard-content blog-post">
<?php while (have_posts()): the_post(); ?>
<article>
<nav class="breadcrumbs" aria-label="Drobečková navigace"><a href="<?=esc_url(home_url('/'))?>">Domů</a><span>›</span><a href="<?=esc_url(home_url('/blog/'))?>">Blog</a></nav>
<header class="blog-post-header"><span class="eyebrow">FitZone blog</span><h1><?php the_title(); ?></h1><p class="blog-post-meta"><?=esc_html(get_the_date('j. n. Y'))?> · <?=fz_reading_minutes(get_the_ID())?> min čtení</p></header>
<?php if (has_post_thumbnail()): ?><div class="post-featured"><?php the_post_thumbnail('large'); ?></div><?php endif; ?>
<div class="blog-post-body"><?php the_content(); ?></div>
<footer class="blog-post-footer"><a class="button outline" href="<?=esc_url(home_url('/blog/'))?>">← Zpět na všechny články</a></footer>
</article>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>
