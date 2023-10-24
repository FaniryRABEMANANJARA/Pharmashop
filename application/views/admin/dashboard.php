<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
// Load the Visualization API and the piechart package.
google.charts.load('current', {
    'packages': ['corechart']
});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    console.log("here");
    drawMedicament();
    drawMaladies();

}

function drawMedicament() {
    var jsonData = $.ajax({
        url: "<?php echo site_url('AdministrateurController/dashMedicaments') ?>",
        dataType: "json",
        async: false
    }).responseText;

    // Create our data table out of JSON data loaded from server.

    var data = new google.visualization.DataTable(jsonData);

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('medic'));
    chart.draw(data, {
        width: 500,
        height: 500
    });
}

function drawMaladies() {
    var jsonData = $.ajax({
        url: "<?php echo site_url('AdministrateurController/dashMaladies') ?>",
        dataType: "json",
        async: false
    }).responseText;

    // Create our data table out of JSON data loaded from server.
    var data = new google.visualization.DataTable(jsonData);

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('maladie'));
    chart.draw(data, {
        width: 500,
        height: 500
    });
}
</script>


<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Tableau de bord</h3>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Produits les plus achetés</h4>
                        <div class="text-right" id="medic">
                            <h2 class="font-light m-b-0"><i class="ti-arrow-up text-success"></i> </h2>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Produits frequentes</h4>
                        <div class="text-right" id="maladie">
                            <h2 class="font-light m-b-0"><i class="ti-arrow-up text-info"></i></h2>

                        </div>


                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->

            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
        © 2017 Monster Admin by wrappixel.com
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>