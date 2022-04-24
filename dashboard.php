<?php include "core/auth.php" ?>
<?php include "template/header.php" ?>
                <!-- start area -->
                <div class="row">
                                <!--for post -->
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div onclick="otherLink('post_list.php')" class="card status-card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4 text-info">
                                                    <i data-feather="list" style="width: 50px; height: 50px;"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="h1 m-0">
                                                        <span class="counter fw-bolder">
                                                            <?php echo totalList("select * from posts") ?>
                                                        </span>
                                                    </p>
                                                    <p style="font-size: 12px;" class="mx-2 mb-0 text-secondary">
                                                        Total Post
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- for category -->
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div onclick="otherLink('add_category.php')" class="card status-card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4 text-info">
                                                    <i data-feather="layers" style="width: 50px; height: 50px;"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="h1 m-0">
                                                        <span class="counter fw-bolder">
                                                        <?php echo totalList("select * from categories") ?>
                                                        </span>
                                                    </p>
                                                    <p style="font-size: 12px;" class="mx-2 mb-0 text-secondary">
                                                        Total Category
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- for viewers -->
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div onclick="otherLink('https://www.youtube.com')" class="card status-card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4 text-info">
                                                    <i data-feather="eye" style="width: 50px; height: 50px;"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="h1 m-0">
                                                        <span class="counter fw-bolder">
                                                        <?php echo totalList("select * from viewers") ?>
                                                        </span>
                                                    </p>
                                                    <p style="font-size: 12px;" class="mx-2 mb-0 text-secondary">
                                                        Total Viewers
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- for user -->
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div onclick="otherLink('https://www.youtube.com')" class="card status-card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4 text-info">
                                                    <i data-feather="user-check" style="width: 50px; height: 50px;"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="h1 m-0">
                                                        <span class="counter fw-bolder">
                                                            <?php echo totalList("select * from users") ?>
                                                        </span>
                                                    </p>
                                                    <p style="font-size: 12px;" class="mx-2 mb-0 text-secondary">
                                                        Total User
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>


                <div class="row my-3">
                    <div class="col-12 col-xl-7">
                        <div class="card rounded rounded-1 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between card-header">
                                    <h3 class="mb-0 fw-bold">Visitors</h3>
                                    <div class="">
                                        <img src="assets/vendor/img/images.jpg" class="rounded-circle" style="width: 29px; margin-left: -14px;" alt="">
                                        <img src="assets/vendor/img/images.jpg" class="rounded-circle" style="width: 29px; margin-left: -14px;" alt="">
                                        <img src="assets/vendor/img/images.jpg" class="rounded-circle" style="width: 29px; margin-left: -14px;" alt="">
                                        <img src="assets/vendor/img/images.jpg" class="rounded-circle" style="width: 29px; margin-left: -14px;" alt="">
                                        <img src="assets/vendor/img/images.jpg" class="rounded-circle" style="width: 29px; margin-left: -14px;" alt="">
                                    </div>
                                </div>

                            </div>
                            <canvas id="myChart" height="250"></canvas>

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-5">
                        <div class="card rounded rounded-1 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between card-header">
                                    <h3 class="mb-0 fw-bold">Category / Post</h3>
                                </div>
                                <canvas id="myChartDo" height="180"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-12">
                        <div class="card mt-4 overflow-hidden shadow-sm">
                            <div class="d-flex justify-content-between align-items-end mt-3 mb-2 mx-4">
                                <h3 class="m-0 fw-bold">Recent Post</h3>
                                <span>
                                    <?php

                                        $userId = $_SESSION['user']['id'];
                                        $postTotal=totalList("select * from posts");
                                        $currentPostTotal = totalList("select * from posts where user_id=$userId");
                                        $result = ($currentPostTotal/$postTotal)*100;

                                    ?>
                                    <span>Your Post <?php echo floor($result) ?>%</span>

                                    <div class="progress" style="width: 300px; height: 10px;">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo floor($result) ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </span>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered bg-light  table-hover">
                                                            
                                                            <thead class="bg-info text-light text-center">
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>NAME</th>
                                                                <th class="text-uppercase">description</th>
                                                                <?php if ($_SESSION['user']['role']==0) {
                                                                    ?>
                                                                <th>USER</th>
                                                                    <?php
                                                                } ?>
                                                                <th>CATEGORY</th>
                                                                <th>Viewer</th>
                                                                <th>CONTROL</th>
                                                                <th>CREATED</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php 
                                                                foreach (postsDash(4) as $p) {
                                                                    ?>
                                                                    <tr>
                                                                        <!-- id -->
                                                                        <td><?php echo $p['id'] ?></td>
                                                                        <!-- title -->
                                                                        <td><?php echo short($p['title'])?></td>
                                                                        <!-- description -->
                                                                        <td><?php echo short(strip_tags(html_entity_decode($p['description']))); ?></td>
                                                                        <?php if ($_SESSION['user']['role']==0) {
                                                                            ?>
                                                                        <!-- userId -->
                                                                        <td><?php echo user($p['user_id'])['name']; ?></td>

                                                                            <?php
                                                                        } ?>
                                                                        <!-- category id -->
                                                                        <td><?php echo category($p['category_id'])['title']; ?></td>
                                                                        <!-- viewers -->
                                                                        <td><?php echo count(viewerPost($p['id'])) ?></td>
                                                                        <!-- control -->
                                                                        <td class="text-center d-flex nowrap">
                                                                            <a class="btn btn-sm mx-1 btn-info text-light" href="post_detail.php?id=<?php echo $p['id'] ?>"><i data-feather="info"></i></a>
                                                                            <a class="btn btn-sm mx-1 btn-warning text-light" href="post_edit.php?id=<?php echo $p['id'] ?>"><i data-feather="edit"></i></a>
                                                                            <a onclick="return confirm(`Sure To Delete This Name '<?php echo $p['title'] ?>'`)" class="btn btn-sm mx-1 btn-outline-danger" href="post_del.php?id=<?php echo $p['id'] ?>"><i data-feather="trash"></i></a>
                                                                        </td>
                                                                        <!-- created_at -->
                                                                        <td><?php echo showTime("y-m-d",strtotime($p['created_at'])) ?></td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                            ?>
                                                            </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end area -->

<?php include "template/footer.php" ?>
<script src="assets/vendor/way_point/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counter_up/counter_up.js"></script>
<script src="assets/vendor/chart_js/Chart.min.js"></script>


<script>
    $('.counter').counterUp({
    delay: 10,
    time: 1000
});

                    <?php 

                        $dataArr=[];
                        $visitors=[];
                        $transition=[];
                        $today = date("Y-m-d");
                    
                        for ($i=0; $i < 10; $i++) { 

                            $date=date_create("$today");
                            date_sub($date,date_interval_create_from_date_string("$i days"));
                            $current = date_format($date,"Y-m-d");
                            $m = date_format($date,'M d');
                            array_push($dataArr,$m);

                            $result = totalList("select * from viewers where CAST(created_at AS DATE)='$current'");
                            array_push($visitors,$result);

                            $result1 = totalList("select * from transition where CAST(created_at AS DATE)='$current'");
                            array_push($transition,$result1);
                        
                        }
                         
                    ?>

let dataArry = <?php echo json_encode($dataArr) ?>;
let tranArry = <?php echo json_encode($transition) ?>;
let viewer = <?php echo json_encode($visitors); ?>;





var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: dataArry,
        datasets: [
        {
            label: 'viewer',
            data: viewer,
            backgroundColor: [
                'rgba(50, 292, 291, 0.3)',
            ],
            borderColor: [
                'rgba(50, 292, 291, 1)',
            ],
            borderWidth: 1,
            tension: 0
        },
        {
            label: 'transition',
            data: tranArry,
            backgroundColor: [
                'rgba(255, 206, 86, 0.7)',
            ],
            borderColor: [
                'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 1,
            tension: 0
        }
    ]
    },
    options: {
        scales: {
            yAxes: [{
                display: false
            }],
            y: {
                beginAtZero: true,
            },
            
        },

        legend: {
            display: true,
          position: 'top',
            labels: {
                fontColor: '#333',
                usePointStyle : true,
            }
        }
    }

});


// for donut chart start
<?php 

$catName = [];
$postByCat = [];
foreach (categories() as $c) {
    array_push($catName,$c['title']);
    array_push($postByCat,totalList("select * from posts where category_id={$c['id']}"));
}


?>

let catName = <?php echo json_encode($catName) ?>;
let countArr = <?php echo json_encode($postByCat) ?>

var ctx1 = document.getElementById('myChartDo').getContext('2d');
var myChartDo = new Chart(ctx1, {
    type: 'doughnut',
    data: {
        labels:catName,
        datasets: [{
            label: '# of Votes',
            data: countArr,
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        legend: {
            display: true,
          position: 'bottom',
            labels: {
                fontColor: '#333',
                usePointStyle : true,
            }
        }
    }
});
// for donut chart end
</script>