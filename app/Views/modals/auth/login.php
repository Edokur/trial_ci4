<form class="modal-part" id="modal-login-part">

  <div id="loginErrorMessage" class="alert alert-danger" style="display:none"></div>

  <div class="form-group">
    <label>Username</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-user"></i>
        </div>
      </div>
      <input id="username"
        type="text"
        class="form-control"
        placeholder="Username"
        name="username"
        autocomplete="off" required>
    </div>
  </div>

  <div class="form-group">
    <label>Password</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-lock"></i>
        </div>
      </div>
      <input id="password"
        type="password"
        class="form-control"
        placeholder="Password"
        name="password" required>
    </div>
  </div>

</form>

<script type="text/javascript">
$(document).ready(function(){

  $("#loginModal").fireModal({
      title: 'Login',
      body: $("#modal-login-part"),
      footerClass: 'bg-whitesmoke',
      autoFocus: true,
      onFormSubmit: function(modal, e, form) {
        //form data
        let form_data = $(e.target).serialize();

        $.ajax({
            url: "<?= base_url('auth/valid_login') ?>",
            type: "post",
            data: form_data,
            datatype: "json",
            success: function (xhr, status, statusText) {
                window.location = xhr;
            },
            error: function(xhr, status, statusText) {
                var messages = xhr.responseJSON.messages.error;

                //showing error messages
                $('#loginErrorMessage').show()
                  .html('<i class="fas fa-exclamation-circle"></i> <b>' + statusText + '</b>. ' + messages);
            },
            complete: function() {
                form.stopProgress();
            },
        });

        e.preventDefault();
      },
      shown: function(modal, form) {
        console.log(form)
      },
      buttons: [
        {
          text: 'Login',
          submit: true,
          class: 'btn btn-primary btn-shadow',
          handler: function(modal) {
          }
        }
      ]
  });

});
</script>
