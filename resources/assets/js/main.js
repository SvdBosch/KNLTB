$( document ).ready(function() {
    $('button[name="delete"]').on('click', function(e) {
        var $form = $(this).closest('form');
        e.preventDefault();
        $('#confirm').modal({
            backdrop: 'static',
            keyboard: false
        })
            .one('click', '#delete', function(e) {
                $form.trigger('submit');
            });
    });

    console.log('yep');
});