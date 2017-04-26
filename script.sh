# Ceci est un script permettant de récupérer des informations d'apt-mirror
nbPaquets=`(echo '<?php $nbPaquets="' && wc -l /srv/apt-mirror/var/ALL && echo '"; ?>') > /srv/www/include/nbPaquets.php`
version=`(echo '<?php $version="' && apt-cache show apt-mirror && echo '"; ?>') > /srv/www/include/version.php`
lastDownloadFiles=`(echo '<?php $lastDownloadFiles="' && grep Downloading /srv/apt-mirror/var/cron.log && echo '"; ?>') > /srv/www/include/lastDownloadFiles.php`
