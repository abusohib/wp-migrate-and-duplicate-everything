
<?php

$todo = isset($_POST['todo'])? $_POST['todo']:false ; 
 if($todo=="Save"){
	 
	 $name= $_POST['name'];
	 $fathersname= $_POST['fathersname'];
	 $motherssname= $_POST['motherssname'];
	 $address= $_POST['address'];
         $nidnumber= $_POST['nidnumber'];
	 $birthdate= $_POST['birthdate'];
         $document= $_POST['document'];
	 $number= $_POST['number'];
	 $yes= $_POST['yes'];
	 $no= $_POST['no'];
	 $examname= $_POST['examname'];
         $subject= $_POST['subject'];
	 $year= $_POST['year'];
         $gpa= $_POST['gpa'];
         $versity= $_POST['versity'];
	 
	 global $wpdb; 
        
        $wpdb->insert("rupom",array("name"=> $name,"address"=>$address),array('%s','%s'));   
        
 }
         
?>


<form action="" method="post">
    Candidate Name
    <input type="text" class="form-control" name="name" value="<?php echo get_option('name') ; ?>">
    <br><br>
    Fathers Name
    <input type="text" class="form-control" name="fathersname" value="<?php  echo get_option('fathersname'); ?>">
    <br><br>
    Mothers Name
    <input type="text" class="form-control" name="motherssname" value="<?php  echo get_option('motherssname'); ?>">
    <br><br>
    Address
    <input type="text" class="form-control" name="address" value="<?php echo get_option('address'); ?>">
    <br><br>
    NID Number
    <input type="number" class="form-control" name="nidnumber" value="<?php echo get_option('nidnumber'); ?>">
    <br><br>
    Date of Birth
    <input type="date" class="form-control" name="birthdate" value="<?php echo get_option('birthdate'); ?>">
    <br><br>
    Experience
    <br>
    <textarea  name="document" cols="30" rows="10" ><?php  echo get_option('document'); ?></textarea>
    <br><br>
    Phone Number
    <input type="number" class="form-control" name="number" value="<?php echo get_option('number'); ?>">
    <br><br>
    Have a Smart Phone
    <input type="checkbox" class="form-control" name="yes" value="1"<?php if(get_option('yes')) echo "checked"; ?>>yes
    <input type="checkbox" class="form-control" name="no" value="1"<?php if(get_option('no')) echo "checked"; ?>>No
    <br><br>
    <h4>Education Qualification</h4>
     Exam_name
    <input type="text" class="form-control" name="examname" value="<?php echo get_option('examname') ; ?>">
    Subject
    <input type="text" class="form-control" name="subject" value="<?php echo get_option('subject') ; ?>">
    Passing Year
    <input type="number" class="form-control" name="year" value="<?php echo get_option('year') ; ?>">
    GPA
    <input type="number" class="form-control" name="gpa" value="<?php echo get_option('gpa') ; ?>">
    University
    <input type="text" class="form-control" name="versity" value="<?php echo get_option('versity') ; ?>">
       <br><br>
    <input type="submit" name="todo" value="Save" class="button button-primary" > 
   
    </form>
    