<?php
function createModal( $title, $message) {
        $headerImgSrc = 'https://iili.io/JTtz0Xt.png';

    $modalId = 'modal-join';
    echo '<link rel="stylesheet" href="../css/modals.css">'; // Tambahkan ini untuk menyertakan stylesheet
    echo '<div id="' . $modalId . '" class="main-modal">';
    echo '<div class="modal-helper">';
    echo '<div class="modal-content">';
    echo '<div class="modal-header">';
    echo '<img class="img-failed" src="' . $headerImgSrc . '" alt="">';
    echo '</div>';
    echo '<div class="modal-body">';
    echo '<h1>' . $title . '</h1>';
    echo '<br>';
    echo '<span>' . $message . '</span>';
    echo '</div>';
    echo '<div class="modal-footer">';
    echo '<button type="button" class="bt-cancel" id="close-' . $modalId . '">OK</button>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

?>
