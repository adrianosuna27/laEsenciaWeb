@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>La Esencia Web</h1>
        </div>
        <div class="justify-content-center">
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{asset('storage/img/vinedos.jpg')}}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('storage/img/viñedo-uva.jpg')}}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('storage/img/bodega.jpg')}}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            </br>
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center">Sobre Nosotros</h3>
                    <div class="row">
                        <div class="col-5 justify-content-center">
                            <img width="65%" src="{{asset('storage/img/Mapa.jpg')}}" alt="vinos">
                        </div>
                        <div class="col-7">
                            <br>
                            <p class="descript">La Esencia es sinónimo de tradición, desde 1914 los viticultores de la comarca de Moriles
                            han cultivado con mimo la variedad PX en este privilegiado entorno de pradera,
                            tratando de respetar al máximo las condiciones del medio y elaborando vinos con una
                            identidad propia.</p>

                            <p class="descript">Nuestra dedicación y pasión por el PX hace que nos veamos inmersos ahora en un proceso
                            de recuperación de la variedad, cuyo cultivo, casi a punto de desaparecer,
                            sabemos que fue referencia en los viñedos de nuestros abuelos.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
