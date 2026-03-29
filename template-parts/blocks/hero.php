<?php

$subtitle = get_array_value($args, 'hero-subtitle',    get('hero-subtitle'));
$title    = get_array_value($args, 'hero-title',       get('hero-title'));
$desc     = get_array_value($args, 'hero-description', get('hero-description'));
$button1  = get_array_value($args, 'hero-button-1',    get('hero-button-1'));
$button2  = get_array_value($args, 'hero-button-2',    get('hero-button-2'));

if ( ! $title ) return;

?>

<section class="hero | section">
  <div class="container">
    <div class="hero__content | flow" style="--flow-space: var(--space-xl)">

      <?php if ( $subtitle ): ?>
        <div class="hero__badge-wrap">
          <span class="hero__badge"><?php echo esc_html( $subtitle ) ?></span>
        </div>
      <?php endif; ?>

      <h1 class="hero__title display"><?php echo esc_html( $title ) ?></h1>

      <?php if ( $desc ): ?>
        <p class="hero__desc"><?php echo esc_html( $desc ) ?></p>
      <?php endif; ?>

      <?php if ( $button1 || $button2 ): ?>
        <div class="hero__buttons | cluster" style="--gap: var(--space-md); justify-content: center">
          <?php if ( $button1 ): ?>
            <a href="<?php echo esc_url( $button1['url'] ) ?>"
               class="button"
               <?php echo $button1['target'] ? 'target="' . esc_attr( $button1['target'] ) . '"' : '' ?>>
              <?php echo esc_html( $button1['title'] ) ?>
            </a>
          <?php endif; ?>
          <?php if ( $button2 ): ?>
            <a href="<?php echo esc_url( $button2['url'] ) ?>"
               class="button button--white"
               <?php echo $button2['target'] ? 'target="' . esc_attr( $button2['target'] ) . '"' : '' ?>>
              <?php echo esc_html( $button2['title'] ) ?>
            </a>
          <?php endif; ?>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>
