$('#frmSignup').submit(function (e) {
  e.preventDefault();
  
  $.ajax({
    method: "POST",
    url: "../apis/api-signup.php",
    data: $('#frmSignup').serialize(),
    dataType: "text"
  }).
    done(function (data, msg, res) {
      if (res.status === 200) {
        console.log('done', data)
      } else {
        console.log('api not working')
      }
    }).
    fail(function (error) {
      console.log('error', error)
    });
});

