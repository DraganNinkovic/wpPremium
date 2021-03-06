<h1>Sunset Sidebar Options</h1>
<?php settings_errors(); ?>
<?php
  $profile_picture = esc_attr(get_option('profile_picture'));
  $firstName = esc_attr(get_option('first_name'));
  $lastName = esc_attr(get_option('last_name'));
  $fullName = $firstName . ' ' . $lastName;
  $user_description = esc_attr(get_option('user_description'));

  $twitter = esc_attr(get_option('twitter_handler'));
  $facebook = esc_attr(get_option('facebook_handler'));
  $instagram = esc_attr(get_option('instagram_handler'));
?>
<div class="sunset-sidebar-preview">
  <div class="sunset-sidebar">
    <div class="image-container">
      <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php echo $profile_picture ?>)"></div>
    </div>
    <h1 class="sunset-username"><?php echo $fullName; ?></h1>
    <h2 class="sunset-description"><?php echo $user_description; ?></h2>
    <div class="icon-wrapper">
      <?php if ($twitter): ?>
        <span class="sunset-icon dashicons-before dashicons-twitter"></span>
      <?php endif; ?>
      <?php if ($facebook): ?>
        <span class="sunset-icon dashicons-before dashicons-facebook-alt"></span>
      <?php endif; ?>
      <?php if ($instagram): ?>
        <span class="sunset-icon dashicons-before dashicons-share"></span>
      <?php endif; ?>
    </div>
  </div>
</div>

<form action="options.php" method="post" class="sunset-general-form">
  <?php settings_fields('sunset-settings-group'); ?>
  <?php do_settings_sections('dragan_sunset'); ?>
  <?php submit_button('Save Changes', 'primary', 'btnSubmit'); ?>
</form>
