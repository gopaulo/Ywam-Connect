$ = jQuery;


jQuery(document).ready(function(ev){
  jQuery('[rel="tooltip"]').tooltip();
  
});
jQuery('.sidebar').affix({
    offset: {
      top: 50
    , bottom: function () {
        return (this.bottom = jQuery('.bs-footer').outerHeight(true))
      }
    }
  })