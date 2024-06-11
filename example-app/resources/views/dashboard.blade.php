@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-lg-12">
    {{-- highcharts --}}

    {{-- html --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
            A basic column chart comparing the number of male and female students
            in different programs of study.
        </p>
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
      document.addEventListener('DOMContentLoaded', function () {
          Highcharts.chart('container', {
              chart: {
                  type: 'column'
              },
              title: {
                  text: 'Grafik Mahasiswa Program Studi',
                  align: 'center'
              },
              subtitle: {
                  text: 'Source: Aplikasi Akademik',
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
                      text: 'Jumlah Mahasiswa'
                  }
              },
              tooltip: {
                  shared: true,
                  valueSuffix: ' mahasiswa'
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
                      data: [
                      @foreach ($mahasiswaprodi as $item)
                        {{$item->laki_laki}},
                      @endforeach
                      ]
                  },
                  {
                      name: 'Perempuan',
                      data: [
                      @foreach ($mahasiswaprodi as $item)
                        {{$item->perempuan}},
                      @endforeach
                      ]
                  }
              ]
          });
      });
    </script>
  </div>
</div>
@endsection
