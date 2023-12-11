


/*Contact Form Validation*/
  $(document).ready(function(){

  $.validator.addMethod("alpha", function(value, element) {
    return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
  });

  var act             = "conatct_form_mail.php";

  $('#book_now').validate({
    submitHandler:function(form)
    {

      var formData = new FormData(form);
      
      var name             = $("#name").val();
      var phone            = $("#phone").val();
      var email            = $("#email").val();
      var service          = $("#service").val();
      var book_date        = $("#book_date").val();
      var message          = $("#message").val();
      

      $.ajax({
        type: $(form).attr('method'),
        url: act,
        data: {
            name: name,
            phone: phone,
            email: email,
            service: service,
            book_date: book_date,
            message: message
          },
        beforeSend: function() {
            $("#errmsg").css("display", "none");
            $("#sending").css("display", "block");
           },
        success : function (response) {
          if(response==1){
            $("#sending").css("display", "none");
            $("#errmsg").css("display", "block");
            $('#book_now')[0].reset();
            return false;
          }
            $("#msg").css("display", "block");
            $("#sending").css("display", "none");
            $("#errmsg").css("display", "none");
            $('#book_now')[0].reset();
            },
      })
    },
    errorElement: 'span',
    errorClass: 'help-block error',
    rules: 
    {
      name:{
          required: true,
          alpha: true
        }, 
      email:{
          required: true,
          email: true
        },
      phone:{
          required: true,
          number: true,
          maxlength:10,
          minlength:10
        },
      book_services:{
          required: true
        }, 
      book_date:{
          required: true
        },
      message:{
          required: true
        }     
    },
    messages: 
    {
      name:{
          required: "Please Enter Name",
          alpha: "Please Enter Only Alphabets"
        }, 
      email:{
          required: "Please Enter Email",
          email: "Please Enter Valid Email"
        },
      phone:{
          required: "Please Enter Mobile",
          number: "Please Enter Valid Mobile Number",
          maxlength: "Mobile Number Length Should Be In Ten Digits",
          minlength:"Mobile Number Length Should Be In Ten Digits"
        },
      book_services:{
          required: "Please Enter Services"
        },
      book_date:{
          required: "Please Enter Date"
        },
      message:{
          required: "Please Enter Messages"
        }          
    }
  });

});


