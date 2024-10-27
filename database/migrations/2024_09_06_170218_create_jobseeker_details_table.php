<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobseeker_details', function (Blueprint $table) {
            $table->bigIncrements('js_id'); // Auto-incrementing primary key

            // Personal details columns
            $table->string('js_firstname', 50);
            $table->string('js_middlename', 30)->nullable(); // Middlename is optional
            $table->string('js_lastname', 30);
            $table->string('js_suffix', 10)->nullable(); // Suffix is optional
            $table->string('js_gender', 12);
            $table->string('js_address', 255); // Address with maximum length
            $table->string('js_email', 100)->unique(); // Email with unique constraint
            $table->string('js_resume', 100)->nullable();
            $table->string('js_contactnumber', 15); // Contact number with length constraint
            $table->string('js_password', 255); // Password (hashed)

            // Timestamps
            $table->timestamps(); // Automatically adds created_at and updated_at fields
        });

        DB::table('jobseeker_details')->insert([
            [
                'js_firstname' => 'NATALIA',
                'js_middlename' => 'ANNE',
                'js_lastname' => 'BADAJOZ',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '123 Main St, City, Country',
                'js_email' => 'natalia.badajoz@job.com',
                'js_resume' => 'natalia_resume.pdf',
                'js_contactnumber' => '09411234591',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            [
                'js_firstname' => 'MICAELA',
                'js_middlename' => 'RIANNE',
                'js_lastname' => 'BAYLON',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '789 Back St, City, Country',
                'js_email' => 'micaela.baylon@job.com',
                'js_resume' => 'micaela_resume.pdf',
                'js_contactnumber' => '09431234593',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'ELAINE',
                'js_middlename' => 'GLAIZE',
                'js_lastname' => 'GABRIEL',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '321 North St, City, Country',
                'js_email' => 'elaine.gabriel@job.com',
                'js_resume' => 'elaine_resume.pdf',
                'js_contactnumber' => '09441234594',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'RAFAEL',
                'js_middlename' => 'SUAREZ',
                'js_lastname' => 'GUTIERREZ',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '654 East St, City, Country',
                'js_email' => 'rafael.gutierrez@job.com',
                'js_resume' => 'rafael_resume.pdf',
                'js_contactnumber' => '09451234595',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'IAN',
                'js_middlename' => 'MAE',
                'js_lastname' => 'KARPOV',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '987 West St, City, Country',
                'js_email' => 'ian.karpov@job.com',
                'js_resume' => 'ian_resume.pdf',
                'js_contactnumber' => '09461234596',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'AIDA',
                'js_middlename' => 'BUNA',
                'js_lastname' => 'MARIANO',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '111 Center St, City, Country',
                'js_email' => 'aida.mariano@job.com',
                'js_resume' => 'aida_resume.pdf',
                'js_contactnumber' => '09471234597',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'JENIKAH',
                'js_middlename' => 'RIVERA',
                'js_lastname' => 'MARIO',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '222 South St, City, Country',
                'js_email' => 'jenikah.mario@job.com',
                'js_resume' => 'jenikah_resume.pdf',
                'js_contactnumber' => '09481234598',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'KATHRINE',
                'js_middlename' => 'SHAYNE',
                'js_lastname' => 'SAGUITAN',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '333 Peak St, City, Country',
                'js_email' => 'kathrine.saguitan@job.com',
                'js_resume' => 'kathrine_resume.pdf',
                'js_contactnumber' => '09491234599',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'KEZIA',
                'js_middlename' => 'JOY',
                'js_lastname' => 'SISON',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '444 Hill St, City, Country',
                'js_email' => 'kezia.sison@job.com',
                'js_resume' => 'kezia_resume.pdf',
                'js_contactnumber' => '09501234500',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'JACOB',
                'js_middlename' => 'MAX',
                'js_lastname' => 'VILLANUEVA',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '555 Base St, City, Country',
                'js_email' => 'jacob.villanueva@job.com',
                'js_resume' => 'jacob_resume.pdf',
                'js_contactnumber' => '09511234501',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'LLOYD',
                'js_middlename' => 'IAN',
                'js_lastname' => 'ZAMORA',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '666 Vista St, City, Country',
                'js_email' => 'lloyd.zamora@job.com',
                'js_resume' => 'lloyd_resume.pdf',
                'js_contactnumber' => '09521234502',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Additional 75 entries
            [
                'js_firstname' => 'ALEJANDRO',
                'js_middlename' => 'DANE',
                'js_lastname' => 'ABAD',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '999 Main St, City, Country',
                'js_email' => 'alejandro.abad@job.com',
                'js_resume' => 'alejandro_resume.pdf',
                'js_contactnumber' => '09531234503',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'CHRISTIAN',
                'js_middlename' => 'REYES',
                'js_lastname' => 'ABLAO',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '1234 River St, City, Country',
                'js_email' => 'christian.ablao@job.com',
                'js_resume' => 'christian_resume.pdf',
                'js_contactnumber' => '09541234504',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'DANIEL',
                'js_middlename' => 'RAY',
                'js_lastname' => 'ACOSTA',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '5678 Ocean St, City, Country',
                'js_email' => 'daniel.acosta@job.com',
                'js_resume' => 'daniel_resume.pdf',
                'js_contactnumber' => '09551234505',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'JOSE',
                'js_middlename' => 'LOUIS',
                'js_lastname' => 'AGUILAR',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '4321 Mountain St, City, Country',
                'js_email' => 'jose.aguilar@job.com',
                'js_resume' => 'jose_resume.pdf',
                'js_contactnumber' => '09561234506',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'BRIAN',
                'js_middlename' => 'JAMES',
                'js_lastname' => 'ALVAREZ',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '7890 Valley St, City, Country',
                'js_email' => 'brian.alvarez@job.com',
                'js_resume' => 'brian_resume.pdf',
                'js_contactnumber' => '09571234507',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'DIANA',
                'js_middlename' => 'MARIE',
                'js_lastname' => 'AMADO',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '4321 Park St, City, Country',
                'js_email' => 'diana.amado@job.com',
                'js_resume' => 'diana_resume.pdf',
                'js_contactnumber' => '09581234508',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'FELICITY',
                'js_middlename' => 'GRACE',
                'js_lastname' => 'ANABIA',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '3214 Coast St, City, Country',
                'js_email' => 'felicity.anabia@job.com',
                'js_resume' => 'felicity_resume.pdf',
                'js_contactnumber' => '09591234509',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'JOCELYN',
                'js_middlename' => 'MARIA',
                'js_lastname' => 'BACON',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '9876 Forest St, City, Country',
                'js_email' => 'jocelyn.bacon@job.com',
                'js_resume' => 'jocelyn_resume.pdf',
                'js_contactnumber' => '09601234510',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'ALICE',
                'js_middlename' => 'MAE',
                'js_lastname' => 'BALAWAN',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '1593 Urban St, City, Country',
                'js_email' => 'alice.balawan@job.com',
                'js_resume' => 'alice_resume.pdf',
                'js_contactnumber' => '09611234511',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'RICKY',
                'js_middlename' => 'DANIEL',
                'js_lastname' => 'BARZAGA',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '7531 Tropical St, City, Country',
                'js_email' => 'ricky.barzaga@job.com',
                'js_resume' => 'ricky_resume.pdf',
                'js_contactnumber' => '09621234512',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'MARC',
                'js_middlename' => 'JULIUS',
                'js_lastname' => 'BAUTISTA',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '1212 Maple St, City, Country',
                'js_email' => 'marc.bautista@job.com',
                'js_resume' => 'marc_resume.pdf',
                'js_contactnumber' => '09631234513',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'SAMUEL',
                'js_middlename' => 'SIMEON',
                'js_lastname' => 'BEY',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '2225 Hilltop St, City, Country',
                'js_email' => 'samuel.bey@job.com',
                'js_resume' => 'samuel_resume.pdf',
                'js_contactnumber' => '09641234514',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'VICTORIA',
                'js_middlename' => 'LIZ',
                'js_lastname' => 'BLAIR',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '3309 Hill St, City, Country',
                'js_email' => 'victoria.blair@job.com',
                'js_resume' => 'victoria_resume.pdf',
                'js_contactnumber' => '09651234515',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'WILBERT',
                'js_middlename' => 'LIAM',
                'js_lastname' => 'BRIONES',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '4158 Horizon St, City, Country',
                'js_email' => 'wilbert.briones@job.com',
                'js_resume' => 'wilbert_resume.pdf',
                'js_contactnumber' => '09661234516',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'DANICA',
                'js_middlename' => 'BELLE',
                'js_lastname' => 'BUCAG',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '2710 Garden St, City, Country',
                'js_email' => 'danica.bucag@job.com',
                'js_resume' => 'danica_resume.pdf',
                'js_contactnumber' => '09671234517',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'ELEANOR',
                'js_middlename' => 'ANNE',
                'js_lastname' => 'BULAD',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '5809 Dream St, City, Country',
                'js_email' => 'eleanor.bulad@job.com',
                'js_resume' => 'eleanor_resume.pdf',
                'js_contactnumber' => '09681234518',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'ISAAC',
                'js_middlename' => 'SANTIAGO',
                'js_lastname' => 'CABALLERO',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '6852 Dreamland St, City, Country',
                'js_email' => 'isaac.caballero@job.com',
                'js_resume' => 'isaac_resume.pdf',
                'js_contactnumber' => '09691234519',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'FIONA',
                'js_middlename' => 'KATE',
                'js_lastname' => 'CATUBAY',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '2739 Serene St, City, Country',
                'js_email' => 'fiona.catubay@job.com',
                'js_resume' => 'fiona_resume.pdf',
                'js_contactnumber' => '09701234520',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'GREGORY',
                'js_middlename' => 'NOAH',
                'js_lastname' => 'CISNEROS',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '2032 Hill St, City, Country',
                'js_email' => 'gregory.cisneros@job.com',
                'js_resume' => 'gregory_resume.pdf',
                'js_contactnumber' => '09711234521',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'HOLLY',
                'js_middlename' => 'JOAN',
                'js_lastname' => 'CRUZ',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '9634 Summer St, City, Country',
                'js_email' => 'holly.cruz@job.com',
                'js_resume' => 'holly_resume.pdf',
                'js_contactnumber' => '09721234522',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'IVAN',
                'js_middlename' => 'JOVAN',
                'js_lastname' => 'DELOSREYES',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '8506 Autumn St, City, Country',
                'js_email' => 'ivan.delosreyes@job.com',
                'js_resume' => 'ivan_resume.pdf',
                'js_contactnumber' => '09731234523',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'MARJORIE',
                'js_middlename' => 'ALEXIS',
                'js_lastname' => 'DIONISIO',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '4958 Ocean St, City, Country',
                'js_email' => 'marjorie.dionisio@job.com',
                'js_resume' => 'marjorie_resume.pdf',
                'js_contactnumber' => '09741234524',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'NICHOLAS',
                'js_middlename' => 'GABRIEL',
                'js_lastname' => 'DOLLORES',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '2390 Summit St, City, Country',
                'js_email' => 'nicholas.dollores@job.com',
                'js_resume' => 'nicholas_resume.pdf',
                'js_contactnumber' => '09751234525',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'BETH',
                'js_middlename' => 'ROSE',
                'js_lastname' => 'DUQUE',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '7880 City St, City, Country',
                'js_email' => 'beth.duque@job.com',
                'js_resume' => 'beth_resume.pdf',
                'js_contactnumber' => '09761234526',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'ELISA',
                'js_middlename' => 'PAIGE',
                'js_lastname' => 'EDROZO',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '1806 Edge St, City, Country',
                'js_email' => 'elisa.edrozo@job.com',
                'js_resume' => 'elisa_resume.pdf',
                'js_contactnumber' => '09771234527',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'REBECCA',
                'js_middlename' => 'JOELLE',
                'js_lastname' => 'FLORES',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '2345 Shoreline St, City, Country',
                'js_email' => 'rebecca.flores@job.com',
                'js_resume' => 'rebecca_resume.pdf',
                'js_contactnumber' => '09781234528',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'AUSTIN',
                'js_middlename' => 'TAYLOR',
                'js_lastname' => 'GABO',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '9867 Green St, City, Country',
                'js_email' => 'austin.gabo@job.com',
                'js_resume' => 'austin_resume.pdf',
                'js_contactnumber' => '09791234529',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'CARLA',
                'js_middlename' => 'MARIE',
                'js_lastname' => 'GAVILANES',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '3322 Sunrise St, City, Country',
                'js_email' => 'carla.gavilanes@job.com',
                'js_resume' => 'carla_resume.pdf',
                'js_contactnumber' => '09801234530',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'ELLIOT',
                'js_middlename' => 'DUSTIN',
                'js_lastname' => 'GONZALES',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '1919 Meadow St, City, Country',
                'js_email' => 'elliot.gonzales@job.com',
                'js_resume' => 'elliot_resume.pdf',
                'js_contactnumber' => '09811234531',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'HELEN',
                'js_middlename' => 'JANE',
                'js_lastname' => 'HERNANDEZ',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '7718 Rain St, City, Country',
                'js_email' => 'helen.hernandez@job.com',
                'js_resume' => 'helen_resume.pdf',
                'js_contactnumber' => '09821234532',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'ISAIAH',
                'js_middlename' => 'COLIN',
                'js_lastname' => 'HERNANDEZ',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '6327 Evening St, City, Country',
                'js_email' => 'isaiah.hernandez@job.com',
                'js_resume' => 'isaiah_resume.pdf',
                'js_contactnumber' => '09831234533',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'VERONICA',
                'js_middlename' => 'GRACE',
                'js_lastname' => 'LACUNA',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '7888 Mountain St, City, Country',
                'js_email' => 'veronica.lacuna@job.com',
                'js_resume' => 'veronica_resume.pdf',
                'js_contactnumber' => '09841234534',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'MARCUS',
                'js_middlename' => 'LEO',
                'js_lastname' => 'MAGANA',
                'js_suffix' => null,
                'js_gender' => 'Male',
                'js_address' => '3606 Hilltop St, City, Country',
                'js_email' => 'marcus.magana@job.com',
                'js_resume' => 'marcus_resume.pdf',
                'js_contactnumber' => '09851234535',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'YVONNE',
                'js_middlename' => 'ROSE',
                'js_lastname' => 'MARFORI',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '2880 Mystic St, City, Country',
                'js_email' => 'yvonne.marfori@job.com',
                'js_resume' => 'yvonne_resume.pdf',
                'js_contactnumber' => '09861234536',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'js_firstname' => 'ZOE',
                'js_middlename' => 'KIM',
                'js_lastname' => 'MEJIA',
                'js_suffix' => null,
                'js_gender' => 'Female',
                'js_address' => '1588 Harmony St, City, Country',
                'js_email' => 'zoe.mejia@job.com',
                'js_resume' => 'zoe_resume.pdf',
                'js_contactnumber' => '09871234537',
                'js_password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobseeker_details');
    }
};
