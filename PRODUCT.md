# Product

<!-- impeccable:product-schema 1 -->

## Platform

web

## Users

Primary user: the cook at home deciding what to make. They enter the ingredients they already have and receive a recipe invented around exactly those ingredients — no store run required. This is currently a student/personal project, not yet serving a broad or paying audience.

## Product Purpose

LetMeCook turns whatever ingredients you have on hand into a complete recipe. The user types their available ingredients, an LLM invents a dish that uses them, and returns the steps, cook time, difficulty, and country of origin. Success is a useful, appetizing recipe generated from available ingredients, quickly, without browsing dozens of recipe sites.

## Positioning

The differentiator is "AI from what's on hand": cook from the ingredients you already have, reducing waste and trips to the store — rather than searching by a dish you already decided on. A review or search tool for a named recipe cannot truthfully make this claim.

## Operating Context

Web app (Laravel 11, Blade templates, Tailwind CSS, Vite). Flow: user enters ingredients (free text, comma-separated), the Groq LLM (`llama-3.3-70b-versatile`) generates the recipe, and it is returned as JSON and rendered on the page. Recipe generation is designed to respond in the same language the user wrote the ingredients in (e.g. Arabic, French). Registered users can save favorites and view recipes; there is an admin area for managing categories, ingredients, countries, and recipes.

## Capabilities and Constraints

Confirmed functionality:
- Guest recipe generation (input ingredients, receive AI recipe) at `/what-to-cook`.
- Accounts, profile editing, favorites (add/remove, list).
- Browsing recipes with category filters; recipe detail including optional YouTube video.
- Admin panel: CRUD for categories, ingredients, countries, recipes; admin dashboard.
- Multilingual AI responses honoring the language of the input.

Constraints / open facts:
- `GROQ_API_KEY` is required for generation to work; key is not present in the committed env.
- Image generation for the app is not yet established in this environment.
- Visual direction of the interface is intentionally left undecided (only the name is committed, see Brand Commitments); the current dark cyan/orange "Neural Chef" look is incumbent visual truth but is not a binding commitment.

## Brand Commitments

The product name is **LetMeCook**. No logo, palette, typography, or design language is bound — the name is the only commitment. The existing dark cyan/orange "Neural Chef" AI-generator treatment is incumbent evidence, not a binding identity.

## Evidence on Hand

No marketing copy, testimonials, case studies, press, or proof assets exist in the repository; none should be fabricated. Real, in-code product truth: the routes, controllers, models, views, and the Groq service prompt define the actual behavior described above.

## Product Principles

- Cook with what you have: the recipe must always be built around the user's stated ingredients, never a pre-picked dish.
- The chef speaks your language: match the user's language in every AI response and supporting copy.
- Fast path to a meal: reduce friction from "what's in my kitchen" to "a recipe I can cook now."
- Honesty over invention: never fabricate users, testimonials, brands, or data claims.
- Keep the core simple: generation is the heart; accounts, favorites, and admin are supporting layers, not the point.

## Accessibility & Inclusion

No product-specific accessibility standard or user need has been established. Multilingual response is a confirmed inclusion behavior.
