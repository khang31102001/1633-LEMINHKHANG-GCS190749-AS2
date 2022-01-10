<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>

<?php
$brand = new brand();
if(!isset($_GET['brandid'])|| $_GET['brandid'] == NULL ){
    echo "<script> window.location ='brandlist.php'</script>";
}else{
     $id = $_GET['brandid'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // The request is using the POST method
    $brandName = $_POST['brandName'];


    $updatebrand = $brand->update_brand($brandName, $id);

}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Brand</h2>
                
               <div class="block copyblock"> 
                <?php
                 if(isset($updatebrand))
                 {
                   echo $updatebrand;
                  }
                ?>
                <?php
                   $get_brand_name = $brand ->getbrandbyid($id);

                   if($get_brand_name){

                      while($result = $get_brand_name->fetch_assoc()){

                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value ="<?php echo $result['brandName']?>" name= "brandName" placeholder="Edit Brand Product..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php
                        }
                    }

                ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>