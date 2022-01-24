$('.btn-success').click(function (e) {
    e.preventDefault();


    $(`input`).removeClass('is-invalid').trigger('reset');


    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val(),
        full_name = $('input[name="full_name"]').val(),
        email = $('input[name="email"]').val(),
        password_confirm = $('input[name="password_confirm"]').val();

    let formData = new FormData();
    formData.append('login', login);
    formData.append('password', password);
    formData.append('password_confirm', password_confirm);
    formData.append('full_name', full_name);
    formData.append('email', email);



    $.ajax({
        url: './rege.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                $('.alert-success').removeClass('none').text(data.message);
                $('input[name="login"]').val('')
                $('input[name="password"]').val(''),
                $('input[name="full_name"]').val(''),
                $('input[name="email"]').val(''),
                $('input[name="password_confirm"]').val('');

            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('is-invalid');

                    });

                }

                $('.alert-danger').removeClass('none').text(data.message);
                $('.invalid-feedback name').removeClass('is-invalid').text('');

            }

        }
    });

});
