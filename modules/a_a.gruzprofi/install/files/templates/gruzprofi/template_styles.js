// Калькулятор - данные подтягиваются из PHP через CALC_DATA
function updateCalc() {
    var typeEl   = document.getElementById('calc-type');
    var moversEl = document.getElementById('calc-movers');
    if (!typeEl || !moversEl) return;

    var base   = parseInt(typeEl.value)   || 0;
    var movers = parseInt(moversEl.value) || 0;
    var total  = base + movers;

    var el = document.getElementById('calc-total');
    if (el) el.innerText = total.toLocaleString('ru-RU') + ' ₽';
}

// Яндекс.Карта - инициализация после загрузки API
function initMap() {
    if (typeof ymaps === 'undefined') return;
    ymaps.ready(function () {
        var mapContainer = document.getElementById('yandex-map');
        if (!mapContainer) return;

        var myMap = new ymaps.Map(mapContainer, {
            center: [55.76, 37.64],
            zoom: 11,
            controls: ['zoomControl']
        }, { suppressMapOpenBlock: true });

        // Метки машин на линии (координаты передать с сервера через data-атрибут или JSON)
        var cars = window.CARS_ONLINE || [];
        cars.forEach(function(car) {
            var placemark = new ymaps.Placemark(car.coords, {
                hintContent: car.title
            }, {
                preset: 'islands#yellowAutoIcon'
            });
            myMap.geoObjects.add(placemark);
        });
    });
}
