<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('image');
            $table->string('title');
            $table->text('content');
            $table->string('city');
            $table->string('period');
            $table->string('price');
            $table->boolean('status')->default(1);
            $table->boolean("available")->default(1);

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });

        $this->load();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parkings');
    }

    private function load()
    {
        $par = new \App\Parking();
        $par->image = "https://www.lowcostparking.es/blog/wp-content/uploads/2016/02/parking-publico-obligaciones-730x410.jpeg";
        $par->title = "Estacionamiento Amplio";
        $par->content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.";
        $par->city = "Valparaíso";
        $par->period = "Semanal";
        $par->price = "40000";
        $par->user_id = 1;
        $par->save();

        $par = new \App\Parking();
        $par->image = "http://adm.1.cl/galeriasitios/Och/2013/4/8/Och_16169_Fl-8639-Pastamore-Fg(1)01.jpg";
        $par->title = "Estacionamiento Mall";
        $par->content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.";
        $par->city = "Valparaíso";
        $par->period = "Diario";
        $par->price = "5500";
        $par->user_id = 1;
        $par->save();

        $par = new \App\Parking();
        $par->image = "https://www.comparaonline.cl/blog/wp-content/uploads/2016/07/que-hacer-si-mi-auto-sufre-danos-dentro-de-un-estacionamiento-publico.jpg";
        $par->title = "Se arrienda edificio con concerje";
        $par->content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.";
        $par->city = "Valparaíso";
        $par->period = "Diario";
        $par->price = "4800";
        $par->user_id = 1;
        $par->save();


        $par = new \App\Parking();
        $par->image = "http://gpi-blog.s3.amazonaws.com/wp-content/uploads/2014/10/estacionamientovisita.jpg";
        $par->title = "Estacionamiento Mensual";
        $par->content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.";
        $par->city = "Valparaíso";
        $par->period = "Mensual";
        $par->price = "120000";
        $par->user_id = 1;
        $par->save();

        $par = new \App\Parking();
        $par->image = "https://assets.diarioconcepcion.cl/2017/05/Estacionamientos-colusi%C3%B3n-e1524267899615-850x400.jpg";
        $par->title = "En pleno centro";
        $par->content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.";
        $par->city = "Valparaíso";
        $par->period = "Mensual";
        $par->price = "135000";
        $par->user_id = 1;
        $par->save();

        $par = new \App\Parking();
        $par->image = "http://www.patriciogaete.com/upload/novedad/461824-estacionamiento.jpeg";
        $par->title = "Oferta vacaciones";
        $par->content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.";
        $par->city = "Valparaíso";
        $par->period = "Mensual";
        $par->price = "98000";
        $par->user_id = 1;
        $par->save();


        $par = new \App\Parking();
        $par->image = "https://image.portalinmobiliario.cl/Portal/Propiedades/3449906_ee3w54pf4zj_w1200.jpg";
        $par->title = "En Capital";
        $par->content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.";
        $par->city = "Santiago";
        $par->period = "Diario";
        $par->price = "9000";
        $par->user_id = 1;
        $par->save();

        $par = new \App\Parking();
        $par->image = "http://img.lasegunda.com/Fotos/2015/03/04/file_20150304110338.jpg";
        $par->title = "Santiago Barato Capital";
        $par->content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.";
        $par->city = "Santiago";
        $par->period = "Mensual";
        $par->price = "6000";
        $par->user_id = 1;
        $par->save();
    }

}
