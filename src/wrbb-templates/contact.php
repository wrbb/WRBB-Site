<?php
/**
 * Contact Page
 *
 * @author Bryce Thuilot
 * @author Spencer LaChance
 * @package understraps
 */

$json_str = file_get_contents( __DIR__ . "/../teams/eboard.json" );
$eboard_json = json_decode($json_str, true);

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<div class="wrapper" id="full-width-page-wrapper">
    <div class="<?php echo esc_attr($container); ?>" id="content">
        <hr class="header-line">
        <h2 class="entry-header"><span class="article-title">contact us.</span></h2>

<!--        <div class="row justify-content-center padding-top-bottom_small">-->
<!--            <div class="col-10">-->
<!--                <p class="contact-text">-->
<!--                    Hey! We’d love to hear from you. If you have someone you specifically want to-->
<!--                    reach out to, look below for e-board emails! If not, we'd love to hear your-->
<!--                    general shoutout!-->
<!--                </p>-->
<!--            </div>-->
<!--        </div>-->
<!--        <form>-->
<!--            <div class="row justify-content-center padding-top-bottom_small">-->
<!--                <div class="col-5">-->
<!--                    <label for="firstNameInput">First name:</label>-->
<!--                    <input type="text" class="form-control input-black-border" id="firstNameInput" aria-describedby="firstNameHelp">-->
<!--                </div>-->
<!--                <div class="col-5">-->
<!--                    <label for="firstNameInput">Last name:</label>-->
<!--                    <input type="text" class="form-control input-black-border" id="lastNameInput" aria-describedby="lastNameHelp">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="row justify-content-center padding-top-bottom_small">-->
<!--                <div class="col-10">-->
<!--                    <label for="emailInput">Email:</label>-->
<!--                    <input type="email" class="form-control input-black-border" id="emailInput" aria-describedby="emailInputHelp">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="row justify-content-center padding-top-bottom_small">-->
<!--                <div class="col-10">-->
<!--                    <label for="contactInput">Whats on your mind?</label>-->
<!--                    <textarea class="form-control input-red-border" id="contactInput" rows="5"></textarea>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="row justify-content-center padding-top-bottom">-->
<!--                <button type="submit" class="btn btn-primary">Submit</button>-->
<!--            </div>-->
<!--        </form>-->

        <div class="row justify-content-center padding-top-bottom">
            <div class="col-5 text-justify">
                <h2 class="contact-header text-center">2023 eboard.</h2>
            </div>
        </div>
        <div class="row text-center">
            <?php foreach ($eboard_json as $member) : ?>
                <div class="col-12 col-sm-6 col-lg-3 padding-top-bottom">
                    <?php if ($member["photo"]) : ?>
                        <div class="text-center">
                            <img src="<?php echo $member["photo"] ?>" class="img-size" alt="<?php echo $member["name"] ?>" />
                        </div>
                    <?php endif; ?>
                    <div class="font-weight-bold">
                        <?php echo $member["name"] ?>
                    </div>
                    <div>
                        <?php echo $member["position"] ?>
                    </div>
                    <div>
                        <a href="mailto:<?php echo $member["email"] ?>">
                            <?php echo $member["email"] ?>
                        </a>
                    </div>
                    <?php if ($member["team"]) : ?>
                        <div
                            data-toggle="modal"
                            data-target="#contact-modal"
                            class="dropDown"
                            id='<?php echo strtolower($member["team"]) ?>TeamDropDown'
                        >
                            <?php echo $member["team"] ?> team <i class="far fa-window-restore red-icon"></i>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="modal fade" id="contact-modal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">>
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" id="contact-modal-content"></div>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>
