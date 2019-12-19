<?php
//sessionin aloitus (jotta sen voi lopettaa)
session_start();
//poistaa sessionin muuttujat
session_unset();
//poistaa auki olevat sessiot muilta sivuilta
session_destroy();
header("Location: http://localhost/phpstuff/rojekti/");