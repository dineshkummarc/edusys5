<?php
session_start();

if(isset($_SESSION['class_uname'])&&isset($_SESSION['class_pass']))

{
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
$sql="select first_name,roll_no,academic_year,present_class from students";
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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>

<?php 

	}else{
		header("Location:login.php");
	}
	

?>