jQuery(document).ready(function($){

  var mediaUploader;

  $('#upload-button').on('click', function(event){
    event.preventDefault();
    if(mediaUploader){
      mediaUploader.open();
      return;
    }

    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose a Profile Picture',
      button: {
        text: 'Choose picture'
      },
      multiple: false
    });

    mediaUploader.on('select', function(){
      attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#profile-picture').val(attachment.url);
      $('#profile-picture-preview').css('background-image', 'url(' + attachment.url + ')');
    });

    mediaUploader.open();

  });

  $('#remove-button').on('click', function(event) {
    event.preventDefault();
    var confirmation = confirm("Are you sure you want to remove your picture?");
    if(confirmation == true){
      $('#profile-picture').val('');
      $('#profile-picture-preview').css('background-image', 'url()');
      // force submit
      // $('.sunset-general-form').submit();
    }
    return;
  });

});
