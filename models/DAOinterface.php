<?php

interface DAOinterface {

    // ------------ CREATE ------------ //
    /**
     * Store the new user and assign a unique auto-generated ID.
     */
    public static function insert($newObject);

    // -------------- READ -------------- //
    /**
     * Return the user with the given login ID.
     * This methode, just be implemented if the class have a LOGIN.
     */
    public static function findByLogin($loginEmail, $loginPassword);

    /**
     * Return the user with the given auto-generated ID.
     */
    public static function getOne($objectId);

    /**
     * ¿?¿?¿?
     */
    public static function getAll();

    // ------------ UPDATE ------------ //
    /**
     * Update the user's fields.
     */
    public static function update($objectId, $changedObject);

    // ------------ DELETE ------------ //
    /**
     * Delete the user from the database.
     */
    public static function delete($objectId);

}