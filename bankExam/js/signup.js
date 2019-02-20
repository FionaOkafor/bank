$('#frmSignup').submit(function (e) {
  e.preventDefault();
  
  $.ajax({
    method: "POST",
    url: "../apis/api-signup.php",
    data: $('#frmSignup').serialize(),
    dataType: "text"
  }).
    done(function (jData) {
      console.log(jData)
      if (jData.status == 1) {
        console.log('done', jData)
      } else {
        console.log('api not working')
      }
    }).
    fail(function (error) {
      console.log('error', error)
    });
});

