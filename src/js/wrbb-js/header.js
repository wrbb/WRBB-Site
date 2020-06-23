jQuery(document).ready(() => {
    jQuery(".nav-item").on({
        mouseenter: function() {
            let dropdown_id = this.id
            jQuery(".dropdown-toggle#" + dropdown_id).toggleClass('selected');
            jQuery(".nav-item#" + dropdown_id).css("background-color", "#d30f0f");
            jQuery(".dropdown-content#" + dropdown_id).css("display", "inherit");
        },
        mouseleave: function() {
            let dropdown_id = this.id;
            jQuery(".dropdown-toggle#" + dropdown_id).toggleClass('selected');
            jQuery(".nav-item#" + dropdown_id).css("background-color", "transparent");
            jQuery(".dropdown-content#" + dropdown_id).css("display", "none");
        }
    });
});