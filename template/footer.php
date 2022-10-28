<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
<?php global $url?>
<script src="<?php echo $url; ?>/template/core/assets/vendor/way_point/jquery.waypoints.min.js"></script>
<script src="<?php echo $url; ?>/template/core/assets/vendor/counter_up/counter_up.js"></script>
<script src="<?php echo $url; ?>/template/core/assets/vendor/chart_js/chart.min.js"></script>
<script src="<?php echo $url; ?>/template/core/assets/js/app.js"></script>
<script src="<?php echo $url; ?>/template/core/assets/vendor/data_table/jquery.dataTables.min.js"></script>
<script src="<?php echo $url; ?>/template/core/assets/vendor/bootstrap/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"
    integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
// $(document).ready(function() {
//     $('.table').DataTable({
//         "order": [
//             [0, "desc"]
//         ]
//     });
// });
let currentPage = location.href;
$('.menu-item-link').each(function() {
    let links = $(this).attr('href');
    if (currentPage == links) {
        $(this).addClass('active');
    }
});

$(document).ready(function() {
    $('.description').summernote({
        height: 500
    });
});
</script>

</body>

</html>