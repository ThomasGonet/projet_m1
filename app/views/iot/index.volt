{{ javascript_include('https://maps.googleapis.com/maps/api/js?v=3.exp') }}
<h1>Table de relevés</h1>

<script>
    function initialize() {
        var mapOptions = {
            center: {lat: 42.6984155, lng: 9.4493706},
            zoom: 10
        };

        var map = new google.maps.Map(document.getElementById('mapsAlert'),
                mapOptions);
        {% for alert in alerts %}
        {% if alert.latitude != "" and alert.longitude != "" %}
        var m = new google.maps.Marker({
            position: {lat: {{ alert.latitude|e }}, lng: {{ alert.longitude|e }} },
            map: map,
            title: "Alerte {{ alert.idSos|e }}"

        });
        {% if alert.air_quality == 0 %}
        m.setIcon('http://maps.google.com/mapfiles/ms/icons/red.png');
        {% elseif alert.air_quality == 1 %}
        m.setIcon('http://maps.google.com/mapfiles/ms/icons/orange.png');
        {% elseif alert.air_quality == 2 %}
        m.setIcon('http://maps.google.com/mapfiles/ms/icons/yellow.png');
        {% elseif alert.air_quality == 3 %}
        m.setIcon('http://maps.google.com/mapfiles/ms/icons/green.png');
        {% endif%}

        {% endif %}
        {% endfor %}
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
{#<h1> Alerte n° {{ alerts.idSos|e }}</h1>#}

<div class="row">
    <div id="mapsAlert" class="col-md-8">
    </div>
    <div class="col-md-4">
        <table>
            <tr>
                <td valign="top">
                    <u>Legend:</u><br />
                    <img alt="" src="http://maps.google.com/mapfiles/ms/icons/red.png" />
                    Air pollué<br />
                    <img alt="" src="http://maps.google.com/mapfiles/ms/icons/orange.png" />
                    Qualité moyenne<br />
                    <img alt="" src="http://maps.google.com/mapfiles/ms/icons/yellow.png" />
                    Air propre<br />
                    <img alt="" src="http://maps.google.com/mapfiles/ms/icons/green.png" />
                    Air pur<br />
                </td>
            </tr>
        </table>
    </div>
    {#<div class="col-md-4">#}
    {#<h2>Informations victime</h2>#}
    {#<table class="table">#}
    {#<tr><td>Nom</td><td><strong>{{ alerts.lastNameVictim }}</strong></td></tr>#}
    {#<tr><td>Prénom</td><td><strong>{{ alerts.firstNameVictim }}</strong></td></tr>#}
    {#</table>#}
    {#<h2>Options</h2>#}
    {#<p> <a href="https://maps.google.com/?q={{ alerts.latitude }},{{ alerts.longitude }}" target="_blank">ouvrir dans google maps</a></p>#}
    {#</div>#}
</div>

<div class="row">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID relevé</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Identifiant Agent</th>
            <th>Qualité de l'air</th>
        </tr>
        </thead>
        <tbody>
        {% for alert in alerts %}
            <tr class="alert" onclick="window.open('/sysalert/rescue/alertid/{{ alert.idSos|e }}', '_blank')">
                <td>{{ alert.idSos|e }}</td>
                <td>{{ alert.latitude|e }}</td>
                <td>{{ alert.longitude|e }}</td>
                <td>{{ alert.lastNameVictim|e }}</td>
                <td>{{ alert.air_quality|e }}</td>

            </tr>
        {% endfor %}
        </tbody>
    </table>
</div>

