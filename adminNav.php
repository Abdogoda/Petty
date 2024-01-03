<?php 
$pathname = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
?>
<div class="nav">
  <div class="menu0toggle"></div>
  <ul>
    <li class="list <?php if($pathname == 'admin.php') echo 'active' ;?>">
      <a href="admin.php"><i class="icon fas fa-home fs-2"></i>
        <h3 class="title">Home</h3>
      </a>
    </li>
    <li class="list <?php if($pathname == 'products.php') echo 'active' ;?>">
      <a href="products.php"><i class="icon fas fa-server fs-2"></i>
        <h3 class="title">Products</h3>
      </a>
    </li>
    <li class="list <?php if($pathname == 'users.php') echo 'active' ;?>">
      <a href="users.php"><i class="icon fas fa-users fs-2"></i>
        <h3 class="title">Users</h3>
      </a>
    </li>
    <li class="list <?php if($pathname == 'sales.php') echo 'active' ;?>">
      <a href="sales.php"><i class="icon fas fa-list-check fs-2"></i>
        <h3 class="title">Sales</h3>
      </a>
    </li>
    <li class="list <?php if($pathname == 'sittings.php') echo 'active' ;?>">
      <a href="sittings.php"><i class="icon fas fa-cog fs-2"></i>
        <h3 class="title">Setting</h3>
      </a>
    </li>
    <li class="list">
      <a href="index.php"><i class="icon fa fa-pager fs-2"></i>
        <h3 class="title">Petty Site</h3>
      </a>
    </li>
    <li class="list">
      <form action="admin.php" method="GET">
        <button name='logout' onclick="return confirm('Are You Sure You Want To Logout?')"><i
            class="icon fas fa-sign-out-alt fs-2"></i>
          <h3 class="title">Log Out</h3>
        </button>
      </form>
    </li>
  </ul>
</div>