<?php
/**
 * Template Name: Contact
 * The template for the playerbar located on the bottom of the screen
 *
 * @package understraps
 */
?>

<div class="padding-top-bottom" xmlns="http://www.w3.org/1999/html">
    <h2 id="contact-header"><span>contact us.</span></h2>
</div>
<div class="container">
    <div class="row justify-content-center padding-top-bottom_small">
        <div class="col-10">
            <p class="contact-text">Hey! We’d love to hear from you. If you have someone you specifically want to reach out to, look below for e-board emails! If not, we'd love to hear your general shoutout!</p>
        </div>
    </div>
    <form>
        <div class="row justify-content-center padding-top-bottom_small">
            <div class="col-5">
                <label for="firstNameInput">First name:</label>
                <input type="text" class="form-control input-black-border" id="firstNameInput" aria-describedby="firstNameHelp">
            </div>
            <div class="col-5">
                <label for="firstNameInput">Last name:</label>
                <input type="text" class="form-control input-black-border" id="lastNameInput" aria-describedby="lastNameHelp">
            </div>
        </div>
        <div class="row justify-content-center padding-top-bottom_small">
            <div class="col-10">
                <label for="emailInput">Email:</label>
                <input type="email" class="form-control input-black-border" id="emailInput" aria-describedby="emailInputHelp">
            </div>
        </div>
        <div class="row justify-content-center padding-top-bottom_small">
            <div class="col-10">
                <label for="contactInput">Whats on your mind?</label>
                <textarea class="form-control input-red-border" id="contactInput" rows="5"></textarea>
            </div>
        </div>
        <div class="row justify-content-center padding-top-bottom">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <div class="row justify-content-center padding-top-bottom">
        <div class="col-5 text-justify">
            <h2 class="contact-header text-center">2018 eboard.</h2>
        </div>
    </div>
    <div id="contact_row_1" class="row justify-content-center" >
        <div class="col-12 col-sm-6 col-lg-3 padding-top-bottom">
            <div class="text-center">
                <img src="/wp-content/themes/WRBB-Site/src/img/Parker.jpg" class="img-size"  alt="Parker Brown" />
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Parker Brown
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    General Manager
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <a href="mailto:parker@wrbbradio.org">parker@wrbbradio.org</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 padding-top-bottom">
            <div class="text-center">
                <img src="/wp-content/themes/WRBB-Site/src/img/Andrew.jpg" class="img-size" alt="Andrew Goldberg" />
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Andrew Goldberg
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Program Director
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <a href="mailto:andrew@wrbbradio.org">andrew@wrbbradio.org</a>
                </div>
            </div>
            <div class="row">
                <div data-toggle="modal" data-target="#contact-modal" class="dropDown col-12" id='programmingTeamDropDown' class="col-12">
                    Programming team <i class="far fa-window-restore red-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 padding-top-bottom">
            <div class="text-center">
                <img src="/wp-content/themes/WRBB-Site/src/img/Catu.jpg" class="img-size" alt="Catu Beretta" />
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Catu Beretta
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Technical Director
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <a href="mailto:catu@wrbbradio.org">catu@wrbbradio.org</a>
                </div>
            </div>
            <div class="row">
                <div data-toggle="modal" data-target="#contact-modal" class="dropDown col-12" id='technicalTeamDropDown' class="col-12">
                    Technical team <i class="far fa-window-restore red-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 padding-top-bottom">
            <div class="text-center">
                <img src="/wp-content/themes/WRBB-Site/src/img/Dan.jpg" class="img-fluid" alt="Dan Lim" />
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                Dan Lim
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Marketing Director (Interim)
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <a href="mailto:dan@wrbbradio.org">dan@wrbbradio.org</a>
                </div>
            </div>
            <div class="row">
                <div data-toggle="modal" data-target="#contact-modal" class="dropDown col-12" id='maretingTeamDropDown' class="col-12">
                    Marketing team <i class="far fa-window-restore red-icon"></i>
                </div>
            </div>
        </div>
    </div>
    <div id="contact_row_2" class="row justify-content-center" >
        <div class="col-12 col-sm-6 col-lg-3 padding-top-bottom">
            <div class="text-center">
                <img src="/wp-content/themes/WRBB-Site/src/img/Brooke.jpg" class="img-fluid" alt="Brooke Baumgardner" />
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Brooke Baumgardner
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Music Director
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <a href="mailto:brooke@wrbbradio.org">brooke@wrbbradio.org</a>
                </div>
            </div>
            <div class="row">
                <div data-toggle="modal" data-target="#contact-modal" class="dropDown col-12" id='mediaTeamDropDown' class="col-12">
                    Media team <i class="far fa-window-restore red-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 padding-top-bottom">
            <div class="text-center">
                <img src="/wp-content/themes/WRBB-Site/src/img/NotFound.jpg" class="img-size"  alt="Vic Specht" />
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Vic Specht
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Operations Director
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <a href="mailto:vic@wrbbradio.org">vic@wrbbradio.org</a>
                </div>
            </div>
            <div class="row">
                <div data-toggle="modal" data-target="#contact-modal" class="dropDown col-12" id='operationsTeamDropDown' class="col-12">
                    Operations team <i class="far fa-window-restore red-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 padding-top-bottom">
            <div class="text-center">
                <img src="/wp-content/themes/WRBB-Site/src/img/NotFound.jpg" class="img-size" alt="Craig Short" />
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Craig Short
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Events Director
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <a href="mailto:craig@wrbbradio.org">craig@wrbbradio.org</a>
                </div>
            </div>
            <div class="row">
                <div data-toggle="modal" data-target="#contact-modal" class="dropDown col-12" id='eventsTeamDropDown' class="col-12">
                    Events team <i class="far fa-window-restore red-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 padding-top-bottom">
            <div class="text-center">
                <img src="/wp-content/themes/WRBB-Site/src/img/NotFound.jpg" class="img-size" alt="Ben Harold" />
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Ben Harold
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Podcast Director
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <a href="mailto:ben@wrbbradio.org">ben@wrbbradio.org</a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div data-toggle="modal" data-target="#contact-modal" class="dropDown col-12" id='podcastTeamDropDown' class="col-12">
                    Podcast team <i class="far fa-window-restore red-icon"></i>
                </div>
            </div>
        </div>
    </div>
    <div id="contact_row_4" class="row justify-content-center" >
        <div class="col-12 col-sm-6 col-lg-3 padding-top-bottom">
            <div class="text-center">
                <img src="/wp-content/themes/WRBB-Site/src/img/NotFound.jpg" class="img-size"  alt="Bryce Thuilot" />
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Bryce Thuilot
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Webmaster 🧙
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <a href="mailto:bryce@wrbbradio.org">bryce@wrbbradio.org</a>
                </div>
            </div>
            <div class="row">
                <div data-toggle="modal" data-target="#contact-modal" class="dropDown col-12" id='redesignTeamDropDown' class="col-12">
                    Redesign team <i class="far fa-window-restore red-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 padding-top-bottom">
            <div class="text-center">
                <img src="/wp-content/themes/WRBB-Site/src/img/NotFound.jpg" class="img-size" alt="Matt MacCormack" />
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Matthew MacCormack
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Sports Director
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <a href="mailto:matt@wrbbradio.org">matt@wrbbradio.org</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 padding-top-bottom">
            <div class="text-center">
                <img src="/wp-content/themes/WRBB-Site/src/img/NotFound.jpg" class="img-size" alt="Justin Littman" />
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Justin Littman
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Sports Director
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <a href="mailto:justin@wrbbradio.org">justin@wrbbradio.org</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 padding-top-bottom">
            <div class="text-center">
                <img src="/wp-content/themes/WRBB-Site/src/img/NotFound.jpg" class="img-fluid" alt="Michael Petillo" />
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Michael Petillo
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    Finance Director
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <a href="mailto:michael@wrbbradio.org">michael@wrbbradio.org</a>
                </div>
            </div>
        </div>
        </div>
        <div class="modal fade" id="contact-modal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="contact-modal-content">
            </div>
        </div>
    </div>
</div>
