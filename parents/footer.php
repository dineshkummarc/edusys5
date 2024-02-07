<!-- /.container-fluid -->
</div>
 <!-- /#page-wrapper -->
</div>
</div>
<!-- /#wrapper -->



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

   
	<script>
function printDiv(timetable) {
     var printContents = document.getElementById('timetable').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<script src="file.js"></script>
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","get_timetable.php?class="+str,true);
        xmlhttp.send();
    }
}

$(function() {
    $( "#name" ).autocomplete({
        source: 'search_students.php'
    });
});

$(function() {
    $( "#book_name" ).autocomplete({
        source: 'search_books.php'
    });
});

$(function() {
    $( "#roll_no" ).autocomplete({
        source: 'searchid.php'
    });
});
</script>
<script>
function printDiv(income) {
     var printContents = document.getElementById('income').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<script>
function goBack() {
    window.history.back();
}
</script>

  

</body>

</html>
