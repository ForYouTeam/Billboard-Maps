@extends('layout.base')
@section('title')
    Home
@endsection
@section('content')
<div class="row mb-3">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Earnings (Monthly)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span>Since last month</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-primary"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Sales</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">650</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                <span>Since last years</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-shopping-cart fa-2x text-success"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- New User Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">New User</div>
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">366</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                <span>Since last month</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-info"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                <span>Since yesterday</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-warning"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
      <div class="card mb-4">
        <div class="card-body">
          <div id="map" style="height: 650px"></div> 
        </div>
      </div>
    </div>

    <div class="modal fade" id="imgModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Gambar Billboard</h5>
          </div>
          <div class="modal-body">
            <div id="images-list" class="row">
           
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('script')
    <script>
      let geoData 
      async function getDataByAjax() {
        let url = `{{ config('app.url') }}/api/v1/billboard`
        $.ajax({
          url     : url,
          method  : 'GET',
          success : (res) => {
            geoData = res.data
          },
          error   : (err) => {
            console.log(err);
          }
        });
      }

      async function getImageByAjax(id) {
        let url = `{{ config('app.url') }}/api/v1/images?billboard_id=${id}`
        $.ajax({
          url     : url,
          method  : 'GET',
          success : (res) => {
            $('#images-list').html('')
            $.each(res.data, (i, d) => {
              $('#images-list').append(`
                <img class="billboard-image col" src="{{ asset('storage/${d.image_path}') }}" alt="">
              `)
            })
          },
          error   : (err) => {
            console.log(err);
          }
        });
      }

      $(document).on('click', '.show-img', function() {
        let dataId = $(this).data('id')
        $(this).prop('disabled', true)
        getImageByAjax(dataId)

        $('#imgModal').modal('show')
        $(this).prop('disabled', true)
      })

      $(document).ready(() => {
        getDataByAjax()

        mapboxgl.accessToken = 'pk.eyJ1IjoiaXBraW45IiwiYSI6ImNsbTM2MjB3ejB3Yjgzc256ejVwaXpubWIifQ.z9as5eQQoJrjPPtUIyjFSg';
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [119.87739681899808, -0.90141682332305],
            zoom: 13.50
        });

        map.on('load', () => {
            map.loadImage(`{{ asset('assets/icon/off.png') }}`, (error, imageTrue) => {
                if (error) throw error;

                map.loadImage(`{{ asset('assets/icon/active.png') }}`, (error, imageFalse) => {
                    if (error) throw error;

                    map.addImage('custom-icon-true', imageTrue);
                    map.addImage('custom-icon-false', imageFalse);
                });
            });

            const data = geoData.map(item => ({
                coordinates: [parseFloat(item.latitude), parseFloat(item.longtitude)],
                description: `
                  <div class="info-card">
                    <h6>Pemilik: ${item.nama_owner}</h6>
                    <p>Status: <span class="status">${item.empty ? 'Kosong' : 'Terisi'}</span></p>
                    <p>Alamat: ${item.address}</p>
                    <p>Nomor HP: <a href="https://wa.me/NOMOR_HP_ANDA" target="_blank" title="Chat di WhatsApp">NOMOR_HP_ANDA</a></p>
                    <button data-id="${item.id}" class="btn btn-sm btn-outline-primary show-img" type="button">Lihat Gambar</button>
                  </div>
                `,
                isEmpty: item.empty === 1
            }));

            map.addSource('places', {
                'type': 'geojson',
                'data': {
                    'type': 'FeatureCollection',
                    'features': data.map((item) => {
                        return {
                            'type': 'Feature',
                            'properties': {
                                'description': item.description,
                                'icon': item.isEmpty ? 'custom-icon-true' : 'custom-icon-false'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': item.coordinates
                            }
                        };
                    })
                }
            });

            map.addLayer({
                'id': 'places',
                'type': 'symbol',
                'source': 'places',
                'layout': {
                    'icon-image': ['get', 'icon'],
                    'icon-size': 0.08,
                    'icon-allow-overlap': true,
                    'icon-anchor': 'bottom'
                }
            });

            map.on('click', 'places', (e) => {
                const coordinates = e.features[0].geometry.coordinates.slice();
                const description = e.features[0].properties.description;

                while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                }

                new mapboxgl.Popup()
                    .setLngLat(coordinates)
                    .setHTML(description)
                    .addTo(map);
            });

            map.on('mouseenter', 'places', () => {
                map.getCanvas().style.cursor = 'pointer';
            });

            map.on('mouseleave', 'places', () => {
                map.getCanvas().style.cursor = '';
            });
        });


      })
    </script>
@endsection