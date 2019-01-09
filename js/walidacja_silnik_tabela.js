$('.table tbody tr').click(function(event) {
    if (event.target.type !== 'radio') {
        $(':radio', this).trigger('click');
    }
});