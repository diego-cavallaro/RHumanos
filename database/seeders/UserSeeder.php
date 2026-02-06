<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $admin = new User;  
                        
        $admin->name = 'administrador';
        $admin->nickName = 'admin';
        $admin->password = bcrypt('dashboard');;
        $admin->legajo = '1';
        $admin->enable = true;
        $admin->email =  'c.maggiotti@fscnet.com.ar';
        $admin->save();

        $users = new User;	$users->name = 'A.PAREDES';	$users->nickName = 'A.PAREDES';	$users->password = bcrypt('ALBERTO.PAREDES');	$users->legajo = '543';	$users->email =  'A.PAREDES@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'ALLEGRE';	$users->nickName = 'ALLEGRE';	$users->password = bcrypt('ALLEGRE');	$users->legajo = '433';	$users->email =  'ALLEGRE@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'ASFORZINI';	$users->nickName = 'ASFORZINI';	$users->password = bcrypt('31856259');	$users->legajo = '506';	$users->email =  'ASFORZINI@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'BERDINI';	$users->nickName = 'BERDINI';	$users->password = bcrypt('453');	$users->legajo = '453';	$users->email =  'BERDINI@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'C.Altamiranda';	$users->nickName = 'C.Altamiranda';	$users->password = bcrypt('CMA2006');	$users->legajo = '704';	$users->email =  'C.Altamiranda@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'C.Argañaraz';	$users->nickName = 'C.Argañaraz';	$users->password = bcrypt('ARGAÑARAZ');	$users->legajo = '566';	$users->email =  'C.Argañaraz@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'C.BALCAZA';	$users->nickName = 'C.BALCAZA';	$users->password = bcrypt('CBALCAZA');	$users->legajo = '612';	$users->email =  'C.BALCAZA@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'C.CISNEROS';	$users->nickName = 'C.CISNEROS';	$users->password = bcrypt('CISNEROS');	$users->legajo = '1555';	$users->email =  'C.CISNEROS@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'C.Prado';	$users->nickName = 'C.Prado';	$users->password = bcrypt('Cprado');	$users->legajo = '1662';	$users->email =  'C.Prado@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'CINTIA.ESPOSITO';	$users->nickName = 'CINTIA.ESPOSITO';	$users->password = bcrypt('cintiame');	$users->legajo = '626';	$users->email =  'CINTIA.ESPOSITO@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'Claudia.Sforzini';	$users->nickName = 'Claudia.Sforzini';	$users->password = bcrypt('666');	$users->legajo = '606';	$users->email =  'Claudia.Sforzini@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'D.CAVALLARO';	$users->nickName = 'D.CAVALLARO';	$users->password = bcrypt('MARTINA1');	$users->legajo = '735';	$users->email =  'D.CAVALLARO@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'D.OVIEDO';	$users->nickName = 'D.OVIEDO';	$users->password = bcrypt('OVIEDO');	$users->legajo = '6227';	$users->email =  'D.OVIEDO@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'DCUELLO';	$users->nickName = 'DCUELLO';	$users->password = bcrypt('JACARO');	$users->legajo = '442';	$users->email =  'DCUELLO@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'DelRio';	$users->nickName = 'DelRio';	$users->password = bcrypt('6253');	$users->legajo = '6253';	$users->email =  'DelRio@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'E.BREST';	$users->nickName = 'E.BREST';	$users->password = bcrypt('BRESTE');	$users->legajo = '6516';	$users->email =  'E.BREST@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'EUGENIO';	$users->nickName = 'EUGENIO';	$users->password = bcrypt('EUGENIO');	$users->legajo = '452';	$users->email =  'EUGENIO@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'F.SCHUBERT';	$users->nickName = 'F.SCHUBERT';	$users->password = bcrypt('SCHUBERT');	$users->legajo = '6470';	$users->email =  'F.SCHUBERT@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'G.LOPEZ';	$users->nickName = 'G.LOPEZ';	$users->password = bcrypt('LOPEZG');	$users->legajo = '6143';	$users->email =  'G.LOPEZ@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'G.Torres';	$users->nickName = 'G.Torres';	$users->password = bcrypt('FSC2580');	$users->legajo = '6041';	$users->email =  'G.Torres@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'GONCALVES';	$users->nickName = 'GONCALVES';	$users->password = bcrypt('GONCALVES');	$users->legajo = '1547';	$users->email =  'GONCALVES@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'H.ARAGUNDE';	$users->nickName = 'H.ARAGUNDE';	$users->password = bcrypt('CAVOUR');	$users->legajo = '6418';	$users->email =  'H.ARAGUNDE@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'H.NIEVA';	$users->nickName = 'H.NIEVA';	$users->password = bcrypt('513');	$users->legajo = '513';	$users->email =  'H.NIEVA@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'HERMOSI';	$users->nickName = 'HERMOSI';	$users->password = bcrypt('HERMOSI');	$users->legajo = '602';	$users->email =  'HERMOSI@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'I.Benites';	$users->nickName = 'I.Benites';	$users->password = bcrypt('NENO');	$users->legajo = '6432';	$users->email =  'I.Benites@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'I.NOGUERA';	$users->nickName = 'I.NOGUERA';	$users->password = bcrypt('NICOLAS');	$users->legajo = '499';	$users->email =  'I.NOGUERA@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'J.GIMENEZ';	$users->nickName = 'J.GIMENEZ';	$users->password = bcrypt('516');	$users->legajo = '516';	$users->email =  'J.GIMENEZ@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'J.Lagomarsino';	$users->nickName = 'J.Lagomarsino';	$users->password = bcrypt('J.Lagomarsino');	$users->legajo = '547';	$users->email =  'J.Lagomarsino@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'J.Martins';	$users->nickName = 'J.Martins';	$users->password = bcrypt('MARTINS');	$users->legajo = '720';	$users->email =  'J.Martins@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'L.BENITEZ';	$users->nickName = 'L.BENITEZ';	$users->password = bcrypt('BENITEZ');	$users->legajo = '1545';	$users->email =  'L.BENITEZ@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'L.FALABELLA';	$users->nickName = 'L.FALABELLA';	$users->password = bcrypt('FALABELLA');	$users->legajo = '707';	$users->email =  'L.FALABELLA@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'L.FUNES';	$users->nickName = 'L.FUNES';	$users->password = bcrypt('FUNESL');	$users->legajo = '6622';	$users->email =  'L.FUNES@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'L.HORISBERGER';	$users->nickName = 'L.HORISBERGER';	$users->password = bcrypt('HORISBERGER');	$users->legajo = '553';	$users->email =  'L.HORISBERGER@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'L.SANCHEZ';	$users->nickName = 'L.SANCHEZ';	$users->password = bcrypt('SANCHEZ.L');	$users->legajo = '681';	$users->email =  'L.SANCHEZ@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'M.CUCCARO';	$users->nickName = 'M.CUCCARO';	$users->password = bcrypt('USUARIO DE BAJA');	$users->legajo = '437';	$users->email =  'M.CUCCARO@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'M.DIMARCO';	$users->nickName = 'M.DIMARCO';	$users->password = bcrypt('Vic3nt');	$users->legajo = '6336';	$users->email =  'M.DIMARCO@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'M.Lopez';	$users->nickName = 'M.Lopez';	$users->password = bcrypt('lopezm');	$users->legajo = '534';	$users->email =  'M.Lopez@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'M.Nalbandian';	$users->nickName = 'M.Nalbandian';	$users->password = bcrypt('FSC2580');	$users->legajo = '469';	$users->email =  'M.Nalbandian@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'M.Pupilli';	$users->nickName = 'M.Pupilli';	$users->password = bcrypt('pupilli2036');	$users->legajo = '2036';	$users->email =  'M.Pupilli@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'NCHAVEZ';	$users->nickName = 'NCHAVEZ';	$users->password = bcrypt('1519');	$users->legajo = '1519';	$users->email =  'NCHAVEZ@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'O.Padron';	$users->nickName = 'O.Padron';	$users->password = bcrypt('CAMILA');	$users->legajo = '6587';	$users->email =  'O.Padron@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'OPEREYRA';	$users->nickName = 'OPEREYRA';	$users->password = bcrypt('PON56');	$users->legajo = '6523';	$users->email =  'OPEREYRA@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'R.Garay';	$users->nickName = 'R.Garay';	$users->password = bcrypt('2047');	$users->legajo = '2047';	$users->email =  'R.Garay@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'R.Montaño';	$users->nickName = 'R.Montaño';	$users->password = bcrypt('montano123');	$users->legajo = '6342';	$users->email =  'R.Montaño@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'R.RUIZ';	$users->nickName = 'R.RUIZ';	$users->password = bcrypt('RUIZDIAZ');	$users->legajo = '739';	$users->email =  'R.RUIZ@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'RF.ACOSTA';	$users->nickName = 'RF.ACOSTA';	$users->password = bcrypt('FABIAN');	$users->legajo = '6310';	$users->email =  'RF.ACOSTA@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'S.PIEDRA';	$users->nickName = 'S.PIEDRA';	$users->password = bcrypt('PIEDRA');	$users->legajo = '2021';	$users->email =  'S.PIEDRA@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'SEBASTIAN';	$users->nickName = 'SEBASTIAN';	$users->password = bcrypt('SANCHEZ');	$users->legajo = '445';	$users->email =  'SEBASTIAN@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'V.MAGALLANES';	$users->nickName = 'V.MAGALLANES';	$users->password = bcrypt('VICTORMAG');	$users->legajo = '6520';	$users->email =  'V.MAGALLANES@FSCNet.com.ar';	$users->enable = true;	$users->save();
        $users = new User;	$users->name = 'W.BOGNER';	$users->nickName = 'W.BOGNER';	$users->password = bcrypt('BOGNERW');	$users->legajo = '6121';	$users->email =  'W.BOGNER@FSCNet.com.ar';	$users->enable = true;	$users->save();

    }
}