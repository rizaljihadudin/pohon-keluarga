<?php
require_once "koneksi.php";
    if(function_exists($_GET['function'])) {
         $_GET['function']();
    }   
    function get_keluarga()
    {
        global $conn;      
        $query = $conn->query("SELECT * FROM keluarga");            
        while($row=mysqli_fetch_object($query))
        {
            $data[] =$row;
        }
        $response=array(
                        'status' => 1,
                        'message' =>'Success',
                        'data' => $data
                    );
        header('Content-Type: application/json');
        echo json_encode($response);
    }   
   
   function get_keluarga_id()
   {
        global $conn;
        if (!empty($_GET["id"])) {
            $id = $_GET["id"];      
        }            
        $query ="SELECT * FROM keluarga WHERE id= $id";      
        $result = $conn->query($query);
        while($row = mysqli_fetch_object($result))
        {
            $data[] = $row;
        }            
        if($data)
        {
        $response = array(
                        'status' => 1,
                        'message' =>'Success',
                        'data' => $data
                    );               
        }else {
            $response=array(
                        'status' => 0,
                        'message' =>'No Data Found'
                    );
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
       
   }


   function insert_keluarga()
    {
        global $conn;   
        $check = array('nama' => '', 'id_ayah' => '', 'gender' => '');
        $check_match = count(array_intersect_key($_POST, $check));
        if($check_match == count($check)){
        
            $result = mysqli_query($conn, "INSERT INTO keluarga SET
            nama = '$_POST[nama]',
            id_ayah = '$_POST[id_ayah]',
            gender = '$_POST[gender]'");
            
            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' =>'Insert Success'
                );
            }
            else
            {
                $response=array(
                    'status' => 0,
                    'message' =>'Insert Failed.'
                );
            }
        }else{
            $response=array(
                    'status' => 0,
                    'message' =>'Wrong Parameter'
                );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

   function update_keluarga()
    {
        global $conn;
        if (!empty($_GET["id"])) {
            $id = $_GET["id"];      
        }   
        $check = array('nama' => '', 'id_ayah' => '', 'gender' => '');
        $check_match = count(array_intersect_key($_POST, $check));         
        if($check_match == count($check)){
        
            $result = mysqli_query($conn, "UPDATE karyawan SET               
            nama = '$_POST[nama]',
            id_ayah = '$_POST[id_ayah]',
            gender = '$_POST[gender]' WHERE id = $id");
        
            if($result)
            {
            $response=array(
                'status' => 1,
                'message' =>'Update Success'                  
            );
            }
            else
            {
            $response=array(
                'status' => 0,
                'message' =>'Update Failed'                  
            );
            }
        }else{
            $response=array(
                    'status' => 0,
                    'message' =>'Wrong Parameter',
                    'data'=> $id
                );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }


    function delete_keluarga()
    {
        global $conn;
        $id = $_GET['id'];
        $query = "DELETE FROM keluarga WHERE id=".$id;
        if(mysqli_query($conn, $query))
        {
            $response=array(
                'status' => 1,
                'message' =>'Delete Success'
            );
        }
        else
        {
            $response=array(
                'status' => 0,
                'message' =>'Delete Fail.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
 ?>