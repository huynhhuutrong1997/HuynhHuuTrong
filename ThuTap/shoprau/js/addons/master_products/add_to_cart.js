(function (_, $) {
    /**
     * Copies options into the hidden block near the vendor products' Add to cart button when changing master product
     * options to add a vendor product to the cart with proper options specified.
     */
    $.ceEvent('on', 'ce.product_option_changed_post', function (obj_id, id, option_id, update_ids, form, data, params) {
        var $optionsContainers = $('.ty-sellers-list__options');
        if (!$optionsContainers.length) {
            return;
        }

        $optionsContainers.each(function (j, optionsContainer) {
            var $optionsContainer = $(optionsContainer);

            $optionsContainer.empty();

            for (var i in form) {
                var field = form[i];

                if (!/^product_data\[\d+\]\[product_options\]\[\d+\]/.test(field.name)) {
                    continue;
                }

                var $option = $('<input type="hidden"/>');
                $option.prop('name', field.name);
                $option.val(field.value);

                $optionsContainer.append($option);
            }
        });
    });
})(Tygh, Tygh.$);