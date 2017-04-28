<?php
if ($_POST['action'] == 1) {
  shell_exec('./apacheRestart.sh');
}
if ($_POST['action'] == 2) {
  shell_exec('./serverRestart.sh');
}

?>
