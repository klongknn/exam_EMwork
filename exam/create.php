<!doctype html>
<html lang="th" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เพิ่มข้อมูล</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">เพิ่มข้อมูล</h1>
            <div class="mt-4">
                <a href="index.php" class="btn btn-warning">รายการข้อมูล</a>
            </div>
        
            <form action="action_create.php" id="form_create" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                <div class="row">
                    <div class="col-md-9">
                        <div class="row mt-4">
                            <div class="col-md-4 mt-3">
                                <label for="c_prefix" class="form-label">คำนำหน้าชื่อ <span class="text-danger">*</span></label>
                                <input type="text" id="c_prefix" list="list_prefix" name="c_prefix" class="form-control" required>
                                <datalist id="list_prefix">
                                    <option value="นาย">
                                    <option value="นาง">
                                    <option value="นางสาว">
                                </datalist>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="c_firstname" class="form-label">ชื่อ <span class="text-danger">*</span></label>
                                <input type="text" id="c_firstname" name="c_firstname" class="form-control" required>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="c_lastname" class="form-label">สกุล <span class="text-danger">*</span></label>
                                <input type="text" id="c_lastname" name="c_lastname" class="form-control" required>
                            </div>

                            
                            <div class="col-md-4 mt-3">
                                <label for="c_birthdate" class="form-label">เดือน/วัน/ปี เกิด <span class="text-danger">*</span></label>
                                <input type="date" id="c_birthdate" name="c_birthdate" class="form-control" required>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="c_birthdate" class="form-label">อายุ </span></label>
                               
                                
                            </div>

                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary btn-lg">บันทึก</button>
                                <button type="reset" class="btn btn-light btn-lg">ล้างค่า</button>
                            </div>
                        </div>
                    </div>
                    <duv class="col-md-3">
  
                        <div class="row mt-4">
                            <div class="col-md-12 mt-3">
                                <label for="c_image" class="form-label">รูปภาพ</label>
                                <input class="form-control" id="c_image" name="c_image" type="file" onchange="loadFile(event)">
                            </div>
                            <div class="col-md-12 mt-3">
                                <img src="./images/noimg.png" class="img-thumbnail" id="c_image_preview" />
                            </div>
                        </div>
                    </duv>
                </div>
            </form>
        </div>
    </main>
    

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/script.js"></script>
    <script>
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('c_image_preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>