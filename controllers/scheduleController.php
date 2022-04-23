<?php

class scheduleController {

    public function actionDefault(){
        Utils::showError();
    }

    public static function register($time_start, $time_end, $day){

        Utils::isStudent();
        //if(isset($_POST)){

//            $id_class       = isset($_POST['id_class']) ? $_POST['id_class'] : false;
//            $time_start    = isset($_POST['time_start']) ? $_POST['time_start'] : false;
//            $time_end  = isset($_POST['time_end']) ? $_POST['time_end'] : false;
//            $day        = isset($_POST['day']) ? $_POST['day'] : false;

            if($time_start && $time_end && $day){
                $newSchedule = new scheduleEntity();
                //$newSchedule->setIdClass($id_class);
                $newSchedule->setTimeStart($time_start);
                $newSchedule->setTimeEnd($time_end);
                $newSchedule->setDay($day);

                $registerSuccessful = DAOScheduleImpl::insert($newSchedule);


                if($registerSuccessful){

                    $_SESSION['scheduleRegister'] = "complete";

                }else{
                    $_SESSION['scheduleRegister'] = "failed";
                }

            }else{
                $_SESSION['scheduleRegister'] = "failed";
            }

      /*  }else{
            $_SESSION['scheduleRegister'] = "failed";
        }*/

        header("Location:".base_url.'/home');

    }

}