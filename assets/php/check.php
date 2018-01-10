<?php
/**
 * PHP/cURL function to check a web site status. If HTTP status is between 200 and 400,
 * Generally all successes are in this range, the website is reachable.
 *
 *
 * @param string $url URL that must be checked
 */

function urlExists($url) {
        global $t;
        global $k;

        $handle = curl_init($url);
        curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($handle, CURLOPT_HEADER, true);
        curl_setopt($handle, CURLOPT_NOBODY, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($handle, CURLOPT_URL, $url);

        $response = curl_exec($handle);
        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if($httpCode >= 200 && $httpCode < 400 || $httpCode == 401 || $httpCode == 405) {
    //either variable or return or echo
    echo '
        <div class="col-lg-4">
        <a class="servicetile" href="'. $k['link'] .'" target="_blank" style="display: block">
            <div id="serviceimg">
                <p><img id="'. strtolower($t) .'-service-img" src="assets/img/'. strtolower($k['image']) .'" style="height:85px" alt=""></p>
            </div>
            <div id="servicetitle">
                <div class="servicetext">
                    <p>'. ucfirst($t) .'</p>
                </div>
            </div>
            <p class="btnonline">Online</p>
        </a>
    </div>
    ';
}

        }

        else {

            echo '<div class="col-lg-4">';

                echo '<div id="serviceimg">';
                    echo '<p class="offline"><img id="'. strtolower($t) .'-service-img" src="assets/img/'. strtolower($k['image']) .'" style="height:85px" alt=""></p>';
                echo '</div>';

                echo '<div id="servicetitle">';
                    echo '<a class="servicetextoffline" href="'. $k['link'] .'" target="_blank" style="display: block">';
                        echo '<p>'. ucfirst($t) .'</p>';
                    echo '</a>';
                echo '</div>';

                echo '<p class="btnoffline">Offline</p>';

            echo '</div>';

        }

        curl_close($handle);
    };
?>
