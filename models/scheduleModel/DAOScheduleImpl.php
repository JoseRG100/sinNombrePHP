<?php

class DAOScheduleImpl implements DAOinterface {

    public static function insert($newObject)
    {
        // TODO: Implement insert() method.
    }

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