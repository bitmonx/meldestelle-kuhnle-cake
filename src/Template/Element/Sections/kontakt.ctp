<section class="hestia-contact contactus section-image" id="kontakt" data-sorder="hestia_contact" style="background-image: url(img/mk_webseite_bild-6.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-5 hestia-contact-title-area">
                <h2 class="hestia-title">Kontakt</h2>
                <div class="hestia-description">
                    <div class="hestia-info info info-horizontal">
                        <div class="icon icon-primary">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Adresse</h4>
                        </div>
                        <div class="description">
                            <span>EDV Turnierservice</span>
                        </div>
                        <div class="description">
                            <span><?= $user->name ?></span>
                        </div>
                        <div class="description">
                            <span><?= $user->street ?>  <?= $user->house_number ?></span>
                        </div>
                        <div class="description">
                            <span><?= $user->plz ?>  <?= $user->city ?></span>
                        </div>
                        <div class="description">
                            <a href="mailto:<?= $user->email ?>"><?= $user->email ?></a>
                        </div>
                    </div>
                    <div class="hestia-info info info-horizontal">
                        <div class="icon icon-primary">
                            <i class="fa fa-mobile"></i>
                        </div>
                        <div class="description">
                            <h4>

                            </h4>
                            <h4 class="info-title">Telefon</h4>
                        </div>
                        <div class="description">
                            <span><?= $user->name ?></span>
                        </div>
                        <div class="description">
                            <span>+49 (0)<?= $user->prefix ?> <?= $user->mobile ?></span>
                        </div>
                        <div class="description">
                            Mo - Fr, 18:00-20:00
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-md-offset-2 hestia-contact-form-col">
                <div class="card card-contact">
                    <div class="header header-raised header-primary text-center">
                        <h4 class="card-title">Kontaktieren Sie mich</h4>
                    </div>
                    <?= $this->Flash->render('flash', [
                      'element' => 'contact_flash'
                      ]) ?>
                    <div class="content">
                        <div class="pirate_forms_container widget-no" id="pirate_forms_container_default">
                            <div class="pirate_forms_wrap">
                                <?= $this->Form->create($contact, [
                                    'class' => 'pirate_forms form_honeypot-on wordpress-nonce-on pirate-forms-contact-name-on pirate-forms-contact-email-on pirate-forms-contact-subject-on pirate-forms-contact-message-on pirate-forms-captcha-on pirate-forms-contact-submit-on pirate_forms_from_form-on form-group'
                                ]) ?>
<!--                                <form method="post" class="pirate_forms form_honeypot-on wordpress-nonce-on pirate-forms-contact-name-on pirate-forms-contact-email-on pirate-forms-contact-subject-on pirate-forms-contact-message-on pirate-forms-captcha-on pirate-forms-contact-submit-on pirate_forms_from_form-on form-group">-->
                                    <div class="pirate_forms_three_inputs_wrap ">
                                        <div class="col-xs-12 pirate_forms_three_inputs form_field_wrap contact_name_wrap col-xs-12 col-sm-6 contact_name_wrap pirate_forms_three_inputs form_field_wrap">
                                            <div class="form-group label-floating is-empty">
                                                <?=
                                                    $this->Form->control('name', [
                                                        'type' => 'text',
                                                        'class' => 'form-control',
                                                        'id' => 'pirate-forms-contact-name',
                                                        'label' => false,
                                                        'placeholder' => 'Dein Name',
                                                        'oninvalid' => "this.setCustomValidity('Gib deinen Namen ein')",
                                                        'onchange' => "this.setCustomValidity('')",
                                                        'data-cip-id' => 'pirate-forms-contact-name'
                                                    ])
                                                ?>
<!--                                                <input type="text" class="form-control" id="pirate-forms-contact-name" name="name" placeholder="Dein Name" required="" oninvalid="this.setCustomValidity('Gib deinen Namen ein')" onchange="this.setCustomValidity('')" value="" data-cip-id="pirate-forms-contact-name">-->
                                            </div>
                                        </div>
                                        <div class="col-xs-12 pirate_forms_three_inputs form_field_wrap contact_email_wrap col-xs-12 col-sm-6 contact_email_wrap pirate_forms_three_inputs form_field_wrap">
                                            <div class="form-group label-floating is-empty">
                                                <?=
                                                    $this->Form->control('email', [
                                                        'type' => 'email',
                                                        'class' => 'form-control',
                                                        'id' => 'pirate-forms-contact-email',
                                                        'label' => false,
                                                        'placeholder' => 'Dein E-Mail',
                                                        'oninvalid' => "this.setCustomValidity('Gib eine gültige E-Mail Adresse ein')",
                                                        'onchange' => "this.setCustomValidity('')",
                                                        'data-cip-id' => 'pirate-forms-contact-email'
                                                    ])
                                                ?>
<!--                                                <input type="email" class="form-control" id="pirate-forms-contact-email" name="email" placeholder="Deine E-Mail" required="" oninvalid="this.setCustomValidity('Enter valid email')" onchange="this.setCustomValidity('')" value="" data-cip-id="pirate-forms-contact-email">-->
                                            </div>
                                        </div>
                                        <div class="col-xs-12 pirate_forms_three_inputs form_field_wrap contact_subject_wrap col-xs-12 contact_subject_wrap pirate_forms_three_inputs form_field_wrap">
                                            <div class="form-group label-floating is-empty">
                                                <?=
                                                    $this->Form->control('subject', [
                                                        'type' => 'text',
                                                        'class' => 'form-control',
                                                        'id' => 'pirate-forms-contact-subject',
                                                        'label' => false,
                                                        'placeholder' => 'Betreff',
                                                        'oninvalid' => "this.setCustomValidity('Gib bitte einen Betreff ein')",
                                                        'onchange' => "this.setCustomValidity('')",
                                                        'data-cip-id' => 'pirate-forms-contact-subject'
                                                    ])
                                                ?>
<!--                                                <input type="text" class="form-control" id="pirate-forms-contact-subject" name="subject" placeholder="Betreff" required="" oninvalid="this.setCustomValidity('Gib bitte einen Betreff ein')" onchange="this.setCustomValidity('')" value="" data-cip-id="pirate-forms-contact-subject">-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 form_field_wrap contact_message_wrap col-xs-12 contact_message_wrap pirate_forms_three_inputs form_field_wrap">
                                        <div class="form-group label-floating is-empty">
                                            <?=
                                                $this->Form->control('message', [
                                                    'class' => 'form-control',
                                                    'id' => 'pirate-forms-contact-message',
                                                    'rows' => 5,
                                                    'cols' => 30,
                                                    'label' => false,
                                                    'placeholder' => 'Deine Nachricht',
                                                    'oninvalid' => "this.setCustomValidity('Gib deine Frage oder Kommentar ein')",
                                                    'onchange' => "this.setCustomValidity('')"
                                                ])
                                            ?>
<!--                                            <textarea rows="5" cols="30" class="form-control" id="pirate-forms-contact-message" name="message" placeholder="Deine Nachricht" required="" oninvalid="this.setCustomValidity('Gib deine Frage oder Kommentar ein')" onchange="this.setCustomValidity('')"></textarea>-->
                                        </div>
                                    </div>
                                    <!-- <div class="col-xs-12 form_field_wrap form_captcha_wrap col-md-12">
                                        <div id="pirate-forms-captcha" class="g-recaptcha pirate-forms-google-recaptcha" data-sitekey="6Lcb13YUAAAAAJA26s4R6X5NzDZTI5bMMwBlEsEG">
                                            <div style="width: 304px; height: 78px;">
                                                <div>
                                                    <iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Lcb13YUAAAAAJA26s4R6X5NzDZTI5bMMwBlEsEG&amp;co=aHR0cHM6Ly9tZWxkZXN0ZWxsZS1rdWhubGUuZGU6NDQz&amp;hl=de&amp;v=v1543213962382&amp;size=normal&amp;cb=pran0tzai1my" width="304" height="78" role="presentation" name="a-2zakwnaw551b" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox">
                                                    </iframe>
                                                </div>
                                                <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-xs-12 form_field_wrap contact_submit_wrap">
                                        <?= $this->Recaptcha->display() ?>
                                        <br />
                                        <?=
                                            $this->Form->submit('Nachricht senden', [
                                                'class' => 'pirate-forms-submit-button btn btn-primary',
                                                'id' => 'pirate-forms-contact-submit'
                                            ])
                                        ?>
<!--                                        <button type="submit" class="pirate-forms-submit-button btn btn-primary" id="pirate-forms-contact-submit" name="pirate-forms-contact-submit" placeholder="">Nachricht senden</button>-->
                                    </div>
                                    <input type="hidden" id="pirate_forms_ajax" name="pirate_forms_ajax" class="" placeholder="" value="0">
                                <?= $this->Form->end() ?>
<!--                                </form>-->
                                <div class="pirate_forms_clearfix">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
