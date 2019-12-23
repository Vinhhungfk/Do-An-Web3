
<?php
include('header.php');
?>




   <?php    // xử lý đăng sờ tatus---------------------------
		if (isset($_POST["Đăng"])) 
		{
      $_SESSION['userindex'] = "Admin";
  			$Ten= $_SESSION['userindex']; // lấy tên từ $_SESSION
        $NoiDungIndex = $_POST["NoiDung"]; // lấy dội dung từ post
        
        date_default_timezone_set('Asia/Ho_Chi_Minh');// cài đặt múi giờ hcm
        $Time = date('d/m/Y - H:i'); // time đăng bài 
        
		    if ($NoiDungIndex == "")
		    {
				  echo "Bạn chưa nhập nội dung!";
				  
  			}
  			else{    
    				//thực hiện việc lưu trữ dữ liệu vào db
    	    	
    			    // thực thi câu $sql với biến $ketnoi lấy từ file ketnoi.php
       				mysqli_query($ketnoi,"INSERT INTO tinmoi(Ten,NoiDung,Time,img) 
               VALUES ('$Ten','$NoiDungIndex','$Time','')"); 	
  			    }
    	}
?>

            
<div class="list1#" style="padding: 4px;background: radial-gradient(circle farthest-corner at left top, #F2FFFF 0%, #FFFFFF 100%); 
background: -moz-radial-gradient(circle farthest-corner at left top, #F2FFFF 0%, #FFFFFF 100%); 
background: -o-radial-gradient(circle farthest-corner at left top, #F2FFFF 0%, #FFFFFF 100%); 
background: -ms-radial-gradient(circle farthest-corner at left top, #F2FFFF 0%, #FFFFFF 100%); 
background: -webkit-radial-gradient(left top, circle farthest-corner, #F2FFFF 0%, #FFFFFF 100%);">
<b>New Feed</b>
<img src="http://xtgem.com/images/forum/icons/thread-read.png" width="20px" height="20px"><br>
 <form method="POST" action="index.php">
 <table>	<td><textarea style="max-width:300px;max-height:100px;min-width:300px;min-height:20px;" type= "text"  name="NoiDung" placeholder="nhập nội dung"></textarea></td>
   <td><input style="margin:0px" type="submit" name="Đăng" value="Đăng"></td></table>
   </form>
  </div>
        




<?php // hiển thị sTT trong sql
           $sql="SELECT * FROM tinmoi ORDER BY id DESC";
           $result = mysqli_query($ketnoi, $sql);
                    
           if ($result) 
                {
                    while ($row=mysqli_fetch_row($result)) 
                    {
                        echo '<div class="list1#" style ="margin-bottom:6px">';
                        echo' <table><td>';
                        echo '<img src="https://png.pngtree.com/png-vector/20190321/ourmid/pngtree-vector-users-icon-png-image_856952.jpg" width="20px" height="20px"></td>
                        <td> <b><a href="">'.$row[1].'</a></b><br> <small><small>'.$row[3].'</small></small> </td></table>'.$row[2];
                       
                        echo'<p></div><hr>';
                    }
                    mysqli_free_result($result);
                }
       ?>