<header class="header">
  <div class="header__inner | container-lg">

    <!-- Logo -->
    <?php get_template_part('template-parts/header/logo') ?>

    <!-- Right side -->
    <div class="header__actions | cluster">

      <!-- Desktop nav -->
      <?php get_template_part('template-parts/header/menu') ?>

      <!-- Woo icons (currency, search, wishlist, cart) -->
      <div class="header__woo-links | cluster">
        <?php get_template_part('template-parts/header/currency-switcher') ?>
        <?php get_template_part('template-parts/header/search') ?>
        <?php get_template_part('template-parts/header/wishlist') ?>
        <?php get_template_part('template-parts/header/cart') ?>
      </div>

      <!-- Auth buttons -->
      <?php get_template_part('template-parts/header/login') ?>

      <!-- Mobile menu toggle -->
      <?php get_template_part('template-parts/header/mobile-menu') ?>

    </div>

  </div>
</header>
