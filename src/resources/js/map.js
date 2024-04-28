import $ from 'jquery';

$(document).ready(function () {
    const ymapLoadeer = `
    <div class="ymap-loader">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
    </div>`;

    initMap();

    $('.profile-edit .profile-edit-container .city .city-select select').bind({
        'change': function () {
            const cityId = $(this).val();

            $.ajax({
                url: '/api/cities/' + cityId,
                method: 'GET',
                dataType: 'json',
                beforeSend: () => {
                    const cityYmapContainer = $('.profile-edit .profile-edit-container .city');
                    cityYmapContainer.find('.ymap-container').detach();

                    const ymapContainer = $('<div>').attr('class', 'ymap-container');
                    ymapContainer.append(ymapLoadeer);

                    cityYmapContainer.append(ymapContainer);
                }
            })
                .done((response) => {
                    ymapCoords = {'geo_lat': response.data.geo_lat, 'geo_lon': response.data.geo_lon};

                    initMap()
                })
        }
    });

    async function initMap() {
        const ymapContainer = $('.ymap-container');

        if (!ymapContainer.length || typeof ymapCoords === 'undefined') return;

        ymapContainer.find('.ymap-loader').detach();

        await ymaps3.ready;

        const {YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer, YMapMarker} = ymaps3;

        const ymap = new YMap(
            ymapContainer[0],
            {
                location: {
                    center: [ymapCoords.geo_lon, ymapCoords.geo_lat],
                    zoom: 10,
                }
            },
        );

        ymap.addChild(new YMapDefaultSchemeLayer());
        ymap.addChild(new YMapDefaultFeaturesLayer());

        const ymapMarker = $('<div>').attr('class', 'ymap-marker')[0]

        ymap.addChild(new YMapMarker({coordinates: [ymapCoords.geo_lon, ymapCoords.geo_lat]}, ymapMarker));
    }
});

