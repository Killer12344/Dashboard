                               <div class="card shadow-sm post my-3">
                                   <div class="card-body">
                                           <a href="detail.php?id=<?php echo $p['id'] ?>" style="text-decoration: none;">
                                               <h4 class="fw-bolder">
                                                   <?php echo $p['title'] ?>
                                               </h4>
                                           </a>
                                           <div class="my-3">
                                               <i data-feather="user" class="text-info mb-2"></i>
                                               <?php echo user($p['user_id'])['name'] ?>
                                               <i data-feather="layers" class="text-success mb-2"></i>
                                               <?php echo category($p['category_id'])['title']; ?>
                                               <i data-feather="calendar" class="text-secondary mb-2"></i>
                                               <?php echo showTime("j-M-Y h:i a", strtotime($p['created_at'])) ?>
                                           </div>
                                           <p class="text-black-50">
                                               <?php echo short(strip_tags(html_entity_decode($p['description'])),200) ?>
                                           </p>
                                   </div>
                               </div>