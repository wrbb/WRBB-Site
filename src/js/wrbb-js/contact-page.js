function make_popup(name, title, email, imageLink) {
    return `<div class="col-3">
                    <div class="text-center">
                        <img src="/wp-content/themes/WRBB-Site/src/img/${imageLink ? imageLink : "NotFound.jpg"}" class="img-size"  alt="${name}" />
                    </div>
                <div class="row justify-content-center">
            <div class="col-12">
                ${name}
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
    </div>
    <div class="col-3">
    <div class="text-center">
    <img src="/wp-content/themes/WRBB-Site/src/img/Andrew.jpg" class="img-size" alt="Andrew Goldberg" />
    </div>`;
}

redesign = [
    {
        name: "Eli Olson",
        email: "olson.e@husky.neu.edu",
        title: "Redesign Developer"
    },
    {
        name: "Eli Olson",
        email: "olson.e@husky.neu.edu",
        title: "Redesign Developer"
    },
    {
        name: "Eli Olson",
        email: "olson.e@husky.neu.edu",
        title: "Redesign Developer"
    },
    {
        name: " ",
        email: "olson.e@husky.neu.edu",
        title: "Redesign Developer"
    },
    {
        name: "Austina lin",
        email: "olson.e@husky.neu.edu",
        title: "Redesign Developer"
    },
];

function createTeam(row_num, team) {
    let html = `<div class="row justifty-content-center padding-top-bottom team-members">`;
    var i = 0;
    team.forEach(function (member) {
        if(i % 4 == 0) {
            html = html.concat(`</div><div class="row justifty-content-center padding-top-bottom team-members\">`);
        }
        html = html.concat(make_popup(member.name, member.title, member.email, member.imageLink));
        i++;
    });
    jQuery('#contact_row_' + row_num).append(html.concat("</div>"));
}


('#mediaTeamDropDown').click(() => createTeam(1,redesign));

console.log('hello!');