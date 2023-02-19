<?php

    if(isset($_POST['disp'])==true)
    {
        if(isset($_POST['code'])==false)
        {
            header('Location:staff_ng.php');
            exit();
        }
        $staff_code=$_POST['code'];
        header('Location:staff_disp.php?code='.$staff_code);
        exit();
    }

    if(isset($_POST['add'])==true)
    {
        header('Location:staff_add.php');
        exit();
    }

    if(isset($_POST['edit'])==true)
    {
        if(isset($_POST['code'])==false)
        {
            header('Location:staff_ng.php');
            exit();
        }
        $staff_code=$_POST['code'];
        header('Location:staff_edit.php?code='.$staff_code);
        exit();
    }

    if(isset($_POST['delete'])==true)
    {
        if(isset($_POST['code'])==false)
        {
            header('Location:staff_ng.php');
            exit();
        }
        $staff_code=$_POST['code'];
        header('Location:staff_delete.php?code='.$staff_code);
        exit();
    }