/*
    Авторизация
 */

$('.btn-success').click(function (e) {
    e.preventDefault();
    $(`input`).removeClass('is-invalid');

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        url: './vxod.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success (data) {

            if (data.status) {
                document.location.href = './profile.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('is-invalid');

                           });
                }

                $('.msg').removeClass('none').text(data.message);
                $('.invalid-feedback').removeClass('is-invalid').text('Введите данные');


            }

        }
    });

});

