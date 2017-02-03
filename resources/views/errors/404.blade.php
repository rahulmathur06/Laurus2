@extends('layout.master')
@section('css')
@endsection
@section('content-header')
    <h1>Error 404 </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">404 error</li>
    </ol>
@endsection
@section('content')
    <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Página no encontrada.</h3>
            <p>La página solicitada puede no estar disponible,haber cambiado de dirección (URL) o no existir.</p>
              <p>Disculpe las molestias.</p>
            <p>Mientras tanto, es posible  <a href="{{url('dashboard')}}">volver al dashboard.</a></p>
        </div><!-- /.error-content -->
    </div><!-- /.error-page -->
@endsection
@section('scripts')
@endsection
