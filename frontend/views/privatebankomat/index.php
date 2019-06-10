<?php
 //echo '<pre>';
 // print_r($bankomats);
 // echo '</pre>'; 
/* echo '<pre>';
  print_r($city);
  echo '</pre>'; */
?>

<style>
    h1{
        text-align: center;
    }

    #map{
        width: 100%;
        height: 600px;
        margin-top: 50px;
    }
</style>
<h1><b> банкоматы Приват Банка </b></h1>

<?php $form = yii\widgets\ActiveForm::begin(['id' => 'filter-bankomat-form']) ?>

        <?= $form->field($filterBankomatForm, 'city') ?>

        <?= yii\helpers\Html::submitButton('Получить список банкоматов', ['class' => 'btn btn-success']); ?>

<?php yii\widgets\ActiveForm::end() ?>

<div class="countBancomats" style="margin:20px;font-size: 20px">
    <span> Количество банкоматов </span>
</div>

<div id="map">

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    function Bancomats() {
        var map;
        var bankomats = <?= $bankomats; ?>;
        console.log(bankomats);
        $('.countBancomats span').append(bankomats.length);
        var options = {
            zoom: 17,
             center: {lat: 48.472428, lng: 35.037862},
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById("map"), options);
     
        var markers = [];
         for (bankomat in bankomats) {
            var latLng = new google.maps.LatLng(bankomats[bankomat].latitude, bankomats[bankomat].longitude);
   
            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                title: bankomats[bankomat].fullAddressRu
            });
            markers.push(marker);
        }

        map.panTo(latLng);
        var markerCluster = new MarkerClusterer(map, markers);
    }
</script>

<script 
    async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAw_YD1cLHgDMvTl3oShYOTATLglcgAJPU&callback=Bancomats">
</script>













