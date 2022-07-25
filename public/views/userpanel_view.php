<?php

use App\models\User;

$user = new User($_SESSION['email']);
?>
<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">نام</th>
            <th scope="col">فامیل</th>
            <th scope="col">ایمیل</th>
            <th scope="col">موبایل</th>
        </tr>
        </thead>
        <tbody class="table-group-divider table-divider-color">
        <?php
        echo "<tr>
            <th>{$user->fname}</th>
            <td>{$user->lname}</td>
            <td>{$user->email}</td>
            <td>0{$user->phone}</td>
        </tr>";
        ?>

        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
        </tbody>
    </table>
</div>
