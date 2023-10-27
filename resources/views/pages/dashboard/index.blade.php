@extends('layouts.app')

@section('content')
<section class="section">
    <ul class="breadcrumb breadcrumb-style">
        <li class="breadcrumb-item">
            <h4 class="page-title m-b-0">Inicio</h4>
        </li>
    </ul>
    <!-- row -->
    <div class="row mt-3">
        <!-- col -->
        <div class="col-lg-3 col-sm-6">
            <!-- card -->
            <div class="card" style="border-radius: 18px;">
                <div class="card-statistic-5 color-cards-home">
                    <div class="info-box7-block">
                        <div class="row ">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/icons/customers.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-white">
                                <h6 class="m-b-20 text-right">Monto Vendido Hoy</h6>
                                <h5 class="text-right"><span>S/. {{ $monto_vendido_hoy }}</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- col -->
        <!-- col -->
        <div class="col-lg-3 col-sm-6">
            <!-- card -->
            <div class="card" style="border-radius: 18px;">
                <div class="card-statistic-5 color-cards-home"  >
                    <div class="info-box7-block">
                        <div class="row ">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/icons/orders.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-white">
                                <h6 class="m-b-20 text-right">Monto Vendido este mes</h6>
                                <h5 class="text-right"><span>S/. {{ $monto_vendido_mes }}</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- col -->
        <div class="col-lg-3 col-sm-6">
            <!-- card -->
            <div class="card" style="border-radius: 18px;">
                <div class="card-statistic-5 color-cards-home">
                    <div class="info-box7-block">
                        <div class="row ">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/icons/sales.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-white">
                                <h6 class="m-b-20 text-right">Categoria con mas ventas</h6>
                                <h5 class="text-right"><span>{{ $categoria_vendida }}</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- col -->
        <div class="col-lg-3 col-sm-6">
            <!-- card -->
            <div class="card" style="border-radius: 18px;">
                <div class="card-statistic-5 color-cards-home"  >
                    <div class="info-box7-block">
                        <div class="row ">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/icons/revenue.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-white">
                                <h6 class="m-b-20 text-right">Producto mas Vendido</h6>
                                <h5 class="text-right"><span>{{ $producto_vendido}}</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- col -->
    </div>
    <div class="row">
        <!-- col -->
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                  <h4>Grafico de ingresos por mes, año <?php echo date('Y');?></h4>
                </div>
                <div class="card-body">
                    <div id="revenue_chart"></div>
                </div>
            </div>
        </div>

        <!-- col -->
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-header">
                  <h4>Categorias con mas ventas</h4>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div id="categories_chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- col -->
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-header">
                  <h4>Productos mas vendidos</h4>
                </div>
                <div class="card-body">
                    <div id="users_chart"></div>
                </div>
            </div>
        </div>


  
        <!-- col -->
    </div>
    <!-- row -->
    <!-- row -->
    {{-- <div class="row">
        <!-- col -->
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                  <h4>Gráfico de Ingresos</h4>
                </div>
                <div class="card-body">
                    <div id="revenue_chart"></div>
                </div>
            </div>
        </div>
        <!-- col -->
    </div> --}}
    <!-- row -->
</section>
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/apexcharts.css') }}">
@endsection
@section('scripts')
<script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
<script>
    var dataMeses = @json($arrayMeses);
    var dataCategorias = @json($arrayCategorias);
    var dataProductos = @json($arrayProductos);
    var colorsCa = @json($arrayColorsCategoria);
    var colorsPro= @json($arrayColorProductos);
    var colors = @json($arrayColorsMeses);
    var options = {
        series: [{
            name: 'Ventas S/.',
            data: @json($ventasMeses)
        }],
        chart: {
            height: 350,
            type: 'line',
            events: {
                click: function(chart, w, e) {
                    // console.log(chart, w, e)
                }
            }
        },
        colors: colors,
        plotOptions: {
            bar: {
                columnWidth: '45%',
                distributed: true
            }
        },
        dataLabels: {
            enabled: true
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: dataMeses,
            labels: {
                style: {
                    colors: colors,
                    fontSize: '12px'
                }
            }
        }
    };
    
    var options2 = {
        series: @json($ventasCategorias),
        chart: {
            height: 300,
            type: 'polarArea',
            events: {
                click: function(chart, w, e) {
                    // console.log(chart, w, e)
                }
            }
        },
        colors: colorsCa,
        plotOptions: {
            bar: {
                columnWidth: '45%',
                distributed: true
            }
        },
        dataLabels: {
            enabled: true
        },
        legend: {
            show: false
        },
        labels: dataCategorias,
        xaxis: {
            categories: dataCategorias,
            labels: {
                style: {
                    colors: colorsCa,
                    fontSize: '12px'
                }
            }
        }
    };
    
    var options3 = {
        series: [{
            name: 'Ventas Realizadas',
            data: @json($arrayProductosVentas)
        }],
        chart: {
            height: 350,
            type: 'bar',
            events: {
                click: function(chart, w, e) {
                    // console.log(chart, w, e)
                }
            }
        },
        colors: colorsPro,
        plotOptions: {
            bar: {
                columnWidth: '45%',
                distributed: true
            }
        },
        dataLabels: {
            enabled: true
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: dataProductos,
            labels: {
                style: {
                    colors: colorsPro,
                    fontSize: '12px'
                }
            }
        }
    };
    var chart = new ApexCharts(document.querySelector("#revenue_chart"), options);
    var chart2 = new ApexCharts(document.querySelector("#categories_chart"), options2);
    var chart3 = new ApexCharts(document.querySelector("#users_chart"), options3);
    
    chart.render();
    chart2.render();
    chart3.render();
    </script>
    @endsection