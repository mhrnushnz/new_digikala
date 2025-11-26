<script src="/admin/assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="/admin/bootstrap/js/popper.min.js"></script>
<script src="/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="/admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/admin/assets/js/app.js"></script>
<script src="/admin/assets/js/loader.js"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="/admin/assets/js/custom.js"></script>



<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
<script src="/admin/plugins/apex/apexcharts.min.js"></script>
<script src="/admin/assets/js/dashboard/dash_2.js"></script>


{{--alert scripts --}}
<script src="/admin/plugins/sweetalerts/promise-polyfill.js"></script><script src="plugins/sweetalerts/promise-polyfill.js"></script><script src="plugins/sweetalerts/promise-polyfill.js"></script>
<script src="/admin/assets/js/scrollspyNav.js"></script>
<script src="/admin/plugins/sweetalerts/sweetalert2.min.js"></script>
<script src="/admin/plugins/sweetalerts/custom-sweetalert.js"></script>

<script>

    window.addEventListener('success', function (event) {
        swal({
            title: 'تبریک میگم!',
            text: event.detail,
            type: 'success',
            padding: '2em'
        })
    })
</script>

@stack('error')




<script>
    document.addEventListener("livewire:navigated", () => {
        if (typeof loadApp !== "undefined") {
            loadApp(); // یا هر فانکشنی که تم initialize میکنه
        }
    });

</script>


<script>
    var firstUpload = new FileUploadWithPreview('myFirstImage')
</script>


<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

@stack('script')

