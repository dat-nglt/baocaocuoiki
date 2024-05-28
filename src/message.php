<?php

function success($msg, $link)
{
    echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "' . $msg . '",
            icon: "success",
            showConfirmButton: true,
        }).then(function(){
            window.location.assign("' . $link . '");
        });
    </script>';
}
function successAdmin($msg, $adminLink, $homeLink)
{
    echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "' . $msg . '",
            icon: "success",
            showConfirmButton: true,
        }).then(function(){
            window.open("' . $adminLink . '", "_blank");
            window.open("' . $homeLink . '", "_self");
        });
    </script>';
}

function error($msg, $link)
{
    echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "' . $msg . '",
            icon: "error",
            showConfirmButton: true,
        }).then(function(){
            window.location.assign("' . $link . '");
        });
    </script>';
}

function warning($msg, $link)
{
    echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "' . $msg . '",
            icon: "warning",
            showConfirmButton: true,
        }).then(function(){
            window.location.assign("' . $link . '");
        });
    </script>';
}
