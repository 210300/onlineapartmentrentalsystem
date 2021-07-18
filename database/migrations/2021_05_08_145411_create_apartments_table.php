 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
           $table->id();
            $table->string('ApartmentType');
            $table->string('NameofApartment');
            $table->string('RentRange');
            $table->string('Location');
            $table->string('parkinglot');
            $table->unsignedBigInteger('dzongkhag_id');
            $table->foreign('dzongkhag_id')->references('id')->on('dzongkhags')->onDelete('cascade'); 
            $table->unsignedBigInteger('gewog_id');
            $table->foreign('gewog_id')->references('id')->on('gewogs')->onDelete('cascade'); 
            $table->decimal('Latitude');
            $table->decimal('Longitude');
            $table->string('filenames');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->delete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
