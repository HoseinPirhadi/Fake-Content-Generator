jQuery(document).ready(function($) {
    function toggleSections(selectedType) {
        $('#post_options, #product_options').hide();
        $('#' + selectedType + '_options').show();
    }

    $('#content_type').on('change', function() {
        toggleSections($(this).val());
    });

    // Initial trigger to show the appropriate section
    $('#content_type').trigger('change');

    // Switch content type selection
    $('.fcg-switch-option').on('click', function() {
        var value = $(this).data('value');
        $('.fcg-switch-option').removeClass('active');
        $(this).addClass('active');
        $('#content_type_input').val(value);
        $('.fcg-switch-slider').toggleClass('product', value === 'product');
        toggleSections(value);
    });
}); 