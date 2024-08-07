<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Upload Images Project CMU-Research</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="./index.css" />
    <!-- Import Firebase scripts cdn -->
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-storage.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row col-md-12 justify-content-center">
            <div class="text-center text-withe pt-5">
                <h2 class="text-center">
                    <img src="images/estima-logo.png" style="width: 350px; margin: auto;" />
                </h2>
                <p>
                    Welcome to ESTIMA, AI-driven web-application for blood loss estimation

                </p>
                <p>
                <h4>วิธีการอัพโหลดรูป</h4>
                <div class="text-center mb-3">
                    1. กดปุ่ม Choose files <br />
                    2. เลือกรูปที่ต้องการ Upload (สามารถเลือกหลายรูปภาพพร้อมกันได้)<br />
                    3. กดปุ่ม Upload เป็นอันเสร็จสิ้น<br />
                    หมายเหตุ: หากต้องการ Upload รูปภาพอีกสามารถกลับไปทำตั้งแต่ข้อ 1 ใหม่ได้เลย
                </div>
                </p>

                <hr />
                <div class="mt-2">
                    <table style="width: 600px;margin: 20px auto;">
                        <?php 
                         $sql= " SELECT tbl_rooms.* FROM tbl_rooms ";
                        $q = $mysqli->query($sql);
                        while($row  = $q->fetch_assoc()) {
                        ?>
                        <tr valign="top">
                            <td width="150" class="fs-3" ver><?=$row["roomName"]?> <br />
                                <span><?=$row["detail"]?></span>
                            </td>
                            <td>
                                <?php 
                                $qstation = $mysqli->query("SELECT tbl_station.* FROM tbl_station WHERE tbl_station.roomId = '{$row["roomid"]}' ");
                                while($list =$qstation->fetch_assoc()){ ?>
                                <a class="btn btn-primary mx-2"
                                    href="station.php?sid=<?=$list["stationId"]?>&title=<?=$list["stationName"]?>"
                                    role="button"><?=$list["stationName"]?></a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>

                </div>

            </div>
            <br />
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>