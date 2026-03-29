# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Commands

```bash
# Development (watch mode)
npm start

# Production build
npm run build

# Deploy to staging / live
npm run deploy:staging
npm run deploy:live

# Package theme as zip (outputs codelibry.zip one level up)
npm run zip
```

Deployment requires a `.env` file based on `.env.example` with `STAGING_FTP_*` and `LIVE_FTP_*` credentials.

Before deploying, run `npm run build` — the deploy script sends the `dist/` folder as-is.

## Architecture

### PHP loading order (`functions.php`)
`inc/acf.php` → `inc/helpers.php` → `inc/shortcodes.php` → `inc/ajax.php` → `inc/post-types.php` → `inc/taxonomies.php` → `inc/theme-hooks.php` → `inc/woocommerce-hooks.php`

Each loader uses `glob()` to auto-require all `.php` files from its subdirectory — dropping a new file in the right folder is sufficient, no manual registration needed.

### ACF field groups (`inc/acf/`)

Uses [`flyntwp/acf-field-group-composer`](https://github.com/flyntwp/acf-field-group-composer) (Composer). Field keys are **auto-generated** — never add `key` manually.

Structure:
- `inc/acf/blocks/` — pure PHP functions (`codelibry_acf_fields_*(): array`) that return field arrays with no registration. Single source of truth for each block's fields.
- `inc/acf/templates/` — field group registrations for page templates. `page-blocks.php` registers a `flexible_content` field (`page_blocks`) for the default page template.
- `inc/acf/post-types/` — field group registrations scoped to specific CPTs.
- `inc/acf/options/` — ACF Options pages: `header`, `footer`, `404`, `shop`, `single-product`, `company`.

**Key uniqueness**: `page-blocks.php` uses field name `page_blocks`; `reusable-blocks.php` uses `reusable_blocks`. This ensures ACFComposer generates unique keys across both groups even though they share the same block functions.

### Page rendering (`page.php`)

`get_field('page-blocks')` returns the flexible content rows. Each row's `acf_fc_layout` name is used as the template slug and loaded from `template-parts/blocks/`. The block data array is passed directly as `$args`.

### Block templates (`template-parts/blocks/`)

Each block template reads its fields at the top using `get_array_value($args, 'field-name', get('field-name'))`. This works for both contexts — when `$args` is populated (called from `page.php` or `reusable-block.php`) and when it is empty (rendered standalone via `get_field()`).

Images are passed as attachment IDs (`return_format => 'id'`). Templates check `is_numeric($image)` to decide between `wp_get_attachment_image()` and a plain `<img>` tag.

### Helper functions (`inc/helpers/`)

- `get($field, $options=false)` — ACF wrapper: calls `get_field($field)` or `get_field($field, 'option')` for options pages.
- `get_array_value($arr, $key, $default)` — safe array access with fallback.
- `get_inline_svg($name)` — reads and returns SVG from `assets/icons/{name}.svg` as string.
- `get_image_src($name)` — returns URL to `assets/images/{name}`.
- `get_product_list($option, $products)` — routes between `'top-rated'`, `'best-selling'`, or `'choose-manually'` product fetchers.

### Reusable Blocks post type

The `reusable-blocks` CPT lets editors build reusable sets of blocks. On any regular page, the `reusable_block` flexible content layout contains a `post_object` field. At render time, `template-parts/sections/reusable-block.php` fetches `get_field('reusable_blocks', $post_id)` from the selected post and renders its blocks using the same section template loop.

### Assets

Static assets live in `assets/` (theme root) — **not** inside `src/`. SCSS `url()` paths must be relative to the final CSS output at `dist/css/main.min.css`, so they use `../../assets/...`. `css-loader` is configured with `url: false` so webpack does not attempt to process or copy these references.

Built output goes to `dist/` (`dist/main.min.js`, `dist/css/main.min.css`).

### SCSS architecture (`src/scss/`)

- `global/` — reset, fonts, breakpoints, CSS custom properties (`_root.scss`), base element styles, typography
- `layout/` — composable layout primitives: `.container`, `.section`, `.grid`, `.cluster`, `.repel`, `.switcher`, `.flow`, `.box`
- `mixins/` — reusable SCSS mixins (`reset-button`, `image-cover`, `image-contain`)
- `parts/` — 30+ site component styles (header, footer, buttons, forms, product cards, popups, etc.)
- `pages/` — page-specific styles organised by WooCommerce area (shop, cart, checkout, my-account, auth, single-product, wishlist)
- `blocks/` — styles for each ACF flexible content block
- `utilities/` — display helpers, visually-hidden

**Breakpoints** (`_breakpoints.scss`) are **max-width** (mobile-first means adding `@include md {}` to style at ≤768px):
```scss
@include sm { } // max-width: 390px
@include md { } // max-width: 768px
@include lg { } // max-width: 991px
@include xl { } // max-width: 1200px
```

**Design tokens** in `_root.scss` — use CSS custom properties for colors (`--color-primary`, `--color-dark`, etc.), spacing, border radius, typography, and container widths.

**Layout primitives** accept inline CSS variable overrides and compose freely without custom CSS:
```html
<div class="section container">
  <div class="grid" style="--gap: 2rem" data-columns="3">
    <div class="flow" style="--flow-space: 1.5rem">...</div>
  </div>
</div>
```

### JavaScript modules (`src/js/`)

Six focused modules imported in `src/main.js` and compiled to a single `dist/main.min.js`:
- `header-submenu.js`, `mobile-menu.js`, `popup.js`, `password-toggle.js`, `reset-pass.js`, `testimonials.js` (Swiper carousel)

Scripts are enqueued in the footer. `wp_localize_script()` exposes `site.ajax_url`, `site.ajax_nonce`, `site.site_url`, and `site.theme_url`.

### WooCommerce integration

All default WooCommerce CSS is disabled; all WC pages are restyled from scratch.

Hook files in `inc/woocommerce-hooks/` are organised by page area: `global/`, `shop/`, `single-product/`, `cart/`, `checkout/`, `my-account/`, `login/`, `register/`, `reset-password/`. Each file handles one concern (layout, quantity buttons, breadcrumbs, etc.).

Template overrides in `woocommerce/`: `content-product.php` (product card), `cart/mini-cart.php`, `loop/orderby.php` — kept minimal.

Optional plugin integrations (all guarded with existence checks): YITH Wishlist, WOOCS Currency Switcher, WOOF Products Filter, WooForce PDF Invoices.

### Custom post types

- **`testimonials`** — public, supports title only; ACF fields: `author-name`, `author-position`, `content` (wysiwyg)
- **`reusable-blocks`** — private (admin-only), supports title only; ACF field: `reusable_blocks` flexible content

### Adding a new block

1. Create `inc/acf/blocks/my-block.php` with a `codelibry_acf_fields_my_block(): array` function
2. Add a layout entry to `inc/acf/templates/page-blocks.php` (and `inc/acf/post-types/reusable-blocks.php` if needed) calling the function
3. Create `template-parts/blocks/my-block.php` reading fields via `get_array_value($args, 'field-name', get('field-name'))`
4. Create `src/scss/blocks/_my-block.scss` and import it in `src/scss/main.scss`

### Live style reference

Visit `/BaseStyle/` (registered via `inc/theme-hooks/basestyle-route.php`) to preview rendered design tokens, layout primitives, and components. Use the `/update_basestyle` Claude Code command to sync it with the latest SCSS state.
