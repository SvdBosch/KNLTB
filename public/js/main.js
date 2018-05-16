$( document ).ready(function() {
    //Delete confirmbox
    $('a[name="delete"]').click(function(e, ) {
        var url = $(this).prop('href');
        e.preventDefault();
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
                console.log('This was logged in the callback: ' + result);
                if (result) {
                    window.location.href = url;
                }
            }
        });
    });

    //Create competition confirmbox
    $('a[name="createCompetition"]').click(function(e) {
        var url = $(this).prop('href');
        var modelMessage = "";
        var competition_id =  $(this).data('competition');

        if (minError) {
            modelMessage = "Let op! er zijn minder dan 4 deelnemers, wilt u doorgaan?";
        } else if (maxError) {
            modelMessage = "Let op! er zijn meer dan 8 deelnemers, wilt u doorgaan?";
        } else {
            modelMessage = "Let op! u staat op het punt om een wedstrijdschema aan te maken.";
        }

        e.preventDefault();
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
                console.log('This was logged in the callback: ' + result);
                if (result) {
                    window.location.href = url + '/' + competition_id ;
                }
            }
        });
    });
});


