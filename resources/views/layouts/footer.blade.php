
</div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="/logout" method="post">
                            @csrf
                    <button class="btn btn-primary" >Logout</button>
                </form>
                </div>
            </div>
        </div>
    </div>

    

    

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src=" {{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src=" {{ asset('vendor/chart.js/Chart.min.js') }} "></script>

    <!-- Page level custom scripts -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    
   
    <script>
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);

        var nama_posisi = button.data('myposisi');
        var id_posisi = button.data('idposisi');

        var modal = $(this);

        modal.find('.modal-body #edit-nama-posisi').val(nama_posisi);
        modal.find('.modal-body #edit-id-posisi').val(id_posisi);

    });


    $(document).ready(function(){

        countNotifikasi();
        countMessages();
        getMessages();
    })

    function countNotifikasi(){
        $.ajax({
            url: '{{ route("get-count-notification") }}',
            type: 'get',
            dataType: 'json',
            success: function (response) {

                
                var count_notifikasi = response['count_notif'];

                document.getElementById("count_notif").innerHTML=count_notifikasi;
            }
        })
    }
    function countMessages(){
        $.ajax({
            url: ' {{ route("get-count-messages") }} ',
            type: 'get',
            dataType: 'json',
            success: function (response) {

                
                var count_message = response['count_message'];

                document.getElementById("count_message").innerHTML=count_message;
            }
        })
    }
    function getMessages(){
        $.ajax({
            url: '{{ route("get-messages") }} ',
            type: 'get',
            dataType: 'json',
            success: function (response) {

                console.log(response);

                let output = '';
                
                var data_message = response['data'];
                response['data'].forEach(element => {

                    output += `
                    <a class="dropdown-item d-flex align-items-center" href="/get-messages-detail/${element.id}" role="button"
               
                    >
                       
                       
                    <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src=" {{ asset('img/undraw_profile_1.svg') }} "
                                alt="...">
                            <div class="status-indicator bg-success"></div>
                        </div>
                     
                        <div class="font-weight-bold">
                            <div class="text-truncate"> ${element.message} </div>
                            <div class="small text-gray-500">${element.karyawan["first_name"]} ${element.karyawan["last_name"]} · ${element.created_at}</div>
                        </div>
                        </a>
                    `; 
                    
                });

                document.getElementById("list_message").innerHTML=output;
            }
        })
    }

   
    </script>

@yield('jsCustom')

   




</body>

</html>