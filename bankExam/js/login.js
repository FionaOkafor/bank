$('#frmLogin').submit(function(){

    $.ajax({
        method:"POST",
        url:"apis/api-login",
        data:$('#frmLogin').serialize(),
        dataType:"json"
    }).
    done(function(jData){
        if(jData.status == 0) {
            console.log(jData)
            return
        }
        //success
        location.href='profile'

    }).
      fail(function () {
          console.log('error')
      })

      return false
})