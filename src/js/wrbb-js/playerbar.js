jQuery(document).ready(() => {
    let isRadiojar = true;
    let popupWidth = isRadiojar ? 650 : 300;
    let popupHeight = isRadiojar ? 300 : 150;
    let openFeatures = 'status=no,toolbar=no,scrollbars=no,titlebar=no,menubar=no,width=' +
        popupWidth + ',height=' + popupHeight + ',directories=no,location=no';

    jQuery(".play-button--toast").on("click", () => {
        window.open('/playerbar-popup', 'win2', openFeatures);
    });
});

