<?php namespace dao;

class MongoDBSingleton
{
    private static $_instance = NULL;
    private $pwd = "Azerty01";
    private $user = "hitema-mlab";

    static function getMongoConnection()
    {
        if (self::$_instance === null)
        {
            try {
                $m = new MongoDB\Driver\Manager("mongodb://${user}:${pwd}@ds113923.mlab.com:13923/hitema-mlab");

            } catch (MongoConnectionException $e) {
                die('Failed to connect to MongoDB '.$e->getMessage());
            }
            self::$_instance = $m;
        }
        return self::$_instance;
    }
}

?>
