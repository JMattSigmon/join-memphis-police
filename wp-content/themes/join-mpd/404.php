<?php 

get_header();
get_template_part('partials/template-part', 'head');

// Vars
$default = <<<EOT
<p>Sorry, the page you are looking for doesn't exist.</p>
<a class="btn btn-primary" href="/"><i class="fa fa-home" aria-hidden="true"></i> Back to Home</a>
EOT;


$content = get_field('page_content_404', 'option') ?: $default;

echo '<main>';
echo '<article id="not-found">';
echo '<section class="container py-5">';
echo wp_kses_post($content);
echo '</section>';
echo '</article>';
echo '</main>';


get_footer();