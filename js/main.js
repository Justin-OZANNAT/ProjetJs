(function () {
    'use strict';
    $(()=> {
        $.ajax({
            url: 'php/is_connected.php',
            method: 'get'
        }).done(function (data) {
            if (data.success) {
                $('body').append(
                    $('<button />')
                        .html('Déconnexion')
                        .on ('click', function () {
                            $.ajax({
                                url: 'php/logout.php',
                                method: 'get'
                            }).done(function () {
                                window.location.href = 'login.html';
                            })
                        })
                )
            } else {
                window.location.href = 'login.html'
            }
        }).fail(function () {
            $('body').html('Une erreur critique est arrivée.')
        })
    })
}) ();