<?php
$post_link = "https://google.com";

echo "<div id='verlag-preview'><a target='_blank' href='".$post_link."'>";
the_post_thumbnail();
the_title();
echo "<br>";
the_category(" ");
?>
</a></div>
