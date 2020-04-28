<?php

$tablename = "users";

try {
    $db = new PDO("mysql:dbname=$dbname;host=$host;CHARSET=utf8;COLLATE=utf8_unicode_ci", $user, $pass);
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $db->exec("CREATE TABLE IF NOT EXISTS $tablename(
        id bigint( 20 ) AUTO_INCREMENT PRIMARY KEY,
        name varchar( 50 ) COLLATE utf8_unicode_ci NOT NULL,
        email varchar( 150 ) COLLATE utf8_unicode_ci NOT NULL, 
        -- address text( 150 ) COLLATE utf8_unicode_ci,
        password varchar(100) COLLATE utf8_unicode_ci NOT NULL,
        created_at timestamp DEFAULT CURRENT_TIMESTAMP,
        updated_at timestamp DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
    print("Created $tablename Table success.\n");
} catch(PDOException $e) {
    echo $e->getMessage();
}