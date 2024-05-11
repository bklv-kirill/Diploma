import $ from 'jquery';

$(document).ready(function () {
    initMap();

    async function initMap() {
        const ymapContainer = $('.ymap-container');
        if (!ymapContainer.length || typeof ymapCoords === 'undefined') return;

        await ymaps3.ready;

        const {YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer, YMapMarker} = ymaps3;

        const ymap = new YMap(
            ymapContainer[0],
            {
                location: {
                    center: [ymapCoords.geo_lon, ymapCoords.geo_lat],
                    zoom: ymapZoom,
                }
            },
        );

        ymap.addChild(new YMapDefaultSchemeLayer());
        ymap.addChild(new YMapDefaultFeaturesLayer());

        const ymapMarker = $('<div>').attr('class', 'ymap-marker')[0]

        ymap.addChild(new YMapMarker({coordinates: [ymapCoords.geo_lon, ymapCoords.geo_lat]}, ymapMarker));
    }
});

