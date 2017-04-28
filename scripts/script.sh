# Ceci est un script permettant de récupérer des informations d'apt-mirror
nbPaquets=`(echo '<?php $nbPaquets="' && wc -l /srv/apt-mirror/var/ALL && echo '"; ?>') > /srv/www/info/nbPaquets.php`
version=`(echo '<?php $version="' && apt-cache show apt-mirror && echo '"; ?>') > /srv/www/info/version.php`
lastDownloadFiles=`(echo '<?php $lastDownloadFiles="' && grep Downloading /srv/apt-mirror/var/cron.log && echo '"; ?>') > /srv/www/info/lastDownloadFiles.php`
# Récupérer les informations d'apache
apacheVersion=`(echo '<?php $apacheVersion="' && apache2 -v && echo '"; ?>') > /srv/www/info/apacheVersion.php`
