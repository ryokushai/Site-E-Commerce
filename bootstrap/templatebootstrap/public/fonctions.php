<?php

function category(){
	$db = Database::connect();
	$statement = $db->query('SELECT cat_id from categories ');
                        while($item = $statement->fetch()) 
                        {   
                                    
                            $cat = $item['cat_id'];
                            
                            $res = <<<EOF
                            <div class="list-group">

                    <a href="category.php?cat_id=$cat" class="list-group-item">Category $cat</a>
                    
                </div>



EOF;                       
echo $res;     
                        }
                        echo "</div>";
}

function review($name,$email,$rating,$id){
    $pdo = Database::connect(); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
$sql = "INSERT INTO review (name,email,rating,review_id) values(?,?,?,?)" ;
$q = $pdo->prepare($sql);
 $q->execute(array($name,$email,$rating,$id)); 

}
?>