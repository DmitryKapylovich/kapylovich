ymaps.ready()
    .done(function (ym) {
        var myMap = new ym.Map('YMapsID', {
            center: [51.65, 39.19],
            zoom: 8
        }, {
            searchControlProvider: 'yandex#search'
        });

        jQuery.getJSON('data.json', function (json) {
            /** Сохраним ссылку на геообъекты на случай, если понадобится какая-либо постобработка.
             * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/GeoQueryResult.xml
             */
            var geoObjects = ym.geoQuery(json)
                    .addToMap(myMap)
                    .applyBoundsToMap(myMap, {
                        checkZoomRange: true
                    });
        });
    });