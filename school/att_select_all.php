<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("att_header.php");
require("connection.php");

?>
<table id="example" class="table table-striped" />
<thead>
    <tr>
        <th>
            <button type="button" id="selectAll" class="main"> <span class="sub"></span> Select</button>
        </th>
        <th>Name</th>
        <th>Company</th>
        <th>Employee Type</th>
        <th>Address</th>
        <th>Country</th>
    </tr>
</thead>
<tbody>
<?php 
$sql="select first_name,roll_no,academic_year,present_class from students where academic_year='".$cur_academic_year."'";
$result=mysqli_query($conn,$sql);
foreach($result as $row)
{
	
}
?>
    <tr>
        <td>
            <input type="checkbox" />
        </td>
        <td>varun</td>
        <td>TCS</td>
        <td>IT</td>
        <td>San Francisco</td>
        <td>US</td>
    </tr>
    <tr>
        <td>
            <input type="checkbox" />
        </td>
        <td>Rahuk</td>
        <td>TCS</td>
        <td>IT</td>
        <td>San Francisco</td>
        <td>US</td>
    </tr>
    <tr>
        <td>
            <input type="checkbox" />
        </td>
        <td>johm Doe</td>
        <td>TCS</td>
        <td>IT</td>
        <td>San Francisco</td>
        <td>US</td>
    </tr>
    <tr>
        <td>
            <input type="checkbox" />
        </td>
        <td>Sam</td>
        <td>TCS</td>
        <td>IT</td>
        <td>San Francisco</td>
        <td>US</td>
    </tr>
    <tr>
        <td>
            <input type="checkbox" />
        </td>
        <td>Lara</td>
        <td>TCS</td>
        <td>IT</td>
        <td>San Francisco</td>
        <td>US</td>
    </tr>
    <tr>
        <td>
            <input type="checkbox" />
        </td>
        <td>Jay</td>
        <td>TCS</td>
        <td>IT</td>
        <td>San Francisco</td>
        <td>US</td>
    </tr>
    <tr>
        <td>
            <input type="checkbox" />
        </td>
        <td>Tom</td>
        <td>TCS</td>
        <td>IT</td>
        <td>San Francisco</td>
        <td>US</td>
    </tr>
</tbody>
</table>



<?php 
require("footer.php");
	}else{
		header("Location:login.php");
	}
	

?>