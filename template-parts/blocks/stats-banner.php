<?php

$items = get_array_value($args, 'stats-banner-items', get('stats-banner-items'));

if ( ! $items ) return;

?>

<section class="stats-banner | section">
  <div class="container">
    <div class="stats-banner__inner">

      <?php foreach ( $items as $item ): ?>
        <?php
          $title = $item['title'] ?? '';
          $desc  = $item['description'] ?? '';
        ?>
        <div class="stats-banner__item">
          <?php if ( $title ): ?>
            <p class="stats-banner__item-title"><?php echo esc_html( $title ) ?></p>
          <?php endif; ?>
          <?php if ( $desc ): ?>
            <p class="stats-banner__item-desc"><?php echo esc_html( $desc ) ?></p>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>
