jQuery( ".playlistButton" ).click(function() {
	var current = jQuery( this ).text();
	jQuery( ".playlistButton" ).css('background-color', 'LightGray');
	jQuery( this ).css('background-color', 'DarkGray');
	for (i = 1; i <= tableCount; i++) {
		if (i == current) {
			jQuery( "#playlistTable" + i ).show();
		}
		else {
			jQuery( "#playlistTable" + i ).hide();
		}
	}
});
