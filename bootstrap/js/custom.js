$(function() {
    $("form[name='ch_form']").validate({
      rules: {
        password: {
        required: true
        }/*,
        conf_password: {
            required: true,
        }*/
      },

      
      messages: {
        password: {
            required: "Please Enter New Password"
        }/*,
        conf_password: {
            required: "Please Enter Confirm Password",
        }*/
      },
      
      submitHandler: function(form) {
        form.submit();
      }
    });
  });;;