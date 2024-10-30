<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Mango_Contact_Form
 * @subpackage Mango_Contact_Form/public/partials
 */
?>
<div class="mango-contact-form">
    <div class="mango-form-result success">
        <h1>
          <?php _e("Thank You","mango-contact-form");?>
        </h1>
        <p>
         <?php _e("We will reponse you soon","mango-contact-form");?>
        </p>
        <a href="/">
           <?php _e("Return home","mango-contact-form");?>
        </a>
    </div>
    <div class="mango-form-result error">
        <h1>
          <?php _e(" Opps!!","mango-contact-form");?>
        </h1>
        <p>
          <?php _e("Something goes wron, try again in some minutes;","mango-contact-form");?>
        </p>
        <a href="/">
           <?php _e("Return home","mango-contact-form");?>
        </a>
         <a href="/">
          <?php _e(" Try again","mango-contact-form");?>
        </a>
    </div>
    <form  method="POST"  >
      <?php wp_nonce_field( 'mango_contact_nonce_action', 'mango_contact_nonce_field' ); ?>
      <div class="form-group">
        <label for="Name"><?php _e("Name","mango-contact-form");?></label>
        <input type="text" class="form-control" id=""  name="contact_name"  aria-describedby="nameHelp" placeholder="<?php _e("Enter name","mango-contact-form");?>">
        <small id="nameHelp" class="form-text text-muted"><?php _e("Tell us your name","mango-contact-form");?></small>
      </div>
      <div class="form-group">
        <label for="Email"><?php _e("Email address","mango-contact-form");?></label>
        <input type="email" class="form-control" id="" name="contact_email" aria-describedby="emailHelp" placeholder="<?php _e("Enter email","mango-contact-form");?>">
        <small id="emailHelp" class="form-text text-muted"> <?php _e("We'll never share your email with anyone else.","mango-contact-form");?></small>
      </div>
        <div class="form-group">
        <label for="Phone"><?php _e("Phone","mango-contact-form");?></label>
        <input type="text" class="form-control" id="" name="contact_phone" aria-describedby="phoneHelp" placeholder="<?php _e("Enter phone","mango-contact-form");?>">
        <small id="phoneHelp" class="form-text text-muted"><?php _e("We'll never share your phone with anyone else.","mango-contact-form");?></small>
      </div>

      <div class="form-group">
       <label for="Message"><?php _e("Message","mango-contact-form");?></label>
       <textarea class="form-control" id="messageTextarea" name="contact_message" rows="3" maxlength="512"></textarea>
      </div>
      <button id ="mango-contact-form-submit"  type="submit" disabled class="btn btn-success submit"><?php _e("Submit","mango-contact-form");?></button>
      <div class="loader">
      <?php _e(" Sending","mango-contact-form");?>...
      <div class="spinner"></div>
      </div>
    </form>
</div>

