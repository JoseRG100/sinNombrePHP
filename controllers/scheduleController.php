<?php
require_once 'models/scheduleModel/scheduleEntity.php';
require_once 'models/scheduleModel/DAOScheduleImpl.php';

class scheduleController {

    public function actionDefault(){
        Utils::showError();
    }

    public static function register($id_schedule, $time_start, $time_end, $day){

        Utils::isAdmin();

        if($time_start && $time_end && $day){
            $newSchedule = new scheduleEntity();
            $newSchedule->setIdSchedule($id_schedule);
            $newSchedule->setIdClass($id_schedule);
            $newSchedule->setTimeStart($time_start);
            $newSchedule->setTimeEnd($time_end);
            $newSchedule->setDay($day);

            $registerSuccessful = DAOScheduleImpl::insert($newSchedule);

            if($registerSuccessful){

                $_SESSION['classRegister'] = "complete";
                $_SESSION['message'] = 'SCHEDULE. Clase, registrada correctamente.';

            }else{
                $_SESSION['classRegister'] = "failed";
                $_SESSION['message'] = 'SCHEDULE. Error. El registro no pudo ingresar a la BBDD';
            }

        }else{
            $_SESSION['classRegister'] = "failed";
            $_SESSION['message'] = 'SCHEDULE. Error. La solicitud REST no fue enviada correctamente';
        }

    }

}