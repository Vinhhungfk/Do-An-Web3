<?php include('header.php'); ?>

<!-- bat dau cua MAIN BODY -->
<div id="main">
<div id="trai">

<?php
  if (isset($_SESSION['userindex']))  // nếu mà đã đăng nhập thì vô đây
      {
        $Ten=$_SESSION['userindex'];
        echo'<div class="list21"><div class="list1">';

        // hiển thị avt ủa người đang đăng nhập = SESSION['userindex']
        $resultAVT = mysqli_query($ketnoi, "SELECT ImgData FROM users where Username =N'$Ten' ");
        $AVT = mysqli_fetch_array($resultAVT);
        echo ' <img src="data:image/jpeg;base64,'.base64_encode( $AVT['ImgData'] ).'" width="20px" height="20px" style="border-radius:100px;boder:1px solid #ddd;"/>';
        
        echo'<b><a style="" href="Profile.php?user='.$Ten.'">'.$Ten.'</a></b>';
        echo'<hr> 
        <font color="#c1c1c1">• </font> <a href="Profile.php" >Đổi Mật Khẩu</a></span> <hr>
        <font color="#c1c1c1">• </font> <a href="Logout.php">Đăng xuất</a></span>';
        echo'</div></div>';
      }

  else // nếu chưa đăng nhập thì vô đây
      {
        echo'<div class="list21"><div class="list1" style="padding-left:10px">';
        include('XuLyLogin.php');

        echo'<form style="" method="POST" action=""><br>
        <b> Tên người dùng</b><br>
        <input type="text" style="width:230px" name="username" placeholder="nick"><br><br>
        <b> Mật Khẩu</b><br>
        <input type="password" style="width:230px" name="password" placeholder="pass" > 
        <input type="submit" style="width:242px" name="DangNhap" value="Đăng nhập"><p></p>
        </form></div>
        <center><a href="Register.php">Đăng ký</a> | <a href="ResetMk.php">Quên mật khẩu?</a></center>
        </div><br>';
      }
?>












<div class="list21" >
<div class="list1">
   
    đã cùng nghiên cứu vềBài 10: Kết hợp PHP và MYSQL trong ứng dụng website
    Ở bài trước, chúng ta đã cùng nghiên 
</div>
</div>









<!-- khúc giao nhau của Main left right -->
</div><div id="phai">
  


<div class="list21">
<div class="list1">
     


   <?php    // xử lý đăng sờ tatus---------------------------
		if (isset($_POST["Đăng"]) && isset($_SESSION['userindex'])) 
		{

  			$Ten= $_SESSION['userindex']; // lấy tên từ $_SESSION
        $NoiDungIndex = $_POST["NoiDung"]; // lấy dội dung từ post
        

        
        date_default_timezone_set('Asia/Ho_Chi_Minh');// cài đặt múi giờ hcm
        $Time = date('d/m/Y - H:i'); // time đăng bài 
        
		    if ($NoiDungIndex == "")
		    {
				  echo "Bạn chưa nhập nội dung!";
  			}
        else
        {     //lưu trữ dữ liệu vào db khi có ảnh
              if (is_uploaded_file($_FILES['userImage']['tmp_name']))
              {
                  $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
                  mysqli_query($ketnoi,"INSERT INTO tinmoi(Username,NoiDung,Time,img) 
                  VALUES ('$Ten','$NoiDungIndex','$Time','$imgData')"); 


              }
              else  //lưu trữ dữ liệu vào db khi không có ảnh
              {
                mysqli_query($ketnoi,"INSERT INTO tinmoi(Username,NoiDung,Time,img) 
                VALUES ('$Ten','$NoiDungIndex','$Time','')"); 

                if($Ten=='admin' && $NoiDungIndex =='trâm anh ơi' || $Ten=='admin' && $NoiDungIndex =='tram anh oi' || $Ten=='admin' && $NoiDungIndex =='Tram anh')
                {
                  mysqli_query($ketnoi,"INSERT INTO tinmoi(Username,NoiDung,Time,img) 
                  VALUES (N'Trâm Anh',N'Anh Hưng gọi T.Anh chi á? đứa nào bắt nạt anh hả :v','$Time','')");
                
                }
                if($Ten=='admin' && $NoiDungIndex =='hello'|| $Ten=='admin' && $NoiDungIndex =='chào t.a'|| $Ten=='admin' && $NoiDungIndex =='hi')
                {
                  mysqli_query($ketnoi,"INSERT INTO tinmoi(Username,NoiDung,Time,img) 
                  VALUES (N'Trâm Anh',N'Trâm anh ddaayy, chào a hưng ad đẹp trai nhé:v','$Time','')");
                
                }
                else// nếu ko phải admin
                {
                  if($NoiDungIndex =='hello'|| $NoiDungIndex =='hi'|| $NoiDungIndex =='tram anh')
                    {
                      mysqli_query($ketnoi,"INSERT INTO tinmoi(Username,NoiDung,Time,img) 
                      VALUES (N'Trâm Anh',N'Trâm Anh Chào bạn nha=))','$Time','')"); 
                    
                    }
                    else if($NoiDungIndex =='cc' || $NoiDungIndex =='clgt'|| $NoiDungIndex =='dm')
                    {
                      mysqli_query($ketnoi,"INSERT INTO tinmoi(Username,NoiDung,Time,img) 
                      VALUES (N'Trâm Anh',N'ây thằng kia...lớn đầu mà mắt dạy z hả','$Time','')"); 
                    }
                    else if($NoiDungIndex =='chán' || $NoiDungIndex =='chán quá'|| $NoiDungIndex =='hazz'|| $NoiDungIndex =='hmm')
                    {
                      mysqli_query($ketnoi,"INSERT INTO tinmoi(Username,NoiDung,Time,img) 
                      VALUES (N'Trâm Anh',N'Hôm nay là một ngày mệt mỏi. ai thả thính mình đớp liền nè <3 <3','$Time','')"); 
                    }
                    
                }

             

              

              }
  			  }
      }
      
?>

<?php
if (isset($_SESSION['userindex'])) 
		{  
?>     
<div class="list1#" style="padding: 4px;background: radial-gradient(circle farthest-corner at left top, #F2FFFF 0%, #FFFFFF 100%); 
background: -moz-radial-gradient(circle farthest-corner at left top, #F2FFFF 0%, #FFFFFF 100%); 
background: -o-radial-gradient(circle farthest-corner at left top, #F2FFFF 0%, #FFFFFF 100%); 
background: -ms-radial-gradient(circle farthest-corner at left top, #F2FFFF 0%, #FFFFFF 100%); 
background: -webkit-radial-gradient(left top, circle farthest-corner, #F2FFFF 0%, #FFFFFF 100%);">
<b>New Feed</b>
<img src="http://xtgem.com/images/forum/icons/thread-read.png" width="20px" height="20px"><br>
 <form enctype="multipart/form-data" method="POST" action="">
 <table>	<td><textarea style="max-width:300px;max-height:100px;min-width:300px;min-height:20px;" type= "text"  name="NoiDung" placeholder="Bạn đang nghĩ gì?"></textarea><br>
 <input name="userImage" type="file" style="width:150px" />Thêm Hình</td>
  <td><input style="" type="submit" name="Đăng" value="Đăng"></td></table>
  </form>
 </div>
 
  <?php
    } 
?>           







</div>



   





<?php // hiển thị sTT trong sql
// BƯỚC 2: TÌM TỔNG SỐ RECORDS

$result1 = mysqli_query($ketnoi, 'select count(ID) as total from tinmoi');
$row1 = mysqli_fetch_assoc($result1);
$total_records = $row1['total'];

// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;

// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
$total_page = ceil($total_records / $limit);

// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page)
{
    $current_page = $total_page;
}
else if ($current_page < 1)
{
    $current_page = 1;
}

// Tìm Start
$start = ($current_page - 1) * $limit;

// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
$result = mysqli_query($ketnoi, "SELECT * FROM tinmoi ORDER BY ID DESC LIMIT $start, $limit ");



//$result = mysqli_query($ketnoi, "SELECT * FROM tinmoi ORDER BY ID DESC");
                    
           if ($result) 
                {
                    while ($row=mysqli_fetch_row($result)) 
                    {
                      echo '<div class="list1" style ="margin-bottom:4px">';
                        echo' <table><td>';

                        // lấy ảnh từ table users nên bắt buộc phải tạo reuslt avt
                        $resultAVT = mysqli_query($ketnoi, "SELECT ImgData FROM users where Username =N'$row[1]' ");
                        $AVT = mysqli_fetch_array($resultAVT);
                        echo ' <img src="data:image/jpeg;base64,'.base64_encode( $AVT['ImgData'] ).'" height="25px" width="25px" style="border-radius:100px;boder:1px solid #ddd;"/>';
                        echo '</td><td>';
                        
                            if($row[1]=='admin')// nếu là admin thì nick màu #
                              {
                            echo'<a class="font" style="color:#f00" href="Profile.php?user='.$row[1].'">Hung Vinh</a>
                            <img src="http://aichat.wap.sh/lv/admin.gif" width="30px"><br>';
                          }
                        else  // ko phải admin thì..
                         {
                           echo'<b><a href="Profile.php?user='.$row[1].'">'.$row[1].'</a></b><br>';
                         }
                        echo'<small>Đăng lúc '.$row[3].'</small>
                        </td></table><p>'.$row[2].'</p>';   
                        if($row[4] != null)// nếu mục ảnh ko trống thì hiển thị
                          {
                            echo '<img id="zoom" src="data:image/jpeg;base64,'.base64_encode( $row[4] ).'"width="300px"/>';
                          }
                          
                        
                         // hiển thị like
                         echo '<p> <a class="list5" style="padding:1px" href="XuLy.php?get_id='.$row[0].'">'.$row[5].' like</a>';
                         echo'<hr>';


                        // xử lý đăng comment---------------------------
                         if (isset($_POST["cmt"]) && isset($_SESSION['userindex']) && $row[0]==$row[0]) 
                         {
                             $id_get_cmt= $_POST["id_get_CMT"];
                             if($id_get_cmt==$row[0]) // nếu dòng ID nầy trùng vs id get thì thực thi lệnh với id này
                             {
                              $Ten= $_SESSION['userindex']; // lấy tên từ $_SESSION
                              $NoiDung = $_POST["comment"]; // lấy dội dung từ post
                              date_default_timezone_set('Asia/Ho_Chi_Minh');// cài đặt múi giờ hcm
                              $Time = date('d/m/Y - H:i'); // time đăng
                              if ($NoiDung == "")
                              {
                                echo "Bạn chưa nhập nội dung!"; 
                              }
                              else
                               {   
                                   mysqli_query($ketnoi,"INSERT INTO comment(ID,Username,NoiDung,Time) 
                                   VALUES ('$row[0]','$Ten','$NoiDung','$Time')"); 
                               }
                             }
                          }
                         
                        
                         $result_CMT = mysqli_query($ketnoi, "SELECT * FROM comment where ID=$row[0] ORDER BY IDComment ");
                         if ($result_CMT) 
                         {
                             while ($row_CMT=mysqli_fetch_row($result_CMT)) 
                             {
                               echo'<p><a href="Profile.php?user='.$row_CMT[2].'">'.$row_CMT[2].'</a><small>('.$row_CMT[4].')</small>: ' .$row_CMT[3].'</p>';
                             }
                        }
                        
                        
                         echo'

                         <input class="toggle-box" id="'.$row[0].'" type="checkbox" >
                         <label for="'.$row[0].'">Thêm Bình Luận!</label>
                         <div>
                         <form style="" method="POST" action="">
                         <input type="text" style="height:0px;width:0px;padding:0px;margin:0px" name="id_get_CMT" value="'.$row[0].'">
                         <textarea style="max-height:50px;height:20px" type= "text"  name="comment" placeholder="bình luận"></textarea>
                         
                         <input type="submit" style="border-radius:10px;" name="cmt" value="bình luận"></form>
                         </div>';

                         echo'</div>';
                    }
                    mysqli_free_result($result);
                }

// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
if ($current_page > 1 && $total_page > 1){
  echo '<a href="index.php?page='.($current_page-1).'"><<</a>';
}

// Lặp khoảng giữa
for ($i = 1; $i <= $total_page; $i++){
  // Nếu là trang hiện tại thì hiển thị thẻ span
  // ngược lại hiển thị thẻ a
  if ($i == $current_page){
      echo 'Page: <span class="list4" style="padding:1px" >'.$i.'</span>'; 
  }
  else{
      echo '<a class="list4" style="padding:1px" href="index.php?page='.$i.'">'.$i.'</a>';
  }
}

// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
if ($current_page < $total_page && $total_page > 1){
  echo '<a class="list4" style="padding:1px" href="index.php?page='.($current_page+1).'">>></a>';
}

?>






</div></div>


</div><!-- khúc giao nhau của right and Cuối-->   


<?php
include('footer.php');
?>