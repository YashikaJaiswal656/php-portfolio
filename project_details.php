<?php
$servername="localhost";
$username="root";
$password="";
$dbname="portfolio";
$con=new mysqli($servername,$username,$password,$dbname);
$id=$_GET['id'];
$sql="SELECT `id`, `pic`, `detail`, `skills`, `name`, `text` FROM `port` WHERE id='$id' ";
$run=mysqli_query($con,$sql);

?>
<?php include("header.php")?>
<?php while ($row=mysqli_fetch_assoc($run)) {
    ?>

<div class="about_container">
    <div class="sm_cont_four">
        <img src="img/<?php echo $row['pic']?>" alt="">
       
    </div>
    <div class="sm_cont_five">
        <h1>About Project</h1>
        <p><?php echo $row['text']?></p>
    </div>
</div>
<style>




a {
    color: #007BFF;
    text-decoration: none;
    font-weight: bold;
}

</style>


<div class="about_container">
    <div class="sm_cont_threee">
        <h1>Project Overview</h1>
        
        <p class="hash"> <?php  echo nl2br(htmlspecialchars_decode($row['detail'])); ?></p>
        
        
    </div>
</div>

<div class="about_container">
    <div class="sm_cont_threee">
        <h1>Tech Stack</h1>
        
        <p class="hash"> <?php echo $row['skills']?></p>
        
        
    </div>
</div>
<?php
}?>
<?php include("footer.php")?>