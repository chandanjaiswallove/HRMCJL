<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function sweetAlert($title, $text, $icon, $redirect)
{
    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
            swal({
                title: '$title',
                text: '$text',
                icon: '$icon'
            }).then(function () {
                window.location.href = '$redirect';
            });
        });
    </script>";
    exit;
}
