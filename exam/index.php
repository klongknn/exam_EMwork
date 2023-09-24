<?php
include_once('./function.php');
$objCon = connectDB();

$perpage = 30;

if (isset($_GET['page']) && (int) $_GET['page'] > 0) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$start = ($page - 1) * $perpage;

$condition = "";
$search = "";
if (isset($_GET['search']) && $_GET['search'] != '') {
    $search = mysqli_real_escape_string($objCon, $_GET['search']);
    $condition = " AND c_firstname LIKE '%$search%' OR c_lastname LIKE '%$search%' OR c_idcard = '$search'";
}



$sql = "SELECT * FROM contact WHERE c_status = 1$condition ORDER BY c_id DESC LIMIT $start, $perpage";
$objQuery = mysqli_query($objCon, $sql);

?>
<!doctype html>
<html lang="th" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบบันทึกข้อมูลสมาชิก</title>
 
    <link href="./css/bootstrap.min.css" rel="stylesheet">
 
    <link href="./css/style.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">


    <main class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">ระบบบันทึกข้อมูลสมาชิก</h1>
         
            <div class="mt-4">
                <a href="create.php" class="btn btn-success">เพิ่มข้อมูล</a> 
                <a href="report.php" class="btn btn-primary">รายงาน</a>
            </div>
           
            <div class="mt-4">
                <form>
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <label for="search" class="col-form-label">ใส่ข้อมูลเพื่อค้นหา</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" id="search" name="search" value="<?php echo $search; ?>" class="form-control">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">ค้นหา</button>
                        </div>
                        <div class="col-auto">
                            <a href="index.php" class="btn btn-secondary">เครียร์</a>
                        </div>
                    </div>
                </form>
            </div>
         
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>รหัส</th>
                        <th>ชื่อ - สกุล</th>
                        <th>เดือน/วัน/ปี เกิด</th>
                        <th>อายุ</th>
                        <th>การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

function timespan($seconds = 1, $time = '')
{
	if ( ! is_numeric($seconds))
	{
		$seconds = 1;
	}
 
	if ( ! is_numeric($time))
	{
		$time = time();
	}
 
	if ($time <= $seconds)
	{
		$seconds = 1;
	}
	else
	{
		$seconds = $time - $seconds;
	}
 
	$str = '';
	$years = floor($seconds / 31536000);
 
	if ($years > 0)
	{	
		$str .= $years.' ปี, ';
	}	
 
	$seconds -= $years * 31536000;
	$months = floor($seconds / 2628000);
 
	if ($years > 0 OR $months > 0)
	{
		if ($months > 0)
		{	
			$str .= $months.' เดือน, ';
		}	
 
		$seconds -= $months * 2628000;
	}
 		
 
	$days = floor($seconds / 86400);
 
	if ($months > 0 OR $weeks > 0 OR $days > 0)
	{
		if ($days > 0)
		{	
			$str .= $days.' วัน, ';
		}
 
		$seconds -= $days * 86400;
	}

	return substr(trim($str), 0, -1);
}

$birthdate = strtotime('1973-11-13');
$today = time();


                    while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $objResult['c_id']; ?></td>
                            <td><?php echo $objResult['c_prefix'], $objResult['c_firstname'], ' ', $objResult['c_lastname']; ?></td>
                            <td><?php echo date_th($objResult['c_birthdate']); ?></td>
                            <td><?php echo timespan($objResult['c_birthdate']); ?></td>
                            
                            <td>
                                <a href="update.php?c_id=<?php echo $objResult['c_id']; ?>" class="btn btn-warning btn-sm">Update</a>
                                <a href="action_delete.php?c_id=<?php echo $objResult['c_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยัน');">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            
            <?php
            $strSQL = "SELECT * FROM contact WHERE c_status = 1$condition ORDER BY c_id DESC";
            $objQuery = mysqli_query($objCon, $strSQL);
            $total_record = mysqli_num_rows($objQuery);
       
            $total_page = ceil($total_record / $perpage);
           
            ?>
            <div>
                <ul class="pagination justify-content-end">
                    <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                        <li class="page-item<?php if ($page == $i) { echo ' active'; } ?>">
                            <a class="page-link" href="index.php?search=<?php echo $search; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </main>

    
        </div>
    </footer>
</body>

</html>