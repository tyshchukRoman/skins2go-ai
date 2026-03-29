<?php get_header(); ?>

<main>

  <!-- ===================== INTRO ===================== -->
  <section class="section">
    <div class="container flow" style="--flow-space: 1.5rem">
      <h1>Base Style</h1>
      <p>Live reference for all CSS primitives available in this theme. Every example uses the actual classes — no mocks.</p>
      <nav>
        <ol class="flow" style="--flow-space: 0.25rem; list-style: decimal; padding-left: 1.25rem">
          <li><a href="#colors">Colors</a></li>
          <li><a href="#typography">Typography</a></li>
          <li><a href="#buttons">Buttons</a></li>
          <li><a href="#forms">Forms</a></li>
          <li><a href="#layout">Layout Primitives</a></li>
          <li><a href="#utilities">Utilities</a></li>
          <li><a href="#effects">Spacing &amp; Effects</a></li>
        </ol>
      </nav>
    </div>
  </section>

  <div class="container"><hr></div>

  <!-- ===================== 1. COLORS ===================== -->
  <section class="section" id="colors">
    <div class="container flow" style="--flow-space: 2rem">
      <h2>1. Colors</h2>
      <p>All color tokens are defined as CSS custom properties on <code>:root</code> in <code>_root.scss</code>.</p>

      <div class="flow" style="--flow-space: 1.5rem">

        <h3>Brand</h3>
        <div class="grid" data-columns="4" style="--gap: 1rem">
          <?php
          $colors = [
            ['--color-primary',    '#8f8cff', 'Main accent — CTAs, borders, highlights'],
            ['--color-accent',     '#bf00ff', 'Decorative gradient accent'],
            ['--color-orange',     '#f75e0b', 'Badge / promo highlights'],
            ['--color-bg',         '#0d0d0d', 'Page background'],
            ['--color-surface',    '#1a1a1a', 'Cards, panels, elevated surfaces'],
            ['--color-text',       '#ffffff', 'Primary text'],
            ['--color-text-muted', '#857d97', 'Secondary / muted text'],
            ['--color-black',      '#000000', 'Absolute black'],
            ['--color-white',      '#ffffff', 'Absolute white'],
          ];
          foreach ($colors as [$name, $value, $desc]): ?>
            <div class="box flow" style="--flow-space: 0.5rem; padding: 0; overflow: hidden;">
              <div style="height: 5rem; background: var(<?php echo esc_attr($name); ?>); border-bottom: var(--stroke-subtle)"></div>
              <div style="padding: 0.75rem">
                <code style="font-size: var(--size-sm)"><?php echo esc_html($name); ?></code>
                <p style="font-size: var(--size-xs); opacity: 0.7; margin-top: 0.25rem"><?php echo esc_html($value); ?> — <?php echo esc_html($desc); ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <h3>Feedback</h3>
        <div class="grid" data-columns="4" style="--gap: 1rem">
          <?php
          $feedback = [
            ['--color-success', '#22c55e', 'Success states'],
            ['--color-warning', '#eab308', 'Warning states'],
            ['--color-error',   '#ef4444', 'Error states'],
          ];
          foreach ($feedback as [$name, $value, $desc]): ?>
            <div class="box flow" style="--flow-space: 0.5rem; padding: 0; overflow: hidden;">
              <div style="height: 3rem; background: var(<?php echo esc_attr($name); ?>); border-bottom: var(--stroke-subtle)"></div>
              <div style="padding: 0.75rem">
                <code style="font-size: var(--size-sm)"><?php echo esc_html($name); ?></code>
                <p style="font-size: var(--size-xs); opacity: 0.7; margin-top: 0.25rem"><?php echo esc_html($value); ?> — <?php echo esc_html($desc); ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </section>

  <div class="container"><hr></div>

  <!-- ===================== 2. TYPOGRAPHY ===================== -->
  <section class="section" id="typography">
    <div class="container flow" style="--flow-space: 2rem">
      <h2>2. Typography</h2>
      <p>Display uses <code>font-family: var(--font-display)</code> (Gasoek One). All headings h1–h6 use <code>font-family: var(--font-primary)</code> (Space Grotesk), <code>font-weight: var(--font-bold)</code>, <code>text-transform: uppercase</code>.</p>

      <div class="flow" style="--flow-space: 1.5rem">

        <h3>Display + Heading Scale</h3>
        <div class="box flow" style="--flow-space: 1.25rem">
          <?php
          $headings = [
            ['div', 'display / .h-display', '--size-display', 'clamp(2.5rem, 3.6vw, 3.5rem)',  '40px → 56px — Gasoek One', 'display'],
            ['h1',  'h1 / .h1',            '--size-h1',      'clamp(2rem, 2.9vw, 2.75rem)',    '32px → 44px',              ''],
            ['h2',  'h2 / .h2',            '--size-h2',      'clamp(1.75rem, 2.5vw, 2.25rem)', '28px → 36px',              ''],
            ['h3',  'h3 / .h3',            '--size-h3',      '1.5rem',                         '24px',                     ''],
            ['h4',  'h4 / .h4',            '--size-h4',      '1.25rem',                        '20px',                     ''],
            ['h5',  'h5 / .h5',            '--size-lg',      '1.125rem',                       '18px',                     ''],
            ['h6',  'h6 / .h6',            '--size-md',      '1rem',                           '16px',                     ''],
          ];
          foreach ($headings as [$tag, $label, $var, $value, $range, $cls]): ?>
            <div class="repel" style="--gap: 1rem; flex-wrap: nowrap; align-items: baseline; border-bottom: var(--stroke-subtle); padding-bottom: 1rem">
              <<?php echo $tag; ?> <?php echo $cls ? "class=\"$cls\"" : ''; ?>>The quick brown fox<br>jumps over the lazy dog</<?php echo $tag; ?>>
              <div style="flex-shrink: 0; text-align: right">
                <code style="display: block; font-size: var(--size-sm)"><?php echo esc_html($label); ?></code>
                <code style="display: block; font-size: var(--size-xs); opacity: 0.6"><?php echo esc_html($var); ?></code>
                <span style="font-size: var(--size-xs); opacity: 0.5"><?php echo esc_html($range); ?></span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <h3>Font Sizes</h3>
        <div class="box">
          <table style="width: 100%; border-collapse: collapse">
            <thead>
              <tr style="border-bottom: var(--stroke-subtle)">
                <th style="text-align: left; padding: 0.5rem 0.75rem; font-size: var(--size-sm)">Variable</th>
                <th style="text-align: left; padding: 0.5rem 0.75rem; font-size: var(--size-sm)">Value</th>
                <th style="text-align: left; padding: 0.5rem 0.75rem; font-size: var(--size-sm)">Sample</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sizes = [
                ['--size-lg', '1.125rem (18px)', 'The quick brown fox'],
                ['--size-md', '1rem (16px)',      'The quick brown fox'],
                ['--size-sm', '0.875rem (14px)',  'The quick brown fox'],
                ['--size-xs', '0.75rem (12px)',   'The quick brown fox'],
              ];
              foreach ($sizes as [$var, $val, $sample]): ?>
                <tr style="border-bottom: 1px solid rgba(255,255,255,0.07)">
                  <td style="padding: 0.5rem 0.75rem"><code><?php echo esc_html($var); ?></code></td>
                  <td style="padding: 0.5rem 0.75rem; font-size: var(--size-sm); opacity: 0.6"><?php echo esc_html($val); ?></td>
                  <td style="padding: 0.5rem 0.75rem; font-size: var(<?php echo esc_attr($var); ?>)"><?php echo esc_html($sample); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <h3>Font Families</h3>
        <div class="grid" data-columns="2" style="--gap: 1rem">
          <div class="box flow" style="--flow-space: 0.5rem">
            <code style="font-size: var(--size-sm)">--font-display</code>
            <p style="font-size: var(--size-xs); opacity: 0.6">'Gasoek One', sans-serif — display/hero headlines</p>
            <p class="display" style="font-size: var(--size-h3)">Display Font</p>
          </div>
          <div class="box flow" style="--flow-space: 0.5rem">
            <code style="font-size: var(--size-sm)">--font-primary</code>
            <p style="font-size: var(--size-xs); opacity: 0.6">'Space Grotesk', sans-serif — all UI text</p>
            <p style="font-family: var(--font-primary); font-size: var(--size-h3)">Primary Font</p>
          </div>
        </div>

        <h3>Font Weights</h3>
        <div class="box">
          <table style="width: 100%; border-collapse: collapse">
            <thead>
              <tr style="border-bottom: var(--stroke-subtle)">
                <th style="text-align: left; padding: 0.5rem 0.75rem; font-size: var(--size-sm)">Variable</th>
                <th style="text-align: left; padding: 0.5rem 0.75rem; font-size: var(--size-sm)">Value</th>
                <th style="text-align: left; padding: 0.5rem 0.75rem; font-size: var(--size-sm)">Sample</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $weights = [
                ['--font-bold',   '700'],
                ['--font-medium', '500'],
              ];
              foreach ($weights as [$var, $val]): ?>
                <tr style="border-bottom: 1px solid rgba(255,255,255,0.07)">
                  <td style="padding: 0.5rem 0.75rem"><code><?php echo esc_html($var); ?></code></td>
                  <td style="padding: 0.5rem 0.75rem; font-size: var(--size-sm); opacity: 0.6"><?php echo esc_html($val); ?></td>
                  <td style="padding: 0.5rem 0.75rem; font-weight: <?php echo esc_attr($val); ?>">The quick brown fox jumps over the lazy dog</td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <h3>Line Heights</h3>
        <div class="grid" data-columns="4" style="--gap: 1rem">
          <?php
          $leadings = [
            ['--leading-flat',    '1',     'Display / hero text'],
            ['--leading-tight',   '1.2',   'Headings'],
            ['--leading-normal',  '1.333', 'Nav / UI text'],
            ['--leading-relaxed', '1.5',   'Body copy'],
          ];
          foreach ($leadings as [$var, $val, $desc]): ?>
            <div class="box">
              <p style="line-height: <?php echo esc_attr($val); ?>; margin-bottom: 0.75rem">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
              <code style="font-size: var(--size-sm); display: block"><?php echo esc_html($var); ?></code>
              <span style="font-size: var(--size-xs); opacity: 0.6"><?php echo esc_html($val); ?> — <?php echo esc_html($desc); ?></span>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </section>

  <div class="container"><hr></div>

  <!-- ===================== 3. BUTTONS ===================== -->
  <section class="section" id="buttons">
    <div class="container flow" style="--flow-space: 2rem">
      <h2>3. Buttons</h2>
      <p>Four variants. All use Space Grotesk Bold 18px, uppercase, radius 16px, padding <code>var(--space-sm) var(--space-xl)</code>.</p>

      <div class="box flow" style="--flow-space: 1.5rem">
        <div class="cluster" style="--gap: 1rem">
          <a href="#buttons" class="button">.button</a>
          <a href="#buttons" class="button button--outline">.button--outline</a>
          <a href="#buttons" class="button button--white">.button--white</a>
          <a href="#buttons" class="button button--secondary">.button--secondary</a>
        </div>
        <table style="width: 100%; border-collapse: collapse; font-size: var(--size-sm)">
          <thead>
            <tr style="border-bottom: var(--stroke-subtle)">
              <th style="text-align: left; padding: 0.5rem 0.75rem">Class</th>
              <th style="text-align: left; padding: 0.5rem 0.75rem">Background</th>
              <th style="text-align: left; padding: 0.5rem 0.75rem">Text</th>
              <th style="text-align: left; padding: 0.5rem 0.75rem">Border</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $btns = [
              ['.button',            'var(--color-primary)',  'var(--color-black)', 'var(--color-primary)'],
              ['.button--outline',   'transparent',           'var(--color-text)',  'var(--color-primary)'],
              ['.button--white',     'var(--color-white)',    'var(--color-black)', 'var(--color-white)'],
              ['.button--secondary', 'var(--color-surface)',  'var(--color-text)',  'rgba(255,255,255,0.1)'],
            ];
            foreach ($btns as [$cls, $bg, $color, $border]): ?>
              <tr style="border-bottom: 1px solid rgba(255,255,255,0.07)">
                <td style="padding: 0.5rem 0.75rem"><code><?php echo esc_html($cls); ?></code></td>
                <td style="padding: 0.5rem 0.75rem; opacity: 0.7"><?php echo esc_html($bg); ?></td>
                <td style="padding: 0.5rem 0.75rem; opacity: 0.7"><?php echo esc_html($color); ?></td>
                <td style="padding: 0.5rem 0.75rem; opacity: 0.7"><?php echo esc_html($border); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </section>

  <div class="container"><hr></div>

  <!-- ===================== 4. FORMS ===================== -->
  <section class="section" id="forms">
    <div class="container flow" style="--flow-space: 2rem">
      <h2>4. Forms</h2>
      <p>All inputs get base styles automatically — no extra classes needed. Dark surface bg, focus border uses <code>--color-primary</code>.</p>

      <div class="box">
        <?php $fid = wp_generate_uuid4(); ?>
        <div class="grid" data-columns="2" style="--gap: 1.5rem">

          <div class="flow" style="--flow-space: 0.25rem">
            <label for="bs-text-<?php echo esc_attr($fid); ?>">Text input</label>
            <input type="text" id="bs-text-<?php echo esc_attr($fid); ?>" placeholder="Placeholder">
          </div>

          <div class="flow" style="--flow-space: 0.25rem">
            <label for="bs-email-<?php echo esc_attr($fid); ?>">Email input</label>
            <input type="email" id="bs-email-<?php echo esc_attr($fid); ?>" placeholder="you@example.com">
          </div>

          <div class="flow" style="--flow-space: 0.25rem">
            <label for="bs-select-<?php echo esc_attr($fid); ?>">Select</label>
            <select id="bs-select-<?php echo esc_attr($fid); ?>">
              <option>Option one</option>
              <option>Option two</option>
              <option>Option three</option>
            </select>
          </div>

          <div class="flow" style="--flow-space: 0.25rem">
            <label for="bs-search-<?php echo esc_attr($fid); ?>">Search</label>
            <input type="search" id="bs-search-<?php echo esc_attr($fid); ?>" placeholder="Search…">
          </div>

          <div class="flow" style="--flow-space: 0.25rem" style="grid-column: 1 / -1">
            <label for="bs-textarea-<?php echo esc_attr($fid); ?>">Textarea</label>
            <textarea id="bs-textarea-<?php echo esc_attr($fid); ?>" placeholder="Your message…"></textarea>
          </div>

        </div>

        <div class="cluster" style="--gap: 1.5rem; margin-top: 1.5rem">
          <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; margin-bottom: 0">
            <input type="checkbox"> Checkbox
          </label>
          <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; margin-bottom: 0">
            <input type="radio" name="bs-radio"> Radio A
          </label>
          <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; margin-bottom: 0">
            <input type="radio" name="bs-radio"> Radio B
          </label>
        </div>

        <div style="margin-top: 1.5rem">
          <input type="submit" value="Submit">
        </div>
      </div>
    </div>
  </section>

  <div class="container"><hr></div>

  <!-- ===================== 5. LAYOUT PRIMITIVES ===================== -->
  <section class="section" id="layout">
    <div class="container flow" style="--flow-space: 3rem">
      <h2>5. Layout Primitives</h2>
      <p>Composable, single-responsibility layout classes. Control behaviour via CSS variables.</p>

      <!-- Container -->
      <div class="flow" style="--flow-space: 1rem" id="layout-container">
        <h3>.container / .container-sm / .container-lg</h3>
        <p style="font-size: var(--size-sm)">Centers content with <code>var(--space-md)</code> side padding. Max-widths use tokens from <code>_root.scss</code>.</p>
        <div class="box flow" style="--flow-space: 0.5rem">
          <?php
          $containers = [
            ['container-sm', '--container-sm', '800px',  'Content pages, Privacy Policy'],
            ['container',    '--container-md', '1152px', 'Default — most sections'],
            ['container-lg', '--container-lg', '1440px', 'Header, Footer, Hero'],
          ];
          foreach ($containers as [$cls, $var, $px, $use]): ?>
            <div style="padding: 0.75rem 1rem; background: var(--color-primary); opacity: 0.8; border-radius: var(--radius-xs); color: var(--color-black)">
              <code style="font-size: var(--size-sm)">.<?php echo $cls; ?></code>
              <span style="font-size: var(--size-xs); margin-left: 0.75rem; opacity: 0.85"><?php echo esc_html($var); ?> = <?php echo esc_html($px); ?> — <?php echo esc_html($use); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Grid -->
      <div class="flow" style="--flow-space: 1rem" id="layout-grid">
        <h3>.grid</h3>
        <p style="font-size: var(--size-sm)">Responsive grid. Control gap via <code>--gap</code>. Use <code>data-columns</code> for fixed layouts.</p>
        <div class="flow" style="--flow-space: 1rem">
          <?php
          $grids = [
            [null, 'auto-fill', '(no data-columns) — auto-fill, min 16rem per column'],
            ['2',  'auto-fit',  'data-columns="2" — 2 cols, breaks ≈ 500px'],
            ['3',  'auto-fit',  'data-columns="3" — 3 cols, breaks ≈ 768px'],
            ['4',  'fixed',     'data-columns="4" — 4 cols → 2 cols (500px) → 1 col'],
          ];
          foreach ($grids as [$cols, $mode, $desc]): ?>
            <div>
              <p style="font-size: var(--size-xs); opacity: 0.6; margin-bottom: 0.5rem"><?php echo esc_html($desc); ?></p>
              <div class="grid" <?php echo $cols ? "data-columns=\"$cols\"" : ''; ?> style="--gap: 0.5rem">
                <?php for ($i = 1; $i <= ($cols ?? 3); $i++): ?>
                  <div style="padding: 1rem; background: var(--color-surface); border: var(--stroke-subtle); border-radius: var(--radius-xs); text-align: center; font-size: var(--size-sm)">Item <?php echo $i; ?></div>
                <?php endfor; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Cluster -->
      <div class="flow" style="--flow-space: 1rem" id="layout-cluster">
        <h3>.cluster</h3>
        <p style="font-size: var(--size-sm)">Flex row with wrap. Items flow naturally; gap controlled via <code>--gap</code>. Great for tags, button groups, nav items.</p>
        <div class="box">
          <div class="cluster" style="--gap: 0.5rem">
            <?php foreach (['Design', 'Development', 'Motion', 'Branding', 'Strategy', 'Photography', 'Copy'] as $tag): ?>
              <span style="padding: 0.25rem 0.75rem; background: var(--color-surface); border: var(--stroke-subtle); border-radius: var(--radius-sm); font-size: var(--size-sm)"><?php echo $tag; ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- Repel -->
      <div class="flow" style="--flow-space: 1rem" id="layout-repel">
        <h3>.repel</h3>
        <p style="font-size: var(--size-sm)">Space-between flex row. Pushes two groups to opposite ends.</p>
        <div class="box">
          <div class="repel">
            <strong>Left side</strong>
            <a href="#layout" class="button">Right side</a>
          </div>
        </div>
      </div>

      <!-- Switcher -->
      <div class="flow" style="--flow-space: 1rem" id="layout-switcher">
        <h3>.switcher</h3>
        <p style="font-size: var(--size-sm)">Two equal columns that collapse to stacked when the container is narrower than <code>--switcher-target-container-width</code> (default <code>40rem</code>). Max 2 items — third+ go full-width.</p>
        <div class="box">
          <div class="switcher" style="--gap: 1rem">
            <div style="padding: 1.5rem; background: var(--color-surface); border: var(--stroke-subtle); border-radius: var(--radius-xs)">Column A</div>
            <div style="padding: 1.5rem; background: var(--color-surface); border: var(--stroke-subtle); border-radius: var(--radius-xs)">Column B</div>
          </div>
          <p style="font-size: var(--size-xs); opacity: 0.6; margin-top: 0.75rem">Override breakpoint: <code style="font-size: var(--size-xs)">style="--switcher-target-container-width: 60rem"</code></p>
        </div>
      </div>

      <!-- Flow -->
      <div class="flow" style="--flow-space: 1rem" id="layout-flow">
        <h3>.flow / .flow-recursive</h3>
        <p style="font-size: var(--size-sm)"><code>.flow</code> adds <code>margin-top</code> to every direct child after the first. Control spacing via <code>--flow-space</code> (default <code>var(--space-md)</code>).</p>
        <div class="grid" data-columns="2" style="--gap: 1rem">
          <div class="box flow" style="--flow-space: 0.5rem">
            <p style="font-size: var(--size-xs); opacity: 0.6">.flow with --flow-space: 0.5rem</p>
            <div style="padding: 0.5rem; background: var(--color-surface); border: var(--stroke-subtle); border-radius: var(--radius-xs)">Item 1</div>
            <div style="padding: 0.5rem; background: var(--color-surface); border: var(--stroke-subtle); border-radius: var(--radius-xs)">Item 2</div>
            <div style="padding: 0.5rem; background: var(--color-surface); border: var(--stroke-subtle); border-radius: var(--radius-xs)">Item 3</div>
          </div>
          <div class="box flow" style="--flow-space: 2rem">
            <p style="font-size: var(--size-xs); opacity: 0.6">.flow with --flow-space: 2rem</p>
            <div style="padding: 0.5rem; background: var(--color-surface); border: var(--stroke-subtle); border-radius: var(--radius-xs)">Item 1</div>
            <div style="padding: 0.5rem; background: var(--color-surface); border: var(--stroke-subtle); border-radius: var(--radius-xs)">Item 2</div>
            <div style="padding: 0.5rem; background: var(--color-surface); border: var(--stroke-subtle); border-radius: var(--radius-xs)">Item 3</div>
          </div>
        </div>
      </div>

      <!-- Box -->
      <div class="flow" style="--flow-space: 1rem" id="layout-box">
        <h3>.box</h3>
        <p style="font-size: var(--size-sm)">Surface card with <code>var(--space-xl)</code> padding (32px) and <code>--radius-md</code>. Padding reduces to <code>var(--space-lg)</code> on <code>≤390px</code>.</p>
        <div class="box">
          This is a <code>.box</code>. Combine with <code>.flow</code>, <code>.cluster</code>, etc. for complex cards.
        </div>
      </div>

      <!-- Section -->
      <div class="flow" style="--flow-space: 1rem" id="layout-section">
        <h3>.section / .section-top / .section-bottom</h3>
        <p style="font-size: var(--size-sm)">Adds <code>var(--space-4xl)</code> (96px) vertical padding. This entire page uses <code>.section</code> per row.</p>
        <div class="box flow" style="--flow-space: 0.5rem">
          <code style="display: block">&lt;section class="section"&gt;</code>
          <code style="display: block; padding-left: 1rem">&lt;div class="container"&gt;...&lt;/div&gt;</code>
          <code style="display: block">&lt;/section&gt;</code>
        </div>
      </div>

    </div>
  </section>

  <div class="container"><hr></div>

  <!-- ===================== 6. UTILITIES ===================== -->
  <section class="section" id="utilities">
    <div class="container flow" style="--flow-space: 2rem">
      <h2>6. Utilities</h2>

      <!-- Visually Hidden -->
      <div class="flow" style="--flow-space: 1rem">
        <h3>.visually-hidden</h3>
        <p style="font-size: var(--size-sm)">Hides content visually while keeping it accessible to screen readers.</p>
        <div class="box">
          <p>The button below has a visually hidden label:</p>
          <button class="button" style="padding: var(--space-sm) var(--space-md)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
            <span class="visually-hidden">Open menu</span>
          </button>
          <code style="display: block; margin-top: 0.75rem; font-size: var(--size-sm)">&lt;span class="visually-hidden"&gt;Open menu&lt;/span&gt;</code>
        </div>
      </div>

      <!-- Display Utilities -->
      <div class="flow" style="--flow-space: 1rem">
        <h3>Display Utilities</h3>
        <p style="font-size: var(--size-sm)">All use <code>!important</code>. Breakpoint variants hide/show at specific max-widths.</p>
        <div class="box">
          <table style="width: 100%; border-collapse: collapse; font-size: var(--size-sm)">
            <thead>
              <tr style="border-bottom: var(--stroke-subtle)">
                <th style="text-align: left; padding: 0.5rem 0.75rem">Class</th>
                <th style="text-align: left; padding: 0.5rem 0.75rem">Effect</th>
                <th style="text-align: left; padding: 0.5rem 0.75rem">Breakpoint</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $displays = [
                ['.display-block',    'display: block', 'always'],
                ['.display-flex',     'display: flex',  'always'],
                ['.display-none',     'display: none',  'always'],
                ['.display-sm-block', 'display: block', '≤ 390px'],
                ['.display-sm-flex',  'display: flex',  '≤ 390px'],
                ['.display-sm-none',  'display: none',  '≤ 390px'],
                ['.display-md-block', 'display: block', '≤ 768px'],
                ['.display-md-flex',  'display: flex',  '≤ 768px'],
                ['.display-md-none',  'display: none',  '≤ 768px'],
                ['.display-lg-block', 'display: block', '≤ 991px'],
                ['.display-lg-flex',  'display: flex',  '≤ 991px'],
                ['.display-lg-none',  'display: none',  '≤ 991px'],
                ['.display-xl-block', 'display: block', '≤ 1200px'],
                ['.display-xl-flex',  'display: flex',  '≤ 1200px'],
                ['.display-xl-none',  'display: none',  '≤ 1200px'],
              ];
              foreach ($displays as [$cls, $effect, $bp]): ?>
                <tr style="border-bottom: 1px solid rgba(255,255,255,0.07)">
                  <td style="padding: 0.5rem 0.75rem"><code><?php echo esc_html($cls); ?></code></td>
                  <td style="padding: 0.5rem 0.75rem; opacity: 0.7"><?php echo esc_html($effect); ?></td>
                  <td style="padding: 0.5rem 0.75rem; opacity: 0.7"><?php echo esc_html($bp); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </section>

  <div class="container"><hr></div>

  <!-- ===================== 7. SPACING & EFFECTS ===================== -->
  <section class="section" id="effects">
    <div class="container flow" style="--flow-space: 2rem">
      <h2>7. Spacing &amp; Effects</h2>

      <!-- Spacing Scale -->
      <div class="flow" style="--flow-space: 1rem">
        <h3>Spacing Scale</h3>
        <div class="box">
          <table style="width: 100%; border-collapse: collapse">
            <thead>
              <tr style="border-bottom: var(--stroke-subtle)">
                <th style="text-align: left; padding: 0.5rem 0.75rem; font-size: var(--size-sm)">Variable</th>
                <th style="text-align: left; padding: 0.5rem 0.75rem; font-size: var(--size-sm)">Value</th>
                <th style="text-align: left; padding: 0.5rem 0.75rem; font-size: var(--size-sm)">Swatch</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $spaces = [
                ['--space-xs',  '0.375rem', '6px'],
                ['--space-sm',  '0.75rem',  '12px'],
                ['--space-md',  '1rem',     '16px'],
                ['--space-lg',  '1.5rem',   '24px'],
                ['--space-xl',  '2rem',     '32px'],
                ['--space-2xl', '3rem',     '48px'],
                ['--space-3xl', '4rem',     '64px'],
                ['--space-4xl', '6rem',     '96px'],
              ];
              foreach ($spaces as [$var, $rem, $px]): ?>
                <tr style="border-bottom: 1px solid rgba(255,255,255,0.07)">
                  <td style="padding: 0.5rem 0.75rem"><code><?php echo esc_html($var); ?></code></td>
                  <td style="padding: 0.5rem 0.75rem; font-size: var(--size-sm); opacity: 0.6"><?php echo esc_html($rem); ?> (<?php echo esc_html($px); ?>)</td>
                  <td style="padding: 0.5rem 0.75rem">
                    <div style="height: 1rem; width: var(<?php echo esc_attr($var); ?>); background: var(--color-primary); border-radius: 2px; min-width: 2px"></div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Border Radius -->
      <div class="flow" style="--flow-space: 1rem">
        <h3>Border Radius</h3>
        <div class="grid" data-columns="4" style="--gap: 1rem">
          <?php
          $radii = [
            ['--radius-xs',   '4px'],
            ['--radius-sm',   '12px'],
            ['--radius-md',   '16px'],
            ['--radius-lg',   '24px'],
            ['--radius-full', '9999px'],
          ];
          foreach ($radii as [$var, $val]): ?>
            <div style="padding: 1.5rem; background: var(--color-surface); border: var(--stroke-subtle); border-radius: var(<?php echo esc_attr($var); ?>); text-align: center">
              <code style="font-size: var(--size-sm); display: block"><?php echo esc_html($var); ?></code>
              <span style="font-size: var(--size-xs); opacity: 0.6"><?php echo esc_html($val); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Shadow -->
      <div class="flow" style="--flow-space: 1rem">
        <h3>Shadow</h3>
        <div class="grid" data-columns="2" style="--gap: 1rem">
          <div style="padding: 1.5rem; background: var(--color-surface); border-radius: var(--radius-md); box-shadow: var(--shadow-base); text-align: center">
            <code style="font-size: var(--size-sm)">--shadow-base</code>
            <p style="font-size: var(--size-xs); opacity: 0.6; margin-top: 0.25rem">0 4px 24px rgba(143, 140, 255, 0.15)</p>
          </div>
        </div>
      </div>

      <!-- Borders -->
      <div class="flow" style="--flow-space: 1rem">
        <h3>Borders</h3>
        <div class="grid" data-columns="2" style="--gap: 1rem">
          <div style="padding: 1.5rem; border: var(--stroke-primary); border-radius: var(--radius-md); text-align: center">
            <code style="font-size: var(--size-sm)">--stroke-primary</code>
            <p style="font-size: var(--size-xs); opacity: 0.6; margin-top: 0.25rem">1px solid var(--color-primary)</p>
          </div>
          <div style="padding: 1.5rem; border: var(--stroke-subtle); border-radius: var(--radius-md); text-align: center">
            <code style="font-size: var(--size-sm)">--stroke-subtle</code>
            <p style="font-size: var(--size-xs); opacity: 0.6; margin-top: 0.25rem">1px solid rgba(255, 255, 255, 0.1)</p>
          </div>
        </div>
      </div>

      <!-- Breakpoints -->
      <div class="flow" style="--flow-space: 1rem">
        <h3>Breakpoints</h3>
        <div class="box">
          <table style="width: 100%; border-collapse: collapse; font-size: var(--size-sm)">
            <thead>
              <tr style="border-bottom: var(--stroke-subtle)">
                <th style="text-align: left; padding: 0.5rem 0.75rem">Mixin</th>
                <th style="text-align: left; padding: 0.5rem 0.75rem">Max-width</th>
                <th style="text-align: left; padding: 0.5rem 0.75rem">SCSS variable</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $bps = [
                ['@include sm', '390px',  '$breakpoint-sm'],
                ['@include md', '768px',  '$breakpoint-md'],
                ['@include lg', '991px',  '$breakpoint-lg'],
                ['@include xl', '1200px', '$breakpoint-xl'],
              ];
              foreach ($bps as [$mixin, $width, $var]): ?>
                <tr style="border-bottom: 1px solid rgba(255,255,255,0.07)">
                  <td style="padding: 0.5rem 0.75rem"><code><?php echo esc_html($mixin); ?></code></td>
                  <td style="padding: 0.5rem 0.75rem; opacity: 0.7"><?php echo esc_html($width); ?></td>
                  <td style="padding: 0.5rem 0.75rem; opacity: 0.7"><code><?php echo esc_html($var); ?></code></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Transition -->
      <div class="flow" style="--flow-space: 1rem">
        <h3>Transition</h3>
        <div class="box repel">
          <div>
            <code>--transition-base</code>
            <p style="font-size: var(--size-xs); opacity: 0.6; margin-top: 0.25rem">all 0.3s ease</p>
          </div>
          <a href="#effects" class="button">Hover me</a>
        </div>
      </div>

    </div>
  </section>

</main>

<?php get_footer(); ?>
