<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (!empty($_SESSION['infos'])) {
        $arrInfos =  $_SESSION['infos'];

        foreach ($arrInfos as $key => $info) {
            if ($info['id'] == $id) {
                unset($arrInfos[$key]);
                break;
            }
        }

        $_SESSION['infos'] = $arrInfos;
        header('Location: show.php');
    }
}
