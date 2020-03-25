<?php
require_once __DIR__.'/../vendor/autoload.php';
use \L41rx\FE3H\Enumerations\Certification;

$certification_html = "";
foreach (Certification::all() as $c)
    $certification_html .= Certification::render($c['slug']);
?>

<html>
    <head>
        <link rel="stylesheet" href="/css/certification.css">
        <style>
            .certifications {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-evenly;
            }
        </style>
    </head>
    
    <body>
        <div class="certifications">
            <?php echo $certification_html; ?>
        </div>

    <script>
        window.onload = function() {
            var certifications = {};
            var dom_certs = document.getElementsByTagName('certification');
            for (var i = 0; i < dom_certs.length; i++) {
                var certification = JSON.parse(dom_certs[i].dataset.certification);
                certifications[certification['slug']] = certification;
                certifications[certification['slug']]['node'] = dom_certs[i];
            }
            console.log("Loaded characters into JSON", certifications);
            window.certifications = certifications;
        };
    </script>
    </body>
</html>
