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


// function sweetAlert($title, $text, $icon, $redirect)
// {
//     echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';

//     echo "<style>

//     /* SweetAlert popup बड़ा */
//     .swal-modal{
//         width: 95% !important;
//         max-width: 500px;
//         padding: 30px;
//     }

//     /* Title बड़ा */
//     .swal-title{
//         font-size: 28px !important;
//         font-weight: bold;
//     }

//     /* Text बड़ा */
//     .swal-text{
//         font-size: 20px !important;
//         line-height: 1.6;
//     }

//     /* Button बड़ा */
//     .swal-button{
//         font-size: 18px !important;
//         padding: 10px 25px;
//     }

//     </style>";

//     echo "<script>
//         document.addEventListener('DOMContentLoaded', function () {
//             swal({
//                 title: '$title',
//                 text: '$text',
//                 icon: '$icon',
//                 button: 'OK'
//             }).then(function () {
//                 window.location.href = '$redirect';
//             });
//         });
//     </script>";
//     exit;
// }