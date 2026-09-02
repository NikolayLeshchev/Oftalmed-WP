<?php

//Custom breadcrumbs

function oftalmed_breadcrumbs() {
    if ( is_front_page() ) {
        return;
    }

    global $post;
    
    $crumbs = array();
    $position = 1;

    $crumbs[] = array(
        'name' => 'Главная',
        'url'  => home_url( '/' ),
    );

    if ( is_page() ) {
        if ( $post->post_parent ) {
            $parent_ids = array_reverse( get_post_ancestors( $post->ID ) );
            foreach ( $parent_ids as $parent_id ) {
                $crumbs[] = array(
                    'name' => get_the_title( $parent_id ),
                    'url'  => get_permalink( $parent_id ),
                );
            }
        }
        $crumbs[] = array(
            'name' => get_the_title(),
            'url'  => '',
        );
    } 
    elseif ( is_singular() ) {
        $post_type = get_post_type_object( get_post_type() );
        
        if ( $post_type && $post_type->has_archive ) {
            $crumbs[] = array(
                'name' => $post_type->labels->name,
                'url'  => get_post_type_archive_link( get_post_type() ),
            );
        }

        $crumbs[] = array(
            'name' => get_the_title(),
            'url'  => '',
        );
    }
    elseif ( is_category() || is_tax() ) {
        $crumbs[] = array(
            'name' => single_term_title( '', false ),
            'url'  => '',
        );
    }
    elseif ( is_404() ) {
        $crumbs[] = array(
            'name' => 'Страница не найдена',
            'url'  => '',
        );
    }

    if ( ! empty( $crumbs ) ) : ?>
        <nav aria-label="breadcrumb" class="breadcrumb">
            <div class="breadcrumb-wrapper">
                <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                    <?php foreach ( $crumbs as $crumb ) : ?>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <?php if ( ! empty( $crumb['url'] ) ) : ?>
                                <a itemprop="item" href="<?= esc_url( $crumb['url'] ); ?>">
                                    <span itemprop="name"><?= esc_html( $crumb['name'] ); ?></span>
                                </a>
                            <?php else : ?>
                                <span itemprop="name"><?= esc_html( $crumb['name'] ); ?></span>
                            <?php endif; ?>
                            <meta itemprop="position" content="<?= $position++; ?>">
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </nav>
    <?php endif;
}