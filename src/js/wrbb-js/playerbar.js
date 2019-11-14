jQuery(document).ready(() => {
    jQuery(".play-button--toast").on("click", () => {
        window.open('/wordpress/playerbar-popup', 'win2',
            'status=no,toolbar=no,scrollbars=no,titlebar=no,menubar=no,width=300,height=150,' +
            'directories=no,location=no');
    });
});

