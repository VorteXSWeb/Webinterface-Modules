<?php

// Routes for URL Handling
$router->addRoute('#^/testmodules$#', function() use ($db) {
    if (!$username) {
        header("location: /login");
        exit();
    }

    // Basic SQL Connect
    $stmt = $db->getConnection()->prepare("SELECT * FROM account WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();


    // Set default
    $settings = new Settings($db->getConnection());
    $pageTemplate = $settings->getSetting('site_template');

    // TEST CONTENT ...

  
    // Including Basic Files
    include './templates/'.$pageTemplate.'/tpl/header.php';
    include './modules/testmodules/test.php';
    include './templates/'.$pageTemplate.'/tpl/footer.php';
    
});

?>
