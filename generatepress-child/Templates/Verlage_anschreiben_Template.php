<?php /* Template Name: Verlage_anschreiben_Template */
//@mattia mueggler (head dev) insert logic here
get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php

        if (is_user_logged_in()){
            echo "eingeloggt <br>";
            echo "verlage anschreiben funktioniert";
            echo do_shortcode('[gravityform id="5"]');
        } else {
            echo "nicht eingeloggt";
            header("Location: /");
        }
        ?>
    </main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>