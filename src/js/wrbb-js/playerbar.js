jQuery(document).ready(() => {
    jQuery(".play-button--toast").on("click", () => {
        window.open('/playerbar-popup', 'win2',
            'status=no,toolbar=no,scrollbars=no,titlebar=no,menubar=no,width=650,height=302,' +
            'directories=no,location=no');
    });
});

