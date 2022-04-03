@extends('layouts.app')
<style>
      #container { display:flex; width:100%; height:100%; }
      #map { flex:1; margin:10px; }
      #widgets { width:300px; margin:10px 10px 10px 0; }
      .widget { background:white; padding:10px; margin-bottom:10px; }
      .widget h1 { font-size:1.2em; }
      .widget-formula .result { font-size:2em; }
</style>
@section('contenido')
<div id="container">
      <div id="map"></div>
      <div id="widgets">
        <div id="countriesWidget" class="widget">
          <h1>European countries</h1>
          <select class="js-countries">
            <option value="">All</option>
          </select>
        </div>
        <div id="avgPopulationWidget" class="widget widget-formula">
          <h1>Average population</h1>
          <p><span class="js-average-population result">xxx</span> inhabitants</p>
        </div>
      </div>
    </div>
    <script>
      // code will go here!
      const map = L.map('map').setView([50, 15], 4);

      var client = new carto.Client({
        apiKey: 'THmyWDfYERgB8kxSqm03oWVWUEOLVePo',
        username: 'wilberthlp4@gmail.com'
    });
    </script>
@endsection