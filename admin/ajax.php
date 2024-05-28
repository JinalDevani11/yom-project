<?php 
  include 'db.php';

$status = $_POST['status'];
$id = $_POST['id'];

$sql="UPDATE `slider` SET status=$status where id=".$id;
mysqli_query($con,$sql);

  $sql_page = "SELECT * FROM slider LIMIT 0, 5";
    $sql1 = "SELECT * FROM slider";


    $res_page = mysqli_query($con, $sql_page);
 ?>


  <?php 
                                    while($data=mysqli_fetch_assoc($res_page)){ ?>
                                    <tr>
                                        <td><?php echo $data['id']; ?></td>
                                        <td><?php echo $data['title']; ?></td>
                                        <td><?php echo $data['des']; ?></td>
                                      
                                            <td><img src="image/admin/<?php echo $data['image'] ?>" alt="Image">
                                        
                                        <td>
                                            <input type="checkbox"  attr-value="<?php if($data['status']==0) { echo "1"; }else{ echo "0"; }?>"  class="check" attr-id="<?php echo $data['id']; ?>" <?php if($data['status']==1) { echo "checked"; } ?>>
                                        </td>
                                        <td><a href="view_slider.php?id=<?php echo $data['id'] ?>">Delete</a>||<a href="add_slider.php?id=<?php echo $data['id'] ?>">Edit</a></td>
                                    </tr>
                                    <?php } ?>