<?php 
  include 'db.php';

$status = $_POST['status'];
$id = $_POST['id'];

$sql="UPDATE `yom_comment` SET status=$status where id=".$id;
mysqli_query($con,$sql);

  $sql_page = "SELECT * FROM yom_comment LIMIT 0, 5";
    $sql1 = "SELECT * FROM yom_comment";


    $res_page = mysqli_query($con, $sql_page);
 ?>


  <?php 
                                    while($data=mysqli_fetch_assoc($res_page)){ ?>
                                    <tr>
                                        <td><?php echo $data['id']; ?></td>
                                        <td><?php echo $data['name']; ?></td>
                                        <td><?php echo $data['email']; ?></td>
                                        <td><?php echo $data['subject']; ?></td>
                                        <td><?php echo $data['comment']; ?></td>
                                        <td><img src="image/comment/<?php echo $data['image'] ?>" alt="Image">            
                                        <td>
                                            <input type="checkbox"  attr-value="<?php if($data['status']==0) { echo "1"; }else{ echo "0"; }?>"  class="check" attr-id="<?php echo $data['id']; ?>" <?php if($data['status']==1) { echo "checked"; } ?>>
                                        </td>
                                      
                                    </tr>
                                    <?php } ?>