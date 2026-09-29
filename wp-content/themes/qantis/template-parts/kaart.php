<?php
// 1. Отримуємо значення координат з ACF
$kaart = get_field('kennismakingsgesprek');

$lat = !empty($kaart['kaart']['latitude']) ? $kaart['kaart']['latitude'] : (!empty($kaart['lat']) ? $kaart['lat'] : '52.6324');
$lng = !empty($kaart['kaart']['longitude']) ? $kaart['kaart']['longitude'] : (!empty($kaart['lng']) ? $kaart['lng'] : '4.7534');

?>

<!-- Контейнер для карти -->


<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<?php if ($kaart) { ?>
    <section>
        <div class="section">
            <div class="contact-grid">
                <div class="contact-info">
                    <p class="section-tag">
                                <?php echo $kaart['tag'] ?>
                    </p>
                    <h2>
                                <?php echo $kaart['title'] ?>
                    </h2>
                    <p>
                                <strong><?php echo $kaart['mobiel'] ?></strong>
                    </p>
                    <p>
                        <a href="mailto:<?php echo $kaart['email'] ?>">   <?php echo $kaart['email'] ?></a>
                    </p>
                    <h4>
                                <?php echo $kaart['openingstijd'] ?>
                    </h4>
                    <p>
                                <?php echo $kaart['adress']['straat'] ?><br>
                                <?php echo $kaart['adress']['postcode'] ?>
                    </p>

                    <div id="dark-map-container"
                        style="max-width: 250px; height: 140px; border-radius: 12px; overflow: hidden; position: relative; z-index: 1;">
                    </div>
                </div>
                <div>
                    <p><?php echo $kaart['label_input']?></p>
                    <?php echo do_shortcode('[fluentform id="3"]'); ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var mapLat = parseFloat(<?php echo json_encode($lat); ?>);
        var mapLng = parseFloat(<?php echo json_encode($lng); ?>);

        var container = document.getElementById('dark-map-container');
        if (!container) return;

        var map = L.map('dark-map-container', {
            attributionControl: false, // Приховуємо написи
            zoomControl: false         // Приховуємо кнопки + / -
        }).setView([mapLat, mapLng], 12); // Зум 12 для такого ж охоплення, як на макеті

        // Дзеркальне джерело CartoDB Dark Matter без вимоги API KEY
        L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png?api_key=ВАШ_КЛЮЧ', {
            maxZoom: 20
        }).addTo(map);
        // Ваш зелений маркер
        var greenIcon = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        L.marker([mapLat, mapLng], { icon: greenIcon }).addTo(map);

        setTimeout(function () {
            map.invalidateSize();
        }, 200);
    });
</script>