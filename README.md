# WP ACF Blocks

Custom Gutenberg blocks built with ACF Pro Block API v3 and PHP render templates. No build step required.

## Stack

- WordPress 6.5+
- ACF Pro 6.x (Block API v3)
- PHP 8.1+
- Vanilla JS

## Blocks

### Video Facade (`wpacfb/video-facade`)

YouTube embed with facade pattern. Shows a poster image until the user clicks — the iframe loads only on interaction.

**Why:** A standard YouTube iframe adds ~500 KB and multiple third-party requests on page load, directly hurting LCP and TBT scores. This block avoids that entirely.

**Fields (ACF):**
- `video_id` — YouTube video ID (required)
- `poster_image` — custom poster (optional, falls back to YouTube maxresdefault)
- `caption` — text below the video

**Performance:**
- No iframe on initial load
- `loading="lazy"` + `decoding="async"` on poster image
- `youtube-nocookie.com` domain on embed
- `autoplay=1` injected only after click

### Cards Grid (`wpacfb/cards-grid`)

Repeater-based responsive card grid.

**Fields (ACF):**
- `section_title` — optional heading
- `cards` (repeater): `image`, `title`, `text`

**Layout:** CSS Grid with `auto-fill` and `minmax(280px, 1fr)` — adapts to any column count without breakpoint overrides.

## Structure

```
wp-acf-blocks/
├── wp-acf-blocks.php        # Plugin entry point
├── blocks/
│   ├── video-facade/
│   │   ├── block.json       # Block metadata (API v3)
│   │   ├── render.php       # PHP render template
│   │   └── style.css        # Isolated block styles
│   └── cards-grid/
│       ├── block.json
│       ├── render.php
│       └── style.css
└── acf-json/                # ACF field group JSON sync
    ├── group_video_facade.json
    └── group_cards_grid.json
```

## Installation

1. Copy plugin folder to `wp-content/plugins/wp-acf-blocks/`
2. Activate plugin in WordPress admin
3. ACF Pro will auto-sync field groups from `acf-json/`

## Code conventions

- Isolated block styles — no global CSS, no `!important`
- PHP render templates only — no `save()` JS
- `rem` units, base 16px
- Prefixed functions and constants (`wpacfb_`, `WPACFB_`)
- Sanitised output throughout (`esc_html`, `esc_url`, `esc_attr`)
- Atomic commits per block/task
