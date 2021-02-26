<?php  

include_once 'db.php';

$db = new Database();


if (isset($_POST['action']) && $_POST['action']=='view') {
	$output='';
	$data = $db->read();
	$output.='<table class="table table-dark table-hover rounded">
                            <thead class="text-center">
                                <tr>
                                    <th>Serial No : </th>
                                    <th>Frist Name :</th>
                                    <th>Last Name :</th>
                                    <th>Emile Address </th>
                                    <th>Phone Number </th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">';
                $i=0;
                foreach ($data as $view) {
                    $i++;
                	$output.='   <tr>
                                    <td>'.$i.'</td>
                                    <td>'.$view['fname'].'</td>
                                    <td>'.$view['lname'].'</td>
                                    <td>'.$view['emile'].'</td>
                                    <td>'.$view['phone'].'</td>
                                    <td>

    <a href="#" id="'.$view['id'].'" title="Profile Info" class="inFo btn btn-info">I</a>

    <a href="#" title="Edite User" id="'.$view['id'].'" class="editeModal btn btn-primary" data-toggle="modal" data-target="#updateModal">E</a>

    <a href="#" id="'.$view['id'].'" title="Delete User" class="DelUser btn btn-danger">D</a>
                                        
                                    </td>
                                </tr>'; 
                };
                $output.=' </tbody>
            </table>';

            echo $output;

	}

    // Insert Data Request

               if (isset($_POST['action']) && $_POST['action']=='Insert') {
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $emile = $_POST['emile'];
                        $phone = $_POST['phone'];

                        $db->insert($fname,$lname,$emile,$phone);
                    }
                
    // Insert Data Request

    // Edite User Show In input fild


            if (isset($_POST['edite_id'])) {
                    $id= $_POST['edite_id'];
                    $row = $db->getuserById($id);
                    echo json_encode($row); 
            }



// Update user 

            if (isset($_POST['action']) && $_POST['action']=='update') {

                        $id    = $_POST['id'];
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $emile = $_POST['emile'];
                        $phone = $_POST['phone'];

                     $db->update($id,$fname,$lname,$emile,$phone);


            }




// Update user 
    // Edite User Show In input fild 


            // delete user{}


            if (isset($_POST['del_id'])) {
                    $id = $_POST['del_id'];
                    $db->delete($id);
                     
            }

            // delete user{}



        if (isset($_POST['info_id'])) {
            $id = $_POST['info_id'];
           $row= $db->getuserById($id);
           echo json_encode($row); 
                     
            }

// Exprot to excel ==================================


if (isset($_GET['export']) && $_GET['export']=='excel') {
  
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename="users.xls"');
        header("Pragma: no-cache");
        header('Expires: 0');

        $data = $db->read();
        echo '<table border="1">';

        echo '  <tr><th>Serial No : </th> <th>Frist Name :</th><th>Last Name :</th>
                    <th>Emile Address </th><th>Phone Number </th></tr>';

              $i=0;

                foreach ($data as $view) {
                    $i++;
                    echo ' <tr>
                            <td>'.$i.'</td>
                            <td>'.$view['fname'].'</td>
                            <td>'.$view['lname'].'</td>
                            <td>'.$view['emile'].'</td>
                            <td>'.$view['phone'].'</td>
                         </tr>';

}

echo '</table>';









}






// Exprot to excel ==================================



















