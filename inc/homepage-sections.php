<?php
/**
 * Hardcoded homepage section renderers.
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}

function maisaba_asset_url($filename) {
    return get_template_directory_uri() . '/assets/images/karaya/' . ltrim($filename, '/');
}

function maisaba_icon($name) {
    $icons = [
        'arrow-left'  => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M19 12H5M11 18l-6-6 6-6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'arrow-right' => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'instagram'   => '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5" stroke="currentColor" stroke-width="1.5"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.5"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>',
        'facebook'    => '<svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor" aria-hidden="true"><path d="M14 8h3V4.2c-.5-.1-2.2-.2-4.1-.2C9 4 6.3 6.4 6.3 10.8V14H2v4.3h4.3V24h5.2v-5.7h4.2l.7-4.3h-4.9v-2.8C11.5 9.9 11.9 8 14 8Z"/></svg>',
        'tiktok'      => '<svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor" aria-hidden="true"><path d="M15.4 3c.4 2.1 1.6 3.5 3.6 4v3.2c-1.4 0-2.6-.4-3.6-1.1v6.1a5.8 5.8 0 1 1-5-5.7v3.2a2.6 2.6 0 1 0 1.8 2.5V3h3.2Z"/></svg>',
    ];
    return $icons[$name] ?? '';
}

function maisaba_render_home_hero() {
    ?>
    <section class="home-section h-svh min-h-[38rem] w-full" aria-label="<?php esc_attr_e('Karaya Villas Umalas', 'maisaba'); ?>">
        <img class="size-full object-cover" src="<?php echo esc_url(maisaba_asset_url('hero.webp')); ?>" alt="Karaya Villas Umalas" width="1560" height="1040" fetchpriority="high">
        <div class="absolute inset-0 bg-black/20" aria-hidden="true"></div>
    </section>
    <?php
}

function maisaba_render_home_welcome() {
    ?>
    <section class="home-section flex min-h-svh items-center bg-cream py-28 lg:py-44">
        <img class="welcome-photo welcome-photo--left reveal" data-reveal="left" src="<?php echo esc_url(maisaba_asset_url('intro-left.webp')); ?>" alt="Karaya villa bedroom" width="443" height="699" loading="lazy">
        <img class="welcome-photo welcome-photo--right reveal" data-reveal="right" src="<?php echo esc_url(maisaba_asset_url('intro-right.webp')); ?>" alt="Karaya private pool" width="443" height="443" loading="lazy">
        <div class="m-container relative z-10 text-center">
            <h1 class="display-title reveal mx-auto max-w-4xl text-[clamp(3.8rem,7vw,7rem)] text-moss">Private Pool Villa Experience</h1>
            <div class="section-copy reveal mx-auto mt-12 max-w-4xl">
                <p>Total privacy, comfort, and understated luxury, your own secluded sanctuary to relax and reconnect. Perfect for couples, solo travelers, and global nomads, each villa features air-conditioned interiors, a private kitchen, and dedicated lounge and dining areas.</p>
                <p class="mt-5">Safe, stylish, and effortlessly Instagram-worthy, it's a peaceful retreat designed for intimacy, comfort, and calm.</p>
            </div>
        </div>
        <div class="welcome-mobile-photos" aria-hidden="true">
            <img src="<?php echo esc_url(maisaba_asset_url('intro-left.webp')); ?>" alt="" width="443" height="699" loading="lazy">
            <img src="<?php echo esc_url(maisaba_asset_url('intro-right.webp')); ?>" alt="" width="443" height="443" loading="lazy">
        </div>
    </section>
    <?php
}

function maisaba_render_home_villas() {
    $villas = [
        ['One Bedroom Private Pool Villa', '50sqm', 'King Bed', '2 Person', 'villa-one.webp', 'https://www.karayavillasumalas.com/villas/one-bedroom-private-pool-villa'],
        ['Grand One-Bedroom Pool Villa', '60sqm', 'King Bed', '2 Person', 'villa-grand.webp', 'https://www.karayavillasumalas.com/villas/grand-one-bedroom-pool-villa'],
        ['Connecting One-Bedroom Pool Villa', '110sqm', 'King Bed', '2 Person', 'villa-connecting.webp', 'https://www.karayavillasumalas.com/villas/connecting-one-bedroom-pool-villa'],
    ];
    ?>
    <section class="home-section bg-cream pt-12 lg:pt-20">
        <div class="m-container mb-12 text-center">
            <h2 class="display-title reveal text-[clamp(3.25rem,5vw,5rem)] text-moss">Our Villas</h2>
            <p class="section-copy reveal mx-auto mt-6 max-w-4xl">More than a place to stay, each villa is a private retreat created for comfort, connection, and complete peace of mind.</p>
        </div>
        <div class="swiper villas-grid villas-swiper reveal">
            <div class="swiper-wrapper">
                <?php foreach ($villas as $villa) : ?>
                    <article class="swiper-slide villa-card">
                        <img src="<?php echo esc_url(maisaba_asset_url($villa[4])); ?>" alt="<?php echo esc_attr($villa[0]); ?>" width="1080" height="1080" loading="lazy">
                        <div class="villa-card__content">
                            <h3 class="font-display text-[clamp(1.8rem,2.6vw,3rem)] leading-none"><?php echo esc_html($villa[0]); ?></h3>
                            <div class="villa-card__details">
                                <ul class="mt-5 flex flex-wrap justify-center gap-x-5 gap-y-2 text-sm font-light" aria-label="Villa details">
                                    <li><?php echo esc_html($villa[1]); ?></li><li><?php echo esc_html($villa[2]); ?></li><li><?php echo esc_html($villa[3]); ?></li>
                                </ul>
                                <a class="btn btn-light mt-6" href="<?php echo esc_url($villa[5]); ?>">View Details</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function maisaba_render_home_about() {
    ?>
    <section class="home-section grain-section flex min-h-svh items-center py-28 lg:py-44">
        <img class="welcome-photo welcome-photo--left reveal" data-reveal="left" src="<?php echo esc_url(maisaba_asset_url('about-left.webp')); ?>" alt="Karaya Umalas Villas" width="600" height="750" loading="lazy">
        <img class="welcome-photo welcome-photo--right reveal" data-reveal="right" src="<?php echo esc_url(maisaba_asset_url('about-right.webp')); ?>" alt="Karaya Umalas Villas" width="600" height="750" loading="lazy">
        <div class="m-container relative z-10 text-center text-white">
            <h2 class="display-title reveal text-[clamp(4rem,7vw,7rem)]">About Umalas</h2>
            <div class="reveal mx-auto mt-10 max-w-4xl">
                <p class="text-lg font-light uppercase">Peaceful, authentic living, ideally positioned</p>
                <p class="mt-6 text-[clamp(1rem,1.3vw,1.4rem)] font-light leading-[1.7] text-moss-light">Umalas is a peaceful Bali enclave where village charm meets modern luxury. Surrounded by rice fields, private villas offer calm and comfort just minutes from Seminyak and Canggu, it is close to Batu Belig and Petitenget Beach. With chic cafes, yoga studios, and rich local culture, it's a refined retreat for those seeking serenity with easy access to the island's energy.</p>
                <a class="btn mt-10 border-white bg-white text-moss hover:border-stone-warm hover:bg-stone-warm hover:text-white" href="https://secure.guestpro.net/kvu/booking">Book Now</a>
            </div>
        </div>
        <div class="welcome-mobile-photos" aria-hidden="true">
            <img src="<?php echo esc_url(maisaba_asset_url('about-left.webp')); ?>" alt="" width="600" height="750" loading="lazy">
            <img src="<?php echo esc_url(maisaba_asset_url('about-right.webp')); ?>" alt="" width="600" height="750" loading="lazy">
        </div>
    </section>
    <?php
}

function maisaba_render_home_concierge() {
    $items = [
        ['Transportation', 'concierge-transport.png', 'https://www.karayavillasumalas.com/concierge/transport'],
        ['Villa Personalization', 'concierge-personalization.png', 'https://www.karayavillasumalas.com/concierge/villa-personalization'],
        ['Reservation', 'concierge-reservation.png', 'https://www.karayavillasumalas.com/concierge/reservations'],
    ];
    ?>
    <section class="home-section bg-cream py-28 lg:py-44">
        <div class="m-container concierge-layout">
            <div class="reveal">
                <p class="text-lg font-light uppercase text-moss">Karaya Concierge</p>
                <h2 class="display-title mt-5 text-[clamp(4rem,6.5vw,7rem)] text-moss">Hospitality with Heart.</h2>
                <p class="section-copy mt-10">Personalized support delivered with warmth and sincerity, because true hospitality is found in the little things. From helping you discover hidden local gems to arranging the details that make your journey smoother, our team is here to make every stay feel effortless, welcoming, and uniquely yours.</p>
                <a class="btn btn-outline mt-9" href="https://www.karayavillasumalas.com/concierge">See Our Concierge</a>
                <div class="swiper-controls">
                    <button class="swiper-button-control concierge-prev" type="button" aria-label="Previous concierge service"><?php echo maisaba_icon('arrow-left'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></button>
                    <button class="swiper-button-control concierge-next" type="button" aria-label="Next concierge service"><?php echo maisaba_icon('arrow-right'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></button>
                </div>
            </div>
            <div class="swiper concierge-swiper reveal" data-reveal="right">
                <div class="swiper-wrapper">
                    <?php foreach ($items as $item) : ?>
                        <article class="swiper-slide concierge-card">
                            <img src="<?php echo esc_url(maisaba_asset_url($item[1])); ?>" alt="<?php echo esc_attr($item[0]); ?>" width="800" height="800" loading="lazy">
                            <div class="mt-4 flex items-center justify-between gap-4">
                                <h3 class="font-display text-3xl text-moss"><?php echo esc_html($item[0]); ?></h3>
                                <a class="text-link text-sm uppercase text-moss hover:underline" href="<?php echo esc_url($item[2]); ?>">Explore</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}

function maisaba_render_home_map() {
    ?>
    <section class="home-section bg-cream">
        <picture>
            <source media="(max-width: 767px)" srcset="<?php echo esc_url(maisaba_asset_url('map-mobile.webp')); ?>">
            <img class="map-image w-full object-cover" src="<?php echo esc_url(maisaba_asset_url('map-desktop.webp')); ?>" alt="Map of Karaya Villas Umalas and nearby destinations" width="1920" height="744" loading="lazy">
        </picture>
    </section>
    <?php
}

function maisaba_get_experiences() {
    return [
        ['In-Villa Spa', 'Our In-Villa Spa offers you a traditional massage technique from Bali, known for its deep relaxation and therapeutic benefits. It combines acupressure, deep tissue massage, stretching, and more.', 'experience-spa.jpg', 'https://www.karayavillasumalas.com/longevity/in-villa-spa'],
        ['Yoga Class', 'Step outside your villa and into the calm of Plaza Gumukan, an open-air space nestled among the rice fields in our backyard.', 'experience-yoga.jpg', 'https://www.karayavillasumalas.com/longevity/yoga-class'],
        ['Heritage', 'Enjoy complimentary cultural activities at the lobby, including traditional canang sari offerings and authentic Balinese attire.', 'experience-heritage.jpg', 'https://www.karayavillasumalas.com/cultural-immersion/heritage'],
        ['Craft', 'Experience the culture of Bali through immersive activities, from a private cooking class to hands-on silver jewelry making.', 'experience-craft.jpg', 'https://www.karayavillasumalas.com/cultural-immersion/craft'],
        ['Explore', 'Discover thoughtful experiences around Umalas and connect with Bali through nature, culture, and local traditions.', 'experience-explore.jpg', 'https://www.karayavillasumalas.com/cultural-immersion/explore'],
    ];
}

function maisaba_render_home_experiences() {
    $experiences = maisaba_get_experiences();
    ?>
    <section class="home-section grain-section py-28 lg:py-40">
        <div class="m-container">
            <h2 class="display-title reveal mx-auto mb-16 max-w-5xl text-center text-[clamp(4rem,7vw,7rem)] text-white">Explore Karaya Experiences</h2>
            <div class="experience-layout">
                <div class="experience-tabs reveal" data-reveal="left">
                    <?php foreach ($experiences as $index => $experience) : ?>
                        <div class="experience-tab<?php echo 0 === $index ? ' is-open' : ''; ?>">
                            <button class="experience-tab__trigger" type="button" aria-expanded="<?php echo 0 === $index ? 'true' : 'false'; ?>" data-experience-tab="<?php echo esc_attr($index); ?>">
                                <span class="experience-tab__label"><?php echo esc_html($experience[0]); ?></span>
                            </button>
                            <div class="experience-tab__panel"><div class="pt-4 text-base font-light leading-relaxed text-moss-light"><p><?php echo esc_html($experience[1]); ?></p><a class="btn btn-light mt-5" href="<?php echo esc_url($experience[3]); ?>">Explore</a></div></div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="experience-images reveal" data-reveal="right" aria-live="polite">
                    <div class="experience-image-track" data-experience-track>
                        <?php foreach ($experiences as $experience) : ?>
                            <img class="experience-image" src="<?php echo esc_url(maisaba_asset_url($experience[2])); ?>" alt="<?php echo esc_attr($experience[0]); ?>" width="1080" height="1080" loading="lazy">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="experience-mobile swiper experience-mobile-swiper reveal">
                <div class="swiper-wrapper">
                    <?php foreach ($experiences as $experience) : ?>
                        <article class="swiper-slide">
                            <img src="<?php echo esc_url(maisaba_asset_url($experience[2])); ?>" alt="<?php echo esc_attr($experience[0]); ?>" width="1080" height="1080" loading="lazy">
                            <h3 class="mt-5 font-display text-4xl text-white"><?php echo esc_html($experience[0]); ?></h3>
                            <p class="mt-3 text-sm font-light leading-relaxed text-moss-light"><?php echo esc_html($experience[1]); ?></p>
                            <a class="btn btn-light mt-5" href="<?php echo esc_url($experience[3]); ?>">Explore</a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}

function maisaba_render_home_reviews() {
    $reviews = [
        ['“I highly recommend Karaya Villas Umalas”', 'Really nice experience with Karaya Villa! They are very caring about our stay, and the room is very nice as well. Ayu, one of the staff, has made us feel like home when we check in, and other staffs are very friendly and welcoming as well. Highly recommend for any Bali visitors!', 'Nam Anson'],
        ['“The service here is exceptional”', 'The lady at the front desk was so kind, and the entire staff greeted us with big smiles every single day. They were always eager to help with a can-do attitude. The villa itself is very new, modern, and kept spotlessly clean.', 'Guest'],
        ['“Wonderful villa with everything you need”', 'Wonderful villa with all equipment and amenities you need for a comfortable and joyful holiday. Everyone, without exception, has become like family. We definitely come back very soon.', 'Vladey'],
    ];
    ?>
    <section class="home-section bg-cream px-4 py-28 lg:py-40">
        <div class="m-container review-shell reveal">
            <h2 class="review-shell__title display-title text-[clamp(2.5rem,4vw,4.5rem)]">See what our guests are saying</h2>
            <div class="swiper reviews-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($reviews as $review) : ?>
                        <blockquote class="swiper-slide review-slide">
                            <p class="font-display text-[clamp(2rem,3.2vw,3.5rem)] leading-tight"><?php echo esc_html($review[0]); ?></p>
                            <div class="review-stars mt-5" aria-label="5 out of 5 stars">★★★★★</div>
                            <p class="mx-auto mt-7 max-w-5xl text-base font-light leading-[1.75] lg:text-xl"><?php echo esc_html($review[1]); ?></p>
                            <cite class="mt-7 block text-sm font-medium not-italic uppercase tracking-widest"><?php echo esc_html($review[2]); ?></cite>
                        </blockquote>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination !relative !bottom-auto mt-10"></div>
            </div>
        </div>
    </section>
    <?php
}
