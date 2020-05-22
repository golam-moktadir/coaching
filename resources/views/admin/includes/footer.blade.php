<!--Footer Start-->
<footer class="container-fluid">
    <div class="row footer">
        <div class="col-12">
            @if(isset($footer))
            <p class="pt-2 mb-2 text-center">Copyright &copy; <a class="footer-link" href="">{{$footer->copyright}}</a> || Developed  by:
                <a class="footer-link" href="http://www.fzitsolution.net">FZIT Solution</a></p>
            @else
            <p class="pt-2 mb-2 text-center">Copyright &copy; <a class="footer-link" href="">Owner</a> || Developed  by:
                <a class="footer-link" href="http://www.fzitsolution.net">FZIT Solution</a></p>
            @endif
        </div>
    </div>
</footer>
<!--Footer End-->
    <!--    magnific popup-->
    <script src="{{url('admin/assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js')}}"></script>
    <!--    Carousel-->
    <script src="{{url('admin/assets/plugins/owl-carosel/js/owl.carousel.min.js')}}"></script>
    <!--    Bootstrap-4.3-->
    <script src="{{url('admin/assets/js/popper.min.js')}}"></script>
    <script src="{{url('admin/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('admin/assets/js/sub-dropdown.js')}}"></script>
    <!--Data table-->
    <script src="{{url('admin/assets/plugins/data-table/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('admin/assets/plugins/data-table/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('admin/assets/plugins/data-table/js/dataTables.fixedHeader.min.js')}}"></script>
    <!--    Theme Script-->
    <script src="{{url('admin/assets/js/script.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#studentTypeInsert').submit(function(e){
                e.preventDefault();
                var url = $(this).attr('action');
                var classId = $('#classId').val();          
                var StudentType = $('#StudentType').val();      
                $.ajax({
                    url:url,
                    data:{classId:classId,StudentType:StudentType},
                    success:function(response){
                        var response = JSON.parse(response);
                        var message = response.message;                   
                        window.location='http://localhost/coaching/public/student-type'; 
                      //  window.location.reload(true);
                    }
                });
            });  
            //For Batch Management
            $('#classId').change(function(){
                var class_id = $(this).val();                
                $.ajax({
                    url:"{{route('class-wise-student-type')}}",
                    data:{class_id:class_id},
                    success:function(data){
                        $('#typeId').html(data);
                    }
                });               
            });          
            $('#typeId').change(function(){
                var classId = $('#classId').val();
                var typeId = $(this).val();
                $.ajax({
                    url: "{{route('batch-list-by-ajax')}}",
                    data:{class_id:classId,type_id:typeId},
                    success:function(value){
                        $('#batchList').html(value);              
                    }            
                });
            });
            //For Student Registration
            $('#classId').change(function(){
                var class_id = $(this).val(); 
                $.ajax({
                    url:"{{route('bring-student-type')}}",
                    data:{class_id:class_id},
                    success:function(response){
                        console.log(response);
                        $('#batchInfo').html(response);
                    }
                });
            });
        });
</script>
</body>
</html>