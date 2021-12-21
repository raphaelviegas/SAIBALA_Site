<?php
// Template Name: API
$servername = "localhost";
$username = "saibala-old_com";
$password = "G0LrWIXvU2HKaJ5";
$db = "saibala-old_com";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$coursesArr = array(
	24 => 2212,
	34 => 2194,
	20 => 2166,
	18 => 2140,
	7 => 2121,
	6 => 2101,
	5 => 2079,
	40 => 2045,
	42 => 1990,
	52 => 1962,
	29 => 1946,
	25 => 1920,
	48 => 1894,
	19 => 1866,
	17 => 1840,
	14 => 1814,
	13 => 1792,
	51 => 1766,
	71 => 1720,
	70 => 1676,
	67 => 1620,
	62 => 1581,
	60 => 1537,
	61 => 1563,
	69 => 1505,
	57 => 1470,
	53 => 1434,
	46 => 1377,
	36 => 1343,
	45 => 1317,
	32 => 1287,
	30 => 1265,
	23 => 1237,
	15 => 1199,
	4 => 1126,
	2 => 1110,
	56 => 1088,
	65 => 1062,
	58 => 1033,
	68 => 1001,
	50 => 965,
	64 => 917,
	55 => 871,
	54 => 843,
	38 => 797,
	47 => 783,
	27 => 753,
	31 => 727,
	22 => 691,
	37 => 659,
	28 => 645,
	16 => 619,
	10 => 590,
	9 => 572,
	8 => 550,
	3 => 522,
	63 => 494,
	66 => 435,
	43 => 417,
	44 => 393,
	26 => 371,
	35 => 336,
	1 => 309,
	59 => 14
);

if(isset($_GET['function'])){

	$fnc = $_GET['function'];

	if($fnc == 'add-user'){
		/*$sql = "SELECT * FROM tblcadastro LIMIT 32000,40000";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
		  	$id = $row["cadastroid"];
		  	$tipo = $row["ctipo"];
		  	$cpf = $row["ccpf"];
		  	$firstname = $row["cnome"];
		  	$lastname = $row["csobre_nome"];
		  	$displayname = $row["capelido"];
		  	$email = $row["cemail"];
		  	$password = $row["csenha"];
		  	$city = $row["ccidade"];
		  	$state = $row["cestado"];
		  	$site = $row["csite"];
		  	$birthday = $row["cdata_aniversario"];
		  	$image = $row["cimagem"];
		  	$fb = $row["cfacebookid"];
		  	$cv = $row["ccurriculum"];
		  	$gender = $row["csexo"];

		  	$courses = 'SELECT * FROM `tblcadastro_curso` WHERE ccodcadastro = '.$id;

			$userdata = array(
			    'user_pass'             => $password,   //(string) The plain-text user password.
			    'user_login'            => $displayname,   //(string) The user's login username.
			    'user_nicename'         => $displayname,   //(string) The URL-friendly user name.
			    'user_url'              => $site,   //(string) The user URL.
			    'user_email'            => $email,   //(string) The user email address.
			    'first_name'            => $firstname,   //(string) The user's first name. For new users, will be used to build the first part of the user's 
			    'last_name'             => $lastname,   
			    'description'           => $cv,   //(string) The user's biographical description.
			    'role' 					=> 'customer'
			);




			$user_id = wp_insert_user( $userdata );

			if($user_id){

				update_user_meta($user_id, 'gender',$gender);
				update_user_meta($user_id, 'birthday',$birthday);
				update_user_meta($user_id, 'old_image',$image);
				update_user_meta($user_id, 'facebookid',$fb);
				update_user_meta($user_id, 'old_id',$id);
				update_user_meta($user_id, 'billing_first_name',$firstname);
				update_user_meta($user_id, 'billing_last_name',$lastname);
				update_user_meta($user_id, 'billing_city',$city);
				update_user_meta($user_id, 'billing_state',$state);
				update_user_meta($user_id, 'billing_country','BR');
				update_user_meta($user_id, 'billing_email',$email);
				update_user_meta($user_id, 'billing_cpf',$cpf);

				//ld_update_course_access( $user_id, -1, true );
				$resultCourses = $conn->query($courses);
				if ($resultCourses->num_rows > 0) {
				  // output data of each row
				  while($row = $resultCourses->fetch_assoc()) {
				  	$key = $row["ccodcurso"];
				  	//echo 'ID do curso original comprado:'.$key.'<br>';
				  	//echo 'ID do curso na atual plataforma:'.$coursesArr[$key].'<br>';
				  	ld_update_course_access( $user_id, $coursesArr[$key], false );
				  }
				}
			}

			//print_r($userdata);
			//echo "<hr>";

		  }
		} else {
		  echo "0 results";
		}
		$conn->close();*/

	}
	if($fnc == 'add-project'){
		$sql = "SELECT * FROM tblcurso_projeto LIMIT 15,800";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
		  	$id = $row["projetoid"];

		  	$user_id = $row["pcodcadastro"];
		  	$course_id = $row["pcodcurso"];
		  	$course_id_new = $coursesArr[$course_id];

			$product = get_posts(array(
			   // more args here        
				'post_type' => 'product',
				'meta_query' => array(
				  // meta query takes an array of arrays, watch out for this!
				  array(
				     'key'     => '_related_course',
				     'value'   => $course_id_new,
				     'compare' => 'LIKE'
				  )
				)
			))[0]->ID;

		  	
		  	$email = 'SELECT * FROM `tblcadastro` WHERE cadastroid = '.$user_id;
			$resultUser = $conn->query($email);
			$userEmail = '';
			if ($resultUser->num_rows > 0) {
			  while($row1 = $resultUser->fetch_assoc()) {
			  	//$gallery[] = $row["iimagem"];
			  	$userEmail = $row1['cemail'];
			  	//echo $userEmail;
			  }
			}
		  	
		  	$user = get_user_by( 'email', $userEmail );
			$user_id_new = $user->ID;


		  	$images = 'SELECT * FROM `tblcurso_projeto_imagem` WHERE icodprojeto = '.$id;
		  	$gallery = array();
			$resultimages = $conn->query($images);
			if ($resultimages->num_rows > 0) {
			  while($row2 = $resultimages->fetch_assoc()) {
			  	$gallery[] = $row2["iimagem"];
			  	//echo $row["iimagem"];
			  }
			} else {
				$gallery = 'novo';
			}


			$post_arr = array(
			    'post_title'   => utf8_encode($row["ptitulo"]),
			    'post_content' => utf8_encode($row["ptexto"]),
			    'post_status'  => 'publish',
			    'post_type'  => 'projetos',
			    'meta_input'   => array(
			        'usuario_id' => $user_id_new,
			        'curso' => $product,
			        'imagem_url' => get_home_url().'/'.$row["pimagem"],
			        'arquivo_url' => get_home_url().'/'.$row["pimagem"],
			        'galeria' => $gallery
			    ),
			);
			print_r($post_arr);
			echo '<hr>';
			kses_remove_filters();
			$id = wp_insert_post($post_arr);
			kses_init_filters();
			//echo wp_insert_post( $post_arr );


		  }
		}
	}


}



?>