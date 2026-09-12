<?php
/**
 * Template part for displaying posts in an index or archive loop
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('group bg-white rounded-2xl border border-slate-200/80 hover:border-slate-300 shadow-xs hover:shadow-md transition-all duration-200 overflow-hidden flex flex-col justify-between'); ?>>
    <div>
        <?php if (has_post_thumbnail()) : ?>
            <div class="relative overflow-hidden aspect-[16/9] bg-slate-100">
                <?php
                the_post_thumbnail('maisaba-card', [
                    'class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300',
                ]);
                ?>
            </div>
        <?php endif; ?>

        <div class="p-6">
            <!-- Categories -->
            <?php
            $categories = get_the_category();
            if (!empty($categories)) :
                ?>
                <div class="flex flex-wrap gap-1.5 mb-3">
                    <?php foreach (array_slice($categories, 0, 2) as $category) : ?>
                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="inline-block px-2.5 py-0.5 rounded-md text-xs font-semibold bg-primary-50 text-primary-700 hover:bg-primary-100 transition-colors">
                            <?php echo esc_html($category->name); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Title -->
            <h2 class="text-xl font-bold text-slate-900 group-hover:text-primary-600 transition-colors line-clamp-2 leading-snug mb-3">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>

            <!-- Excerpt -->
            <div class="text-sm text-slate-600 line-clamp-3 mb-4 leading-relaxed">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>

    <!-- Card Footer / Meta -->
    <div class="px-6 py-4 bg-slate-50/75 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
        <div class="flex items-center">
            <?php maisaba_posted_by(); ?>
        </div>
        <div>
            <?php maisaba_posted_on(); ?>
        </div>
    </div>
</article>
