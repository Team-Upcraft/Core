<?php /* Template Name: Verlag_Erstellen_Template */
//@mattia mueggler (head dev) insert logic here
get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php

        if (is_user_logged_in()){
            echo "eingeloggt <br>";
            $user = get_userdata( get_current_user_id());
            $countUserPosts = count_user_posts( get_current_user_id(), $post_type = 'verlage', $public_only = false ); // verlage - get_current_user_id(), $post_type = 'post', $public_only = false
            echo $countUserPosts . "<br>";
            echo ($user->roles[0] . "<br>");
            if ($user->roles[0] == "publisher" && $countUserPosts == 0) {
                echo "verlag";
                echo do_shortcode('[gravityform id="8"]');
            } else {
                echo "kein Verlag oder schon einen Post<br>";
                header("Location: /");
            }
        } else {
            echo "nicht eingeloggt";
            header("Location: /");
        }
        ?>
    </main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>