<?php
/**
 * The main template file
 *
 * @package ModelarniaGdanska
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="main-content" role="main">
    <div class="container">

        <?php if (have_posts()) : ?>
            <div class="posts-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium_large', array('alt' => get_the_title())); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="post-content">
                            <h2 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <div class="post-meta">
                                <time datetime="<?php echo get_the_date('c'); ?>">
                                    <?php echo get_the_date(); ?>
                                </time>
                            </div>

                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                Czytaj więcej
                            </a>
                        </div>

                    </article>
                <?php endwhile; ?>
            </div>

            <?php 
            // Pagination
            the_posts_pagination(array(
                'prev_text' => '← Poprzednie',
                'next_text' => 'Następne →',
            )); 
            ?>

        <?php else : ?>

            <div class="no-posts">
                <h2>Nie znaleziono postów</h2>
                <p>Przepraszamy, ale nie ma tutaj nic do wyświetlenia.</p>
                <a href="<?php echo home_url(); ?>" class="btn btn-primary">
                    Powrót do strony głównej
                </a>
            </div>

        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>