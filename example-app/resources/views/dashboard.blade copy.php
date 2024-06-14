@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-lg-12">
    {{--highcarts--}}

    {{-- html --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>

    <figure class="highcharts-figure">
        <div id="container-jk"></div>
    </figure>



    {{-- css --}}
    <style>
      .highcharts-figure,
      .highcharts-data-table table {
          min-width: 310px;
          max-width: 800px;
          margin: 1em auto;
      }

      #container {
          height: 400px;
      }

      .highcharts-data-table table {
          font-family: Verdana, sans-serif;
          border-collapse: collapse;
          border: 1px solid #ebebeb;
          margin: 10px auto;
          text-align: center;
          width: 100%;
          max-width: 500px;
      }

      .highcharts-data-table caption {
          padding: 1em 0;
          font-size: 1.2em;
          color: #555;
      }

      .highcharts-data-table th {
          font-weight: 600;
          padding: 0.5em;
      }

      .highcharts-data-table td,
      .highcharts-data-table th,
      .highcharts-data-table caption {
          padding: 0.5em;
      }

      .highcharts-data-table thead tr,
      .highcharts-data-table tr:nth-child(even) {
          background: #f8f8f8;
      }

      .highcharts-data-table tr:hover {
          background: #f1f7ff;
      }

    </style>

    {{-- js --}}
    <script>
          Highcharts.chart('container', {
          chart: {
              type: 'column'
          },
          title: {
              text: 'Grafik Mahasiswa Program Studi',
              align: 'center'
          },
          subtitle: {
              text:
                  'Source: Aplikasi Akademmik ',
              align: 'center'
          },
          xAxis: {
              categories: [
                @foreach ($mahasiswaprodi as $item)
                  '{{$item->nama}}',
                @endforeach
              ],
              crosshair: true,
              accessibility: {
                  description: 'Program Studi'
              }
          },
          yAxis: {
              min: 0,
              title: {
                  text: 'Mahasiswa'
              }
          },
          tooltip: {
              valueSuffix: ' (mahasiswa)'
          },
          plotOptions: {
              column: {
                  pointPadding: 0.2,
                  borderWidth: 0
              }
          },
          series: [
              {
                  name: 'Mahasiswa',
                  data:  [
                  @foreach ($mahasiswaprodi as $item)
                  {{$item->jumlah}},
                  @endforeach
                  ]
              }
          ]
      });

      Highcharts.chart('container-jk', {
          chart: {
              type: 'column'
          },
          title: {
              text: 'Grafik Jenis Kelamin Mahassiwa di Program Studi',
              align: 'center'
          },
          subtitle: {
              text:
                  'Source: Aplikasi Akademmik ',
              align: 'center'
          },
          xAxis: {
              categories: [
                @foreach ($mahasiswajk as $item)
                  '{{$item->nama}}',
                @endforeach
              ],
              crosshair: true,
              accessibility: {
                  description: 'Program Studi'
              }
          },
          yAxis: {
              min: 0,
              title: {
                  text: 'Mahasiswa'
              }
          },
          tooltip: {
              valueSuffix: ' (mahasiswa)'
          },
          plotOptions: {
              column: {
                  pointPadding: 0.2,
                  borderWidth: 0
              }
          },
          series: [
              {
                  name: 'Laki-laki',
                  data:  [
                  @foreach ($mahasiswajk as $item)
                  {{$item->laki}},
                  @endforeach
                  ]
              },
              {
                  name: 'Perempuan',
                  data:  [
                  @foreach ($mahasiswajk as $item)
                  {{$item->perempuan}},
                  @endforeach
                  ]
              }
          ]
      });
    </script>
  </div>
</div>
@endsection