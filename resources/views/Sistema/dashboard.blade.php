@extends("layoutssistema.navbar")

@section('content')
<main>
    <div style='display:flex;width:100%;height:550px;'>
        <div style='width:70%;display:flex;height:100%;align-items:center;justify-content:space-evenly;'>
            <img class="img_dash" style='width:93%;height:90%;'  src="Imagenes/dash1.jpeg" alt="">
        </div>
        <div style='width:30%;display:flex;height:100%;flex-direction:column;align-items:center;justify-content:space-evenly;'>
            <img class="img_dash" style='width:85%;height:120px;'  src="Imagenes/dash3.jpeg" alt="">
            <img class="img_dash" style='width:85%;height:120px;'  src="Imagenes/dash4.jpeg" alt="">
            <img class="img_dash" style='width:85%;height:120px;'  src="Imagenes/dash5.jpeg" alt="">
        </div>
    </div>
    <div style='display:flex;width:100%;height:150px;justify-content:center;align-items:center;'>
        <img class="img_dash" style='width:95%;height:120px;'  src="Imagenes/dash6.jpeg" alt="">
    </div>
    <div style='width:100%;display:flex;height:500px;align-items:center;justify-content:space-evenly;'>
        <img class="img_dash" style='width:30%;height:90%;'  src="Imagenes/dash7.jpeg" alt="">
        <img class="img_dash" style='width:30%;height:90%;'  src="Imagenes/dash8.jpeg" alt="">
        <img class="img_dash" style='width:30%;height:90%;'  src="Imagenes/dash9.jpeg" alt="">
    </div>
    <div style='width:100%;display:flex;height:600px;align-items:center;justify-content:space-evenly;'>
        <img class="img_dash" style='width:95%;height:90%;'  src="Imagenes/dash10.jpeg" alt="">
    </div>
</main>
<style>
    .img_dash{
        -webkit-box-shadow: 0px 1px 6px 4px rgba(153,153,153,1);
        -moz-box-shadow: 0px 1px 6px 4px rgba(153,153,153,1);
        box-shadow: 0px 1px 6px 4px rgba(153,153,153,1);
    }
</style>
@endsection