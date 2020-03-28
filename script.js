(function () {
    'use strict';
    $(() => {
        $('#form-login').submit(function () {
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize()
            }).done(function (data) {
                if (data.success) {
                    window.location.href = '/index.html';
                } else {
                    $('#message').html(data.message);
                }
            }).fail(function () {
                $('body').html("Erreur critique");

            });
            return false;
        })
    })
})();

(function () {
    'use strict';
    $(() => {
        $('#register').click(function () {
            $('#form-login').fadeOut("fast");
            $('#form-reg').fadeIn("slow");
        });
        $('#form-reg').submit(function () {
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize()
            }).done(function (data) {
                if (data.success) {
                    $('#form-reg').fadeOut("fast");
                    $('#form-login').fadeIn("slow");
                } else {
                    $('#message2').html(data.message);
                }
            }).fail(function () {
                $('body').html("Erreur critique");
            });
            return false;
        })
    })
})();