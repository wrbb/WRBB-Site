function make_popup(name, title, email) {
    return `
    <div class="col-12 col-sm-6 col-lg-3 padding-top-bottom">
        <div class="row justify-content-center">
            <div class="col-12">
                <p class="font-weight-bold contact-name" >${name}</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                ${title}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="mailto:${email}">${email}</a>
            </div>
        </div>
    </div>`;
}

const TEAMS = ["Redesign", "Marketing", "Media", "Technical", "Operations", "Podcast", "Events", "Programming", "Sports"];

function createTeamModal(team, teamName) {
    let html = 
        `<div class="modal-header">
            <h5 class="modal-title" id="contactModalLabel">${teamName}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <div class="modal-body">
<div class="row justifty-content-center team-members">`;

    let i = 0;
    team.forEach(function (member) {
        if(i % 4 == 0 && i !== 0) {
            html = html.concat(`</div><div class="row justifty-content-center team-members">`);
        }
        html = html.concat(make_popup(member.name, member.title, member.email));
        i++;
    });

    if(jQuery('.modal-header').length) {
        jQuery('.modal-header').remove();
        jQuery('.modal-body').remove();
    }
    jQuery('#contact-modal-content').append(html.concat("</div></div>"));
}

function createTeamModals() {
    TEAMS.forEach((team) => {
        jQuery.getJSON(`/wp-content/themes/WRBB-Site/src/teams/${team.toLowerCase()}.json`, (json) => {
            jQuery(`#${team.toLowerCase()}TeamDropDown`).click(() => createTeamModal(json, team));
        });
    });
}

jQuery('document').ready(function() {createTeamModals();});


