# WP ACF Blocks

[English](#english) | [Русский](#русский)

---

## English

Custom Gutenberg blocks built with ACF Pro Block API v3 and PHP render templates. No build step required.

### Stack

- WordPress 6.5+
- ACF Pro 6.x (Block API v3)
- PHP 8.1+
- Vanilla JS

### Blocks

#### Video Facade (`wpacfb/video-facade`)

YouTube embed with facade pattern. Shows a poster image until the user clicks; the iframe loads only on interaction.

**Why:** A standard YouTube iframe adds ~500 KB and multiple third-party requests on page load, directly hurting LCP and TBT scores. This block avoids that entirely.

**Fields (ACF):**
- `video_id` - YouTube video ID (required)
- `poster_image` - custom poster (optional, falls back to YouTube maxresdefault)
- `caption` - text below the video

**Performance:**
- No iframe on initial load
- `loading="lazy"` + `decoding="async"` on poster image
- `youtube-nocookie.com` domain on embed
- `autoplay=1` injected only after click

#### Cards Grid (`wpacfb/cards-grid`)

Repeater-based responsive card grid.

**Fields (ACF):**
- `section_title` - optional heading
- `cards` (repeater): `image`, `title`, `text`

**Layout:** CSS Grid with `auto-fill` and `minmax(280px, 1fr)`, adapts to any column count without breakpoint overrides.

### Structure

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

### Installation

1. Copy plugin folder to `wp-content/plugins/wp-acf-blocks/`
2. Activate plugin in WordPress admin
3. ACF Pro will auto-sync field groups from `acf-json/`

### Code conventions

- Isolated block styles, no global CSS, no `!important`
- PHP render templates only, no `save()` JS
- `rem` units, base 16px
- Prefixed functions and constants (`wpacfb_`, `WPACFB_`)
- Sanitised output throughout (`esc_html`, `esc_url`, `esc_attr`)
- Atomic commits per block/task

---

## Русский

Кастомные Gutenberg-блоки на ACF Pro Block API v3 и PHP-шаблонах. Без шага сборки.

### Стек

- WordPress 6.5+
- ACF Pro 6.x (Block API v3)
- PHP 8.1+
- Vanilla JS

### Блоки

#### Video Facade (`wpacfb/video-facade`)

YouTube-embed с facade-паттерном. До клика пользователя отображается постер; iframe загружается только по взаимодействию.

**Зачем:** Стандартный YouTube iframe добавляет ~500 KB и несколько сторонних запросов при загрузке страницы, ухудшая LCP и TBT. Этот блок полностью исключает такую нагрузку.

**Поля (ACF):**
- `video_id` - ID видео на YouTube (обязательное)
- `poster_image` - кастомный постер (необязательное, по умолчанию берётся maxresdefault с YouTube)
- `caption` - подпись под видео

**Производительность:**
- Никакого iframe при первой загрузке
- `loading="lazy"` + `decoding="async"` на постере
- Домен `youtube-nocookie.com` для embed
- `autoplay=1` добавляется только после клика

#### Cards Grid (`wpacfb/cards-grid`)

Адаптивная сетка карточек на основе ACF Repeater.

**Поля (ACF):**
- `section_title` - заголовок секции (необязательное)
- `cards` (repeater): `image`, `title`, `text`

**Сетка:** CSS Grid с `auto-fill` и `minmax(280px, 1fr)`, адаптируется под любое количество колонок без медиазапросов.

### Структура

```
wp-acf-blocks/
├── wp-acf-blocks.php        # Точка входа плагина
├── blocks/
│   ├── video-facade/
│   │   ├── block.json       # Метаданные блока (API v3)
│   │   ├── render.php       # PHP-шаблон рендера
│   │   └── style.css        # Изолированные стили блока
│   └── cards-grid/
│       ├── block.json
│       ├── render.php
│       └── style.css
└── acf-json/                # JSON-синхронизация групп полей ACF
    ├── group_video_facade.json
    └── group_cards_grid.json
```

### Установка

1. Скопировать папку плагина в `wp-content/plugins/wp-acf-blocks/`
2. Активировать плагин в админке WordPress
3. ACF Pro автоматически подтянет группы полей из `acf-json/`

### Соглашения по коду

- Изолированные стили блоков, без глобального CSS, без `!important`
- Только PHP render-шаблоны, без `save()` на JS
- Единицы `rem`, базовый размер 16px
- Префикс для функций и констант (`wpacfb_`, `WPACFB_`)
- Экранирование всего вывода (`esc_html`, `esc_url`, `esc_attr`)
- Атомарные коммиты по задачам
