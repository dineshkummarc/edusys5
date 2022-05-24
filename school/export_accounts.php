<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass']))
{


include 'db.php';


$sql="select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_fee group by roll_no   UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_adm_fee  group by roll_no  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_books_fee group by roll_no  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_software_fee  group by roll_no  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_shoe_fee  group by roll_no  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_uniform_fee  group by roll_no  UNION ALL select id,roll_no,first_name,present_class,academic_year,rec_no,rec_date,sum(van_fee) as paid_adm_fee from student_van_fee  group by roll_no  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_cca_fee  group by roll_no  ORDER BY name";






$header = '';
$result ='';
$exportData = mysql_query ($sql ) or die ( "Sql error : " . mysql_error( ) );
 
$fields = mysql_num_fields ( $exportData );
 
for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysql_field_name( $exportData , $i ) . "\t";
}
 
while( $row = mysql_fetch_row( $exportData ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $result .= trim( $line ) . "\n";
}
$result = str_replace( "\r" , "" , $result );
 
if ( $result == "" )
{
    $result = "\nNo Record(s) Found!\n";                        
}
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=export_accounts.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$result";
}
?>