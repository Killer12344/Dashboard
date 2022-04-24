<?php require_once "core/auth.php" ?>
   <?php include "template/header.php" ?>
                        <?php
                           
                           if (isset($_POST['payNow'])) {
                                 if (payNow()) {
                                    toLink('wallet.php');
                                 }
                              }
                        
                        ?>
               <div class="row">
                        <div class="col-12">
                            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb bg-white p-2">
                                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Wallet</li>
                                </ol>
                              </nav>
                        </div>
                        <div class="col-12 col-md-12">
                           <form method="post">
                                 <div class="card">
                                       <div class="card-header">
                                          <div class="d-flex justify-content-between align-items-center">
                                             <h5 class="fw-bolder m-0"><i data-feather="dollar-sign" class="text-info"></i> Wallet</h5>
                                             <a href="#" class="btn btn-outline-success">
                                                <i data-feather="user"></i>
                                                Your Money $ <?php echo user($_SESSION['user']['id'])['money']; ?>
                                             </a>
                                          </div>
                                       </div>
                                       <div class="card-body">
                                             <div class="row">
                                                <div class="col">
                                                   <select name="to_user" class="form-select" required>
                                                         <option disabled selected value="0">Select User</option>
                                                      <?php foreach (users() as $user) {
                                                      ?>
                                                      <?php if ($_SESSION['user']['id']!=$user['id']) {?>
                                                         <option value="<?php echo $user['id'] ?>">
                                                            <?php echo $user['name'] ?>
                                                         </option>
                                                      <?php } ?>
                                                      <?php } ?>
                                                   </select>
                                                </div>
                                                <div class="col">
                                                   <input autofocus type="number" class="form-control" name="amount" placeholder="Amount" required>
                                                </div>
                                                <div class="col">
                                                   <input type="text" class="form-control" name="message" placeholder="Something"  required>
                                                </div>
                                                <div class="col">
                                                   <button type="submit" class="btn btn-info text-light fw-bolder px-3" name="payNow">Transforn</button>
                                                </div>
                                             </div>
                                       </div>
                                 </div>
                           </form>
                        </div>
                        <div class="col-12 col-md-12">
                           <table class="table table-bordered table-hover mt-3">
                                 <thead class="bg-info text-center text-light">
                                    <tr>
                                       <th>ID</th>
                                       <th>FROM</th>
                                       <th>TO</th>
                                       <th>AMOUNT</th>
                                       <th>MESSAGE</th>
                                       <th>CREATED_AT</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach (transitionAll() as $t) { ?>
                                       <tr>
                                       <td><?php echo $t['id'] ?></td>
                                       <td><?php echo user($t['from_user'])['name'] ?></td>
                                       <td><?php echo user($t['to_user'])['name'] ?></td>
                                       <td><?php echo $t['amount'] ?></td>
                                       <td><?php echo $t['message'] ?></td>
                                       <td><?php echo $t['created_at'] ?></td>
                                       </tr>
                                    <?php } ?>
                                 </tbody>
                           </table>
                        </div>
              </div>

<?php include "template/footer.php" ?>
