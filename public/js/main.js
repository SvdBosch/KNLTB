// Only start code if document is loaded
$( document ).ready(function() {
    /**
    * Bootbox plugin for delete Confirmbox
    */
    $('a[name="delete"]').click(function(e, ) {
        e.preventDefault();

        // Get the url of clicked button
        var url = $(this).prop('href');

        // Bootstrap bootbox plugin
        bootbox.confirm({
            message: "Weet u het zeker?",
            buttons: {
                confirm: {
                    label: 'Verwijder',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Annuleer',
                    className: ''
                }
            },
            callback: function (result) {
                // Based on click from user else the modal gets closed automatically
                if (result) {
                    window.location.href = url;
                }
            }
        });
    });

    /**
     * Bootbox plugin for Competition Confirmbox
     *
     * @param  bool minError
     * @param  bool maxError
     */
    $('a[name="createCompetition"]').click(function(e) {
        e.preventDefault();

        // Get
        var url = $(this).prop('href');
        var modelMessage = "";
        var competition_id =  $(this).data('competition');

        // Set the message based on settet
        if (minError) {
            modelMessage = "Let op! er zijn minder dan 4 deelnemers, wilt u doorgaan?";
        } else if (maxError) {
            modelMessage = "Let op! er zijn meer dan 8 deelnemers, wilt u doorgaan?";
        } else {
            modelMessage = "Let op! u staat op het punt om een wedstrijdschema aan te maken.";
        }


        // Bootstrap bootbox plugin
        bootbox.confirm({
            message: modelMessage,
            buttons: {
                confirm: {
                    label: 'Doorgaan',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Annuleer',
                    className: ''
                }
            },
            callback: function (result) {
                // Based on click from user else the modal gets closed automatically
                if (result) {
                    window.location.href = url + '/' + competition_id ;
                }
            }
        });
    });
});


