<?php

class DAOScheduleImpl implements DAOinterface {

    public static function insert($newObject)
    {
        $db     = Database::connect();

        $query  = "INSERT INTO schedule (id_schedule, id_class, time_start, time_end, day)
                   VALUES ('{$newObject->getIdSchedule()}', '{$newObject->getIdClass()}', '{$newObject->getTimeStart()}', '{$newObject->getTimeEnd()}', '{$newObject->getDay()}')";
        $db->query($query);

        //VALIDATING THE METHODE
        if($db->affected_rows) {
            return TRUE;
        } //end if
        return FALSE;
        //END OF VALIDATION

    }//end insert


    public static function findByLogin($loginEmail, $loginPassword)
    {
        // TODO: Implement findByLogin() method.
    }

    public static function getOne($objectId)
    {
        $db     = Database::connect();
        $query  = "SELECT * FROM schedule WHERE id_schedule=$objectId";
        return $db->query($query);
    }

    public static function getOneToObject($objectId) {

        $db     = Database::connect();
        $query  = "SELECT * FROM schedule WHERE id_scheduler=$objectId";
        $result = $db->query($query);

        $findSchedule = new scheduleEntity();

        if( $result ) {
            while( $row = $result->fetch_assoc() ) {
                $findSchedule->setIdSchedule($row['id_schedule']);
                $findSchedule->setIdClass($row['id_class']);
                $findSchedule->setTimeStart($row['time_start']);
                $findSchedule->setTimeEnd($row['time_end']);
                $findSchedule->setDay($row['day']);

            } //end while

            return $findSchedule;

        }//end if

        return false;

    }//end getOneToObject

    public static function getAll()
    {
        $db     = Database::connect();
        $query  = "SELECT * FROM schedule";
        return $db->query($query);
    }

    public static function update($objectId, $changedObject)
    {
        // TODO: Implement update() method.
    }

    public static function delete($objectId)
    {
        // TODO: Implement delete() method.
    }
}