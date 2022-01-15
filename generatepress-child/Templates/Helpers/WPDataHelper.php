<?php
/*hilft verlage anzuzeigen */
class WPDataHelper{

    public function getCategories(){
        $categories = get_categories();
        return $categories;
    }
}

?>
