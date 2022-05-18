<?php
/**
 * Title: Sample block pattern
 * Slug: ip/sample-block-pattern
 * Categories: text
 */
?>
<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}},"spacing":{"padding":{"top":"100px","right":"100px","bottom":"100px","left":"100px"}}},"backgroundColor":"vivid-red","textColor":"background","layout":{"inherit":false}} -->
<div class="wp-block-group alignfull has-background-color has-vivid-red-background-color has-text-color has-background has-link-color" style="padding-top:100px;padding-right:100px;padding-bottom:100px;padding-left:100px"><!-- wp:heading -->
<h2>This is a sample block pattern</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>WordPress 6.0 supports the automatic registration of block patterns placed in the <code>patterns/</code> directory of your theme. </p>
<!-- /wp:paragraph -->

<!-- wp:list {"ordered":true} -->
<ol><li>Create a PHP file with a comment header including the Title, Slug, and Categories for the pattern</li><li>Paste your block pattern code from the editor</li><li>Customize with PHP code as necessary</li></ol>
<!-- /wp:list --></div>
<!-- /wp:group -->