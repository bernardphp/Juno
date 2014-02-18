Changelog
=========

1.0.x
-----

1.0.2 - 2014-02-18
------------------

 * Use `number` filter when showing message count, pages and page number.
 * Remove `blocks.html.twig` and inline the blocks in `base.html.twig`.
 * Use `ng-href=""` on menu icon to make sure it does not reload page.
 * Fix hover color on `.navbar-toggle`.
 * All templates have been inlined. This reduces XMLHttpRequests and makes the site faster.
 Also it can be cached as a single template by twig.

1.0.1 - 2014-02-05
------------------

 * Use `$rootScope` in DefaultController in order to have dynamic titles.
 * Add `ucfirst` filter to Anguluar.
 * Change template inheritence. Instead of using `@Juno/blocks.html.twig` now extends `@Juno/base.html.twig`.
 * Add `title` block that can be used to override the title used in the header aswell as the title tag.
 * Move documentation from `README.md` into `doc/`.

1.0.0 - 2014-02-04
------------------

 * Initial release.
