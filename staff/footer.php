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


    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
$(document).ready(function() {
  $('.summernote').summernote();
});
</script>

<script src="typeahead.min.js"></script>
	<script>
		$(document).ready(function(){
		$('input.typeahead').typeahead({
			name: 'typeahead',
			remote:'search_students.php?key=%QUERY',
			limit : 20
		});
	});
	</script> 

</body>

</html>
