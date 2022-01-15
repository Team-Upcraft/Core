jQuery(document).ready(function () {
  jQuery( "#control-elements" ).load( "/core-custom-components/verlage-controls.html", function() {
    /*append dropdown */
    appendCategory('#current-kategorie');


    /*change cateogry */
    jQuery('#current-kategorie').change(function() {
      var category = jQuery(this).val();
      jQuery.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        dataType: 'html',
        data: {
          action: 'filter_verlage',
          category: category,
        },
        success: function(res) {
          jQuery('#verlage').html(res);
        }
      })

    });
  });
});

function appendCategory(selectID){
  jQuery.ajax({
    type: 'POST',
    url: '/wp-admin/admin-ajax.php',
    dataType: 'html',
    data: {
      action: 'getCategories',
    },
    success: function(res) {
      var mySelect = jQuery(selectID);
      jQuery(mySelect).html(res);
    }
  })
}

