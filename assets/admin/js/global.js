OGlobal = {
    show_alert: function (message, type) {
        type = type || 'danger';
        var $alert = $('<div class="alert alert-'+type+' alert-dismissible alert-fixed" role="alert">\
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>\
                            '+message+'\
                        </div>');
        $('.alerts-container').append($alert);

        var timer = setTimeout(function(){
            $alert.remove();
            clearTimeout(timer);
        }, 4000)

    },

    close_alert: function (e) {
        $(this).closest('alert').remove();
    },
};