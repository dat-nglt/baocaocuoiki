<?php

function success($msg, $link)
{
    if ($link != '') {
        echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "' . $msg . '",
            icon: "success",
            timer: 1300,
showConfirmButton: false,
        }).then(function(){
            window.location.assign("' . $link . '");
        });
    </script>';
    } else {
        echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "' . $msg . '",
            icon: "success",
            timer: 1300,
showConfirmButton: false,
        });
        return;
    </script>';
    }

}
function successAdmin($msg, $adminLink, $homeLink)
{
    echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "' . $msg . '",
            icon: "success",
            timer: 1300,
showConfirmButton: false,
        }).then(function(){
            window.open("' . $adminLink . '", "_blank");
            window.open("' . $homeLink . '", "_self");
        });
    </script>';
}

function error($msg, $link)
{
    if ($link != '') {
        echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "' . $msg . '",
            icon: "error",
            timer: 1300,
showConfirmButton: false,
        }).then(function(){
            window.location.assign("' . $link . '");
        });
    </script>';
    } else {
        echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "' . $msg . '",
            icon: "error",
            timer: 1300,
showConfirmButton: false,
        });
        return;
    </script>';
    }
}

function warning($msg, $link)
{
    if ($link != '') {
        echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "' . $msg . '",
            icon: "warning",
            timer: 1300,
showConfirmButton: false,
        }).then(function(){
            window.location.assign("' . $link . '");
        });
    </script>';
    } else {
        echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "' . $msg . '",
            icon: "warning",
            timer: 1300,
showConfirmButton: false,
        });
        return;
    </script>';
    }
}

function successTimeout($msg, $link)
{
    if ($link != '') {
        echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "' . $msg . '",
            icon: "success",
            showConfirmButton: false,
            timer: 1300,
        }).then(function(){
            window.location.assign("' . $link . '");
        });
    </script>';
    } else {
        echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "' . $msg . '",
            icon: "success",
            timer: 1300,
            showConfirmButton: false,
        });
    </script>';
    }

}

function errorTimeout($msg, $link)
{
    if ($link != '') {
        echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "' . $msg . '",
            icon: "error",
            showConfirmButton: false,
            timer: 1300,
        }).then(function(){
            window.location.assign("' . $link . '");
        });
    </script>';
    } else {
        echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "' . $msg . '",
            icon: "error",
            timer: 1300,
            showConfirmButton: false,
        });
    </script>';
    }

}
