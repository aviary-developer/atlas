$(document).on("ready", function () {
    $("#new-lectivo").on("click", function (e) {
        e.preventDefault();
        alert("Algo");
        var notice = new PNotify({
            text: $('#form_notice').html(),
            icon: false,
            width: 'auto',
            hide: false,
            buttons: {
                closer: false,
                sticker: false
            },
            insert_brs: false
        });
        notice.get().find('form.pf-form').on('click', '[name=cancel]', function () {
            notice.remove();
        }).submit(function () {
            var username = $(this).find('input[name=username]').val();
            if (!username) {
                alert('Please provide a username.');
                return false;
            }
            notice.update({
                title: 'Welcome',
                text: 'Successfully logged in as ' + username,
                icon: true,
                width: PNotify.prototype.options.width,
                hide: true,
                buttons: {
                    closer: true,
                    sticker: true
                },
                type: 'success'
            });
            return false;
        });
    });
});
