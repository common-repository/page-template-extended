=== Page Template Extended ===
Contributors: thomasdk81
Tags: templates, page template, is_page, page, parent, subpage, template hierarchy
Requires at least: 2.5
Tested up to: 4.3
Stable tag: 2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Create templates for a specific page by its ID. Subpages inherit templates from their parent pages.

== Description ==

Create templates for a specific page by its ID.
The reason I made this plugin, was to have subpages inherit their parent pages template.
If the subpage doesn't have a template assigned, the parent pages template will be used if it exists. It goes all the way up the hierarchy.

The plugin works with an infinite number of subpages. If lets say a subpage is 6 levels down.
It will look at the first parent for the template, if it doesn't exist it will look one level up at the next parent.
So you can assign a template for the first level and fifth level. If you do so, level 1-4 would have the same page template and 5-6 a different page template.

If a template is assigned through the page edit screen, it will overwrite this.

== Installation ==

1. Upload the `page-template-extended` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the "Plugins" menu in WordPress.
3. Create a page template in your theme folder (`/themes/theme-name/page-"ID".php`).

== Frequently Asked Questions ==

= Why isn't this already built into WP? =

I don't know. Maybe the demand isn't there.

== Changelog ==
= 2.1 =
Little bug fixing.

= 2.0 september 2015 =
Complete rewrite. Now using the right actions etc. No clutter, no options page.