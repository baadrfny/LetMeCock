---
name: LetMeCook
description: A modern high-end dark dashboard aesthetic with obsidian charcoal surfaces, a vibrant culinary amber accent, and smooth glassy motion.
colors:
  background: "#0D0D10"
  surface: "#18181C"
  surface-elevated: "#202024"
  border: "#FFFFFF1A"
  amber: "#FF6B00"
  amber-soft: "#FF8A3D"
  amber-deep: "#E85D00"
  white: "#FFFFFF"
  silver: "#9CA3AF"
  silver-muted: "#6B7280"
  success: "#22C55E"
typography:
  display:
    fontFamily: "\"DM Sans\", ui-sans-serif, system-ui, sans-serif"
    fontWeight: 700
    lineHeight: 1.05
    letterSpacing: "-0.02em"
  body:
    fontFamily: "\"DM Sans\", ui-sans-serif, system-ui, sans-serif"
    fontWeight: 400
    lineHeight: 1.6
rounded:
  sm: "10px"
  md: "14px"
  lg: "20px"
  xl: "28px"
components:
  nav:
    background: "rgba(0, 0, 0, 0.4)"
    backdropBlur: "12px"
    borderBottom: "1px solid rgba(255, 255, 255, 0.1)"
  button-primary:
    backgroundColor: "{colors.amber}"
    textColor: "#000000"
    rounded: "{rounded.md}"
    padding: "14px 28px"
  button-primary-hover:
    backgroundColor: "{colors.amber-soft}"
  card:
    backgroundColor: "{colors.surface}"
    textColor: "{colors.white}"
    rounded: "{rounded.lg}"
    border: "1px solid {colors.border}"
  card-hover:
    translateY: "-4px"
    borderColor: "rgba(255, 107, 0, 0.3)"
  input:
    backgroundColor: "{colors.surface}"
    textColor: "{colors.white}"
    rounded: "{rounded.md}"
    border: "1px solid {colors.border}"
---

# Design System: LetMeCook — Dark Glassy Dashboard

## Overview

**Creative North Star: "The Premium Command Center"**

LetMeCook is a modern, high-end dark dashboard: a deep obsidian charcoal stage where recipes and tools glow with intent. The interface is confident, focused, and slightly cinematic — deep matte surfaces, crisp white typography over muted silver, and a single vibrant culinary amber pulse that signals action. Glass, subtle blur, and restrained glow return here as *premium depth*, not noise.

This is a **Confident** system: one committed accent (amber `#FF6B00`) doing real work across primary actions, active states, and key highlights, riding over a dark matte neutral ground. Depth comes from layered obsidian surfaces, hairline translucent borders, and smooth, fast motion.

**Key Characteristics:**
- Deep obsidian ground (`#0D0D10`), never light; a cinematic, focused atmosphere
- Amber as the single dominant action accent, applied to whole fields and active states
- Crisp white titles, muted silver body text, calm high contrast on dark
- Glassmorphism navigation (backdrop blur, translucent black) for a modern sticky header
- Subtle translucent border hairlines and surface layering instead of heavy hard shadows
- Fluid, fast motion: hover lift, fade-ins, and smooth easing across every interactive element
- Asymmetrical card grids and a dynamic 2-column hero for a premium editorial-dashboard feel

## Colors

A dark, culinary-tech palette: vibrant amber over obsidian charcoal neutrals, with soft silver text.

### Primary
- **Amber** (#FF6B00): the brand's energetic accent. Primary buttons, active link states, key highlights, focus rings, and hover borders. Vibrant, appetizing, and confident.
- **Amber Soft** (#FF8A3D): lighter amber for hover/glow states and gradient tails.
- **Amber Deep** (#E85D00): pressed/darker state of amber for active depth.

### Neutral (Dark)
- **Background / Obsidian** (#0D0D10): the app ground. Deep matte charcoal.
- **Surface / Matte Charcoal** (#18181C): cards, panels, inputs, dropdowns.
- **Surface Elevated** (#202024): hovered or stacked surfaces, modals.
- **Border (translucent)** (rgba(255,255,255,0.1)): hairline borders for cards and fields; used as `border-white/10`.
- **White** (#FFFFFF): primary titles and highlights.
- **Silver** (#9CA3AF): secondary/body text.
- **Silver Muted** (#6B7280): tertiary text, placeholders, de-emphasized labels.

### Semantic
- **Success** (#22C55E): positive confirmations and freshness signals.

### Named Rules
**The One Voice Rule.** Amber is the only saturated accent allowed to cover a whole surface area (buttons, fills, active states). Silver and white are neutrals; success green may only appear as small status signals.

**The Glow-Is-Earned Rule.** Glow and blur are reserved for interactive states (hover, focus, active nav) and the sticky glass header — never ambient decoration scattered across static content.

## Typography

**Display Font:** DM Sans 700 (crisp, geometric, modern)
**Body Font:** DM Sans 400/500 (clean, legible)
**Label:** DM Sans 700, uppercase with wide tracking

**Character:** A modern, confident pairing. DM Sans drives both display and body — bold, tight tracking for headlines, steady and legible for UI and copy. The voice is "premium culinary dashboard": sharp, focused, and fast.

### Hierarchy
- **Display** (DM Sans 700, clamp(2.75rem, 8vw, 5.5rem), line-height 1.05, tracking -0.02em): Hero and page headlines; brief, punchy. One or two lines.
- **Headline** (DM Sans 700, 1.75rem, line-height 1.15): Section titles and card titles.
- **Title** (DM Sans 700, 1.25rem, line-height 1.25): Card and component titles.
- **Body** (DM Sans 400, 1rem, line-height 1.6, color silver #9CA3AF): Paragraphs and descriptions. Keep measure to 65–75ch.
- **Label** (DM Sans 700, 0.6875rem, letter-spacing 0.08em, uppercase): Buttons, tags, small metadata, field labels.

### Named Rules
**The Measure Rule.** Body copy never exceeds 75 characters per line; descriptions wrap comfortably.

**The One Display Line Rule.** Display weight is reserved for hero and section-opening lines; operational UI (labels, tags, buttons) stays in regular DM Sans.

## Layout

The spatial model is generous and dashboard-first. Content lives on centered max-width containers (`max-w-7xl` for wide surfaces, narrower for reading) with large gutters. **The hero is a dynamic 2-column layout** on desktop: left column holds the micro-badge, headline, integrated search input with action buttons, and quick-tag suggestions; right column holds a floating interactive visual (recipe highlight / ingredient card stack). Content grids use **asymmetrical, clean card grids** (`grid-cols-1 md:grid-cols-3 gap-6`) rather than full-width blocks. Vertical rhythm is consistent; density leans spacious and focused.

## Navigation

A sleek, **semi-transparent sticky glassmorphism header**: `backdrop-blur-md bg-black/40 border-b border-white/10`. Brand logo aligned left, primary navigation links centered, user profile/actions grouped cleanly on the right. Active link uses amber underline/text; the user dropdown uses the matte charcoal surface with translucent borders.

## Elevation & Depth

Dark, layered depth: the obsidian ground (`background`) sits under matte charcoal surfaces (`surface`), separated by translucent hairline borders (`border-white/10`). Elevation is expressed as **sticky glass, hover lift, and subtle shadows** — never heavy drop shadows. Interactive cards rise with `hover:-translate-y-1`, an amber border (`hover:border-orange-500/30`), and a soft amber-tinted shadow (`hover:shadow-lg hover:shadow-orange-500/5`).

### Named Rules
**The Lift-On-Hover Rule.** Cards and interactive elements lift on hover (`-translate-y-1`, amber border tail, soft amber shadow) and settle back smoothly. Nothing is static-heavy; all interactivity moves with `transition-all duration-300 ease-in-out`.

## Motion & Micro-Interactions

- **Transitions:** `transition-all duration-300 ease-in-out` across buttons, links, cards, and inputs.
- **Hover elevation:** cards `hover:-translate-y-1 hover:border-orange-500/30 hover:shadow-lg hover:shadow-orange-500/5`.
- **Fade-in:** hero text, sections, and recipe-generation loading states slide/fade in smoothly (`animate-fade-up`, staggered delays).
- **Focus:** 2px amber focus ring with offset; never rely on color alone.
- **Loading:** the AI recipe generator shows a smooth fade/spin state (`animate-pulse`, rotating loader) instead of a harsh swap.

## Shapes

Cards and major containers use generous radii (`xl`, ~28px); inputs and buttons use medium radii (`md`, ~14px); small pills/tags use full rounding. Consistent, modern, slightly sharp-but-friendly corners across the system.

## Components

### Buttons
- **Primary (amber):** amber fill, black text (DM Sans 700 uppercase tracked). Hover shifts to amber-soft; pressed to amber-deep. Padding ~14px 28px.
- **Secondary:** matte charcoal surface (`surface`) fill, white text, `border-white/10`. Hover brightens the surface.
- **Ghost/Text:** transparent, silver text; hover brightens to white or amber. Tertiary/inline actions.
- **Focus:** 2px amber focus ring with 2px offset.

### Chips / Tags
- **Style:** `bg-white/5` fill with `border-white/10` border; silver text; DM Sans 700 uppercase tracked, small.
- **State:** active/filtered chip uses amber fill with black text; inactive uses the translucent neutral.

### Cards / Containers
- **Corner Style:** generous radius (~20–28px).
- **Background:** matte charcoal (`surface` #18181C) `border border-white/5` (or `/10`).
- **Shadow Strategy:** flat at rest; soft amber-tinted lift on hover.
- **Internal Padding:** comfortable, ~24–40px depending on size.

### Inputs / Fields
- **Style:** matte charcoal (`surface`) fill, 1px `border-white/10`, `md` radius; comfortable padding.
- **Focus:** 2px amber focus ring, amber caret.
- **Error / Disabled:** error uses a red-toned border + message; disabled uses muted fill + reduced opacity.

### Hero (welcome)
- **Left column:** micro-badge "AI Assistant", concise headline, prominent search/ingredient input bar with integrated action buttons, quick-tag suggestions below.
- **Right column:** floating interactive visual — a recipe-highlight card or ingredient stack, layered and slightly overlapping, with a soft amber glow.

### Recipe Cards (dashboard, favorites)
- Matte charcoal surface, translucent border. Image region on top with a subtle dark gradient to the surface. Category as a translucent chip, cook-time/level as tracked labels, recipe name in DM Sans 700. A "View Recipe" affordance goes amber on hover. Heart uses amber when active, silver outline when not.

### Stat Panels (recipe index, admin)
- Matte charcoal cards with a small amber icon tile, a tracked label, and a white display number. Emphasis from size and weight, with a quiet amber accent.

## Do's and Don'ts

### Do:
- **Do** build on the obsidian (`#0D0D10`) ground with matte charcoal (`#18181C`) cards — the color step is the depth.
- **Do** use amber (`#FF6B00`) as the single dominant action color; apply it to whole buttons, active states, and key highlights.
- **Do** set titles in white (`#FFFFFF`) and body text in silver (`#9CA3AF`).
- **Do** use the sticky glassmorphism nav (`backdrop-blur-md bg-black/40 border-b border-white/10`).
- **Do** keep the 2-column hero (static copy/tools left, floating visual right) and asymmetrical `md:grid-cols-3` content grids.
- **Do** animate interactivity: `transition-all duration-300 ease-in-out`, hover lift on cards, and fade-in for hero text and loading states.

### Don't:
- **Don't** use light/cream surfaces or the old warm terracotta palette anywhere — the move to dark obsidian + amber is the entire point of this system.
- **Don't** use cyan at all; it was retired with the earlier theme.
- **Don't** scatter glow as ambient decoration; glow and blur are earned by interactive states and the glass header.
- **Don't** rely on heavy hard drop shadows for depth; use surface layering, translucent borders, and soft amber-tinted hover shadows.
- **Don't** fill the screen edge-to-edge with content; containers stay centered with generous gutters.
