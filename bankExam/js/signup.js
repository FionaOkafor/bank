

$('#frmSignup').submit(function () {

    $.ajax({
        method: "POST",
        url: "../apis/api-signup",
        data: $('#frmSignup').serialize(),
        dataType: "json"
    }).
    done(function (jData) {
        console.log(jData)
        if (jData.status == 1) {
         console.log('done', jData)
        } else {
             console.log('api not working')
        }
    }).
    fail(function () {
        console.log('error')
    })



    return false;
})

