<div>
    <fieldset style="margin: auto; width: 50%;">
        <legend>Dashboard [<?=$_SESSION['opencrowd_cur_session']?>]</legend>
        <button onClick="window.location.href='manage_users.php'">Manage Users</button>
        <button onClick="window.location.href='manage_products.php'">Manage Products</button>
        <button onClick="window.location.href='add_product.php?username=<?=$_SESSION['opencrowd_cur_session']?>'">Add Product</button>
    </fieldset>
</div>