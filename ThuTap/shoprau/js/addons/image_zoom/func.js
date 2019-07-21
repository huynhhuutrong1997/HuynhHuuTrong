(function(_, $) {

    function getRetinaImagePath (small_image_path) {
        if (/@2x\./.test(small_image_path)) {
            return false;
        }
        var retina_image = new RetinaImagePath(small_image_path);
        return retina_image.at_2x_path;
    }

    $.ceEvent('on', 'ce.retina.img_load', function (img_elm) {
        var cloud_zoom = $(img_elm).data('CloudZoom'),
            retina_image_path;

        if (cloud_zoom) {
            retina_image_path = getRetinaImagePath(cloud_zoom.options.zoomImage);

            if (retina_image_path) {
                cloud_zoom.options.zoomImage = retina_image_path;
                cloud_zoom.loadImage($(img_elm).prop('src'), retina_image_path);
                cloud_zoom.refreshImage();
            }
        } else {
            var $parent = $(img_elm).closest('.cm-previewer');

            if ($parent.length) {
                retina_image_path = getRetinaImagePath($parent.prop('href'));

                if (retina_image_path) {
                    $(img_elm).data('caZoomImagePath', retina_image_path);
                }
            }
        }
    });

}(Tygh, Tygh.$));