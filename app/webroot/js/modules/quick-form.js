/*
Quick Forms
Inline, small scope forms that post and respond in the current context
*/
(function () {
    var form = $('form.quick');
    form.on ('submit', function(ev){

        ev.preventDefault();

        var $form = $(this);

        console.log('Gotcha!', $form);

        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            data: this.data,
        })
        .done(function(response) {
            console.log("success", response);
        })
        .fail(function(response) {
            console.log("error", response);
        })
        .always(function(response) {
            console.log("complete", response);
        });
    	
    });
})();
