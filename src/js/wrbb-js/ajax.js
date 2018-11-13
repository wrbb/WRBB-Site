var state = history.state;

//for when they click on an ajax link
jQuery('a').on('click', function(e){
    var $this = jQuery(this);
    var href = $this.attr('href'); // use the href value to determine what content to ajax in
    jQuery.ajax({
        url: href , // create the necessary path for our ajax request
        dataType: 'html',
        success: function(data) {
            var body = jQuery(jQuery.parseHTML(data)).filter('.wrapper').html();
            console.log(body);
            jQuery('.wrapper').html(body); // place our ajaxed content into our content area
            history.pushState(null,href, href); // change the url and add our ajax request to our history
        }
    });
    e.preventDefault(); // we don't want the anchor tag to perform its native function
});

//for when they hit the back button
jQuery(window).on('statechange', function(){
    state = history.state; // find out what we previously ajaxed in
    jQuery.ajax({
        url: state.title, //create our path
        dataType: 'html',
        success: function(data) {
            jQuery('wrapper').html(data);
        }
    });
});
